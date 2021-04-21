import Vue from 'vue'
import VueRouter from 'vue-router'
import {routes} from './routes';

Vue.use(VueRouter);

Vue.router = new VueRouter({
    routes,
    mode: 'history'
});

export default Vue.router;
