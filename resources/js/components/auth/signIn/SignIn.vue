<template>
    <AuthTemplate>
        <template v-slot:content>
            <h3 class="text-center mb-0">Welcome</h3>
            <p class="text-center">Sign in by entering the information below</p>
            <v-card action="#" class="login-form">
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-user">
                            <font-awesome-icon icon="user"/>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <div class="icon d-flex align-items-center justify-content-center">
                        <span class="fa fa-lock">
                            <font-awesome-icon icon="lock"/>
                        </span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" required="">
                </div>
                <div class="form-group d-md-flex">
                    <div class="w-100 text-md-right">
                        <a href="#">Forgot Password</a>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn form-control btn-primary rounded submit px-3">Get Started</button>
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
    import {library} from '@fortawesome/fontawesome-svg-core';
    import {faUser, faLock} from '@fortawesome/free-solid-svg-icons';
    import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';
    import AuthTemplate from "../../abstract/auth/AuthTemplate";

    library.add(faUser, faLock);
    Vue.component('font-awesome-icon', FontAwesomeIcon);
    Vue.config.productionTip = false;

    export default {
        name: "SignIn",
        components: {
            AuthTemplate
        }
    }
</script>

<style>
    .login-wrap p {
        color: rgba(255, 255, 255, 0.5);
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
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .login-wrap p {
        color: rgba(255, 255, 255, 0.5);
    }

    .form-group {
        position: relative;
    }

    .form-group {
        margin-bottom: 1rem;
    }

    .form-group .icon {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 20px;
        height: 48px;
        background: transparent;
        font-size: 18px;
    }

    .form-group .icon span {
        color: #fff;
    }

    .form-group input{
        width: 100%;
        height: 48px;
        background: rgba(0, 0, 0, 0.05);
        color: rgba(255, 255, 255, 0.8) !important;
        font-size: 14px;
        box-shadow: none;
        border-radius: 0;
        border: none;
        border-bottom: 1px solid #b689b0;
        padding-left: 30px;
        padding-right: 0;
        letter-spacing: 1px;
        transition: all 0.2s ease-in-out;
    }

    .form-group input:focus, .form-group input:active {
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
        background: rgba(0, 0, 0, 0.07);
        border-color: #b689b0;
    }

    .form-group .error--text {
        color: rgb(227, 38, 54);
    }

    a {
        transition: .3s all ease;
        color: #b689b0;
    }

    .btn.btn-primary {
        background: #b689b0;
        border: 1px solid #b689b0;
        color: #fff;
    }
</style>
