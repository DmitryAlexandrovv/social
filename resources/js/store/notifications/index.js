import Vue from 'vue';

export default {
    namespaced: true,
    state: {
        notifications: [

        ]
    },
    getters: {
        notifications: state => state.notifications
    },
    mutations: {
        addNotification(state, notification) {
            Vue.set(
                state.notifications,
                state.notifications.length,
                notification
            )
        },
        removeNotification(state, notification) {
            let indexToDelete = null;

            state.notifications.forEach((item, index) => {
                if (item.id === notification.id) {
                    indexToDelete = index;
                }
            });

            state.notifications.splice(indexToDelete, 1);
        }
    },
    actions: {
        addNotification({ commit }, payload) {
            commit('addNotification', payload);
        },
        removeNotification({ commit }, payload) {
            commit('removeNotification', payload);
        }
    }
};
