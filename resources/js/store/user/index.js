import Vue from 'vue';

export default {
    namespaced: true,
    state: {
        user: {
            email: null,
            id: null,
            is_active: null,
            is_blocked: null,
            is_reported: null,
            name: null,
            phone: null
        }
    },
    getters: {
        user: state => state.user
    },
    mutations: {
        setUser(state, user) {
            Vue.set(
                state,
                'user',
                user
            )
        }
    },
    actions: {
        setUser({ commit }, payload) {
            commit('setUser', payload);
        }
    }
};
