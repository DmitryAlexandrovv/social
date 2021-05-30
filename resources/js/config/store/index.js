import Vue from 'vue';
import vuex from 'vuex';
import createPersistedState from "vuex-persistedstate";

//TODO надо переделать на хранение в куки, читать https://www.npmjs.com/package/vuex-persistedstate#:~:text=using%20cookies%20(universal%20client%20%2B%20server-side)

Vue.use(vuex);
import Dropdown from '../../store/dropdown';
import User from '../../store/user';
import SelectedChat from '../../store/selectedChat';
import Contacts from '../../store/contacts';
import Notifications from '../../store/notifications';
import Messages from '../../store/messages';
import Search from '../../store/search'

export default new vuex.Store({
    modules: {
        Dropdown,
        User,
        SelectedChat,
        Contacts,
        Notifications,
        Messages,
        Search
    },
    plugins: [createPersistedState()],
});
