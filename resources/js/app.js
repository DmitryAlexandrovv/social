import Vue from 'vue';

import router from './config/router'
import config from './config/vueAuthConfig';
import http   from './config/http';
import vuetify from "./config/vuetify";
import './config/bootstrap';

// window.Vue = require('vue').default;

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('App', require('./components/App.vue').default);

import App from './components/App';

Vue.config.productionTip = false;

new Vue({
    el: '#app',
    vuetify,
    router: router,
    http: http,
    config: config,
    components: {
        App
    }
});
