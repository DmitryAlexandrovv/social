import Vue from 'vue';

export default {
    namespaced: true,
    state: {
        messages: [

        ]
    },
    getters: {
        messages: (state) => (chatId) => state.messages[chatId]
    },
    mutations: {
        addMessage(state, message) {
            if (state.messages[message.chat_id]) {
                Vue.set(
                    state.messages[message.chat_id],
                    state.messages[message.chat_id].length,
                    message
                );
            } else {
                Vue.set(
                    state.messages,
                    message.chat_id,
                    [message]
                );
            }
        },
        setMessages(state, {messages, chatId}) {
            if (state.messages[chatId]) {
                state.messages.splice(0, messages);
            } else {
                Vue.set(
                    state.messages,
                    chatId,
                    [...messages]
                );
            }
        },
    },
    actions: {
        addMessage({ commit }, payload) {
            commit('addMessage', payload);
        },
        setMessages({ commit }, payload) {
            commit('setMessages', payload);
        },
    }
};
