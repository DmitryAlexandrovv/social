import Vue from 'vue';

export default {
    namespaced: true,
    state: {
        selectedChat: null
    },
    getters: {
        selectedChat: state => state.selectedChat
    },
    mutations: {
        setSelectedChat(state, selectedChat) {
            Vue.set(
                state,
                'selectedChat',
                selectedChat
            )
        }
    },
    actions: {
        setSelectedChat({ commit }, payload) {
            commit('setSelectedChat', payload);
        }
    }
};
