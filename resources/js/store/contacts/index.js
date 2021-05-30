import Vue from 'vue';

//Тут храним contacts - список контактов в левом сайдбаре, храним пользователей
export default {
    namespaced: true,
    state: {
        contacts: [
        ]
    },
    getters: {
        contacts: state => state.contacts
    },
    mutations: {
        addContact(state, contact) {
            let flag = true;

            state.contacts.forEach(item => {
                if (item.id === contact.id) {
                    flag = false;
                }
            });

            if (flag) {
                Vue.set(
                    state.contacts,
                    state.contacts.length,
                    contact
                )
            }
        }
    },
    actions: {
        addContact({ commit }, payload) {
            commit('addContact', payload);
        }
    }
};
