import Vue from 'vue';
import vuex from 'vuex';

Vue.use(vuex);
import Dropdown from '../../store/dropdown';
import User from '../../store/user';

export default new vuex.Store({
    modules: {
        Dropdown,
        User
    }
});
