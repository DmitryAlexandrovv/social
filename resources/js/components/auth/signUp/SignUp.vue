<template>
    <AuthTemplate>
        <template v-slot:content>
            <h3 class="text-center mb-5">Welcome</h3>
            <p class="text-center">Sign up by entering the information below</p>
            <v-card
                elevation="0"
                class="login-form">
                <div class="form-group">
                    <v-text-field
                        v-model="form.name"
                        :error-messages="checkError('name')"
                        color="purple darken-2"
                        label="Name"
                        required
                    ></v-text-field>
                </div>
                <div class="form-group">
                    <v-text-field
                        v-model="form.email"
                        :error-messages="checkError('email')"
                        color="purple darken-2"
                        label="E-mail"
                        required
                    ></v-text-field>
                </div>
                <div class="form-group">
                    <v-text-field
                        v-model="form.phone"
                        :error-messages="checkError('phone')"
                        color="purple darken-2"
                        label="Phone"
                        required
                    ></v-text-field>
                </div>
                <div class="form-group">
                    <v-text-field
                        v-model="form.password"
                        :error-messages="checkError('password')"
                        color="purple darken-2"
                        label="Password"
                        required
                    ></v-text-field>
                </div>
                <div class="form-group">
                    <v-text-field
                        v-model="form.passwordConfirmation"
                        :error-messages="checkError('passwordConfirmation')"
                        color="purple darken-2"
                        label="Password confirmation"
                        required
                    ></v-text-field>
                </div>
                <div class="form-group d-md-flex">
                    <div class="w-100 text-md-right">
                        <a href="#">Forgot Password</a>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <v-btn
                        @click.prevent="onRegister"
                        depressed
                        color="primary"
                        type="submit">
                        Get Started
                    </v-btn>
                </div>
            </v-card>
            <div class="w-100 text-center mt-4 text">
                <p class="mb-0">Already have an account?</p>
                <router-link to="/signIn">
                    <a href="#">Sign In</a>
                </router-link>
            </div>
        </template>
    </AuthTemplate>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';
    import AuthTemplate from "../../abstract/auth/AuthTemplate";

    const { mapActions } = createNamespacedHelpers('User');

    export default {
        name: "SignUp",
        components: {
            AuthTemplate
        },
        data() {
            return {
                form: {
                    name: null,
                    email: null,
                    phone: null,
                    password: null,
                    passwordConfirmation: null
                },
                errors: {}
            }
        },
        methods: {
            ...mapActions(['setUser']),
            onRegister() {
                this.$auth
                    .register({
                        data: {
                            ...this.form
                        },
                        redirect: '/profile',
                        staySignedIn: true,
                        autoLogin: true,
                    }).then(res => {
                        this.setUser(res.data);
                    })
                    .catch(error => {
                        this.errors = error.response.data.errors;
                    });
            },
            checkError(field) {
                return this.errors.hasOwnProperty(field) ? this.errors[field] : [];
            }
        }
    }
</script>
