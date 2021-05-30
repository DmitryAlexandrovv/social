import Vue from 'vue';

//Тут храним contacts - поиск
export default {
    namespaced: true,
    state: {
        searchContacts: [
        ]
    },
    getters: {
        searchContacts: state => state.searchContacts
    },
    mutations: {
        setSearchContacts(state, searchContacts) {
            Vue.set(
                state,
                'searchContacts',
                searchContacts
            )
        }
    },
    actions: {
        setSearchContacts({ commit }, payload) {
            commit('setSearchContacts', payload);
        }
    }
};
