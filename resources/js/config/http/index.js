import Vue from 'vue';

// Vue Resource
// import VueResource from 'vue-resource';
//
// Vue.use(VueResource);
// Vue.http.options.root = 'http://localhost:8080/';

// Axios
import axios    from 'axios';
import VueAxios from 'vue-axios';

axios.defaults.baseURL = 'http://localhost:8000/api';
Vue.use(VueAxios, axios);

export default {
    root: 'http://localhost:8000/'
};
