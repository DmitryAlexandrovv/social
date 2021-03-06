import Vue from 'vue';

import http   from './config/http';
import router from './config/router'
import config from './config/vueAuthConfig';
import vuetify from "./config/vuetify";
import store from './config/store';
import './config/fontAwesome';
import './config/pusher';

//TODO вынести в отдельный конфиг

import PerfectScrollbar from 'vue2-perfect-scrollbar'
import 'vue2-perfect-scrollbar/dist/vue2-perfect-scrollbar.css'

Vue.use(PerfectScrollbar)

// window.Vue = require('vue').default;

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('App', require('./components/App.vue').default);

import App from './components/App';

Vue.config.productionTip = false;

new Vue({
    el: '#app',
    vuetify,
    router,
    http,
    config,
    store,
    components: {
        App
    }
});
