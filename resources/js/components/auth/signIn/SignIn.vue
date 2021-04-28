<template>
    <AuthTemplate>
        <template v-slot:content>
            <h3 class="text-center mb-5">Welcome</h3>
            <p class="text-center">Sign in by entering the information below</p>
            <v-card
                elevation="0"
                class="login-form">
                <div v-if="unauthorized"
                     class="user-is-not-exists error--text m-auto">
                    User is not exists
                </div>
                <div class="form-group">
                    <v-text-field
                        v-model="form.name"
                        :error-messages="checkError('name')"
                        color="purple darken-2"
                        label="First name"
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
                <div class="form-group d-md-flex">
                    <div class="w-100 text-md-right">
                        <a href="#">Forgot Password</a>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <v-btn
                        @click.prevent="onLogin"
                        depressed
                        color="primary"
                        type="submit">
                        Get Started
                    </v-btn>
                </div>
            </v-card>
            <div class="w-100 text-center mt-4 text">
                <p class="mb-2">Don't have an account?</p>
                <router-link to="/signUp">
                    <a href="#">Sign Up</a>
                </router-link>
            </div>
            <p style="color: red;" v-if="$auth.check()">авторизован</p>
        </template>
    </AuthTemplate>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';
    import AuthTemplate from "../../abstract/auth/AuthTemplate";

    const { mapActions } = createNamespacedHelpers('User');

    export default {
        name: "SignIn",
        components: {
            AuthTemplate
        },
        data() {
            return {
                form: {
                    name: null,
                    password: null
                },
                errors: {},
                unauthorized: false
            }
        },
        methods: {
            ...mapActions(['setUser']),
            onLogin() {
                this.$auth.login({
                    data: {
                        ...this.form
                    },
                    redirect: '/profile',
                    fetchUser: true
                }).then(res => {
                    localStorage.setItem('user', JSON.stringify(res.data));
                }).catch(error => {
                    if (error.response.status === 401) {
                        this.unauthorized = true;
                    } else {
                        this.errors = error.response.data.errors;
                    }
                });
            },
            checkError(field) {
                return this.errors.hasOwnProperty(field) ? this.errors[field] : [];
            }
        }
    }
</script>

<style>
    .login-wrap p {
        color: black;
    }

    .login-wrap img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto;
        margin-bottom: 20px;
    }

    .login-wrap h3 {
        font-weight: 400;
        font-size: 18px;
        color: black;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .error--text {
        color: rgb(227, 38, 54);
    }
</style>
