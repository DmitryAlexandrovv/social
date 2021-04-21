<template>
    <AuthTemplate>
        <template v-slot:content>
            <h3 class="text-center mb-0">Welcome</h3>
            <p class="text-center">Sign up by entering the information below</p>
            <v-card class="login-form">
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-user">
                            <font-awesome-icon icon="user"/>
                        </span>
                    </div>
                    <v-text-field
                        v-model="form.name"
                        :error-messages="checkError('name')"
                        placeholder="Name"
                        type="name"
                        :single-line="true"
                    />
                </div>
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-user">
                            <font-awesome-icon icon="user"/>
                        </span>
                    </div>
                    <v-text-field
                        v-model="form.email"
                        :error-messages="checkError('email')"
                        placeholder="E-mail"
                        type="email"
                        :single-line="true"
                    />
                </div>
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-user">
                            <font-awesome-icon icon="user"/>
                        </span>
                    </div>
                    <v-text-field
                        v-model="form.phone"
                        :error-messages="checkError('phone')"
                        placeholder="Phone"
                        type="phone"
                        :single-line="true"
                    />
                </div>
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-lock">
                            <font-awesome-icon icon="lock"/>
                        </span>
                    </div>
                    <v-text-field
                        v-model="form.password"
                        :error-messages="checkError('password')"
                        placeholder="Password"
                        type="password"
                        :single-line="true"
                    />
                </div>
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-lock">
                            <font-awesome-icon icon="lock"/>
                        </span>
                    </div>
                    <v-text-field
                        v-model="form.passwordConfirmation"
                        :error-messages="checkError('passwordConfirmation')"
                        placeholder="Password"
                        type="password"
                        :single-line="true"
                    />
                </div>
                <div class="form-group d-md-flex">
                    <div class="w-100 text-md-right">
                        <a href="#">Forgot Password</a>
                    </div>
                </div>
                <div class="form-group">
                    <button @click.prevent="onRegister"
                            type="submit"
                            class="btn form-control btn-primary rounded submit px-3">
                        Get Started
                    </button>
                </div>
            </v-card>
            <div class="w-100 text-center mt-4 text">
                <p class="mb-0">Don't have an account?</p>
                <router-link to="/signUp">
                    <a href="#">Sign Up</a>
                </router-link>
            </div>
        </template>
    </AuthTemplate>
</template>

<script>
    import Vue from 'vue';
    import axios from 'axios'
    import VueAxios from 'vue-axios'
    import {library} from '@fortawesome/fontawesome-svg-core';
    import {faUser, faLock} from '@fortawesome/free-solid-svg-icons';
    import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';
    import AuthTemplate from "../../abstract/auth/AuthTemplate";

    library.add(faUser, faLock);
    Vue.component('font-awesome-icon', FontAwesomeIcon);
    Vue.config.productionTip = false;
    Vue.use(VueAxios, axios);

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
            onRegister() {
                axios
                    .post("/api/auth/register", this.form)
                    .then(response => {
                        //Можно сразу авторизовать
                        this.$router.push("/");
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
