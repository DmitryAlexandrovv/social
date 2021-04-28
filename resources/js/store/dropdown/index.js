export default {
    namespaced: true,
    state: {
        items: [
            {
                title: 'New group',
                id: 0
            },
            {
                title: 'Contacts',
                id: 1
            },
            {
                title: 'Settings',
                component: 'Settings',
                id: 2
            },
        ],
    },
    getters: {
        socialQuickLinks: state => state.items,
    },
};
