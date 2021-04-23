import Vue from 'vue';
import vuex from 'vuex';

Vue.use(vuex);
import Dropdown from '../../../js/components/profile/Header/dropdown/store/dropdown';

export default new vuex.Store({
    modules: {
        Dropdown
    }
});
