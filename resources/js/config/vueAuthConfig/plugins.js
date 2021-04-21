import Vue from 'vue'

import auth                  from '@websanova/vue-auth/src/v2.js';
import driverAuthBearer      from '@websanova/vue-auth/dist/drivers/auth/bearer.js';
import driverHttpAxios       from '@websanova/vue-auth/dist/drivers/http/axios.1.x.js';
import driverRouterVueRouter from '@websanova/vue-auth/dist/drivers/router/vue-router.2.x.js';

Vue.use(auth, {
    plugins: {
        http: Vue.axios,
        router: Vue.router,
    },
    drivers: {
        auth: driverAuthBearer,
        http: driverHttpAxios,
        router: driverRouterVueRouter,
    },
    stores: ['storage', 'cookie'],
});
