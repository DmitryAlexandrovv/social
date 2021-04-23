<template>
    <div class="header">
        <v-menu
            offset-y
            rounded="0"
        >
            <template v-slot:activator="{ attrs, on }">
                <v-btn
                    color="transparent"
                    class="white--text"
                    height="auto"
                    elevation="0"
                    v-bind="attrs"
                    v-on="on"
                >
                    <span class="px-16 py-4">
                        Social
                    </span>
                </v-btn>
            </template>

            <v-list>
                <v-list-item
                    v-for="item in items"
                    :key="item.id"
                    link
                >
                    <v-list-item-title v-text="item.title"></v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
        <span class="fa fa-times" @click="onLogout">
            Logout
<!--            <font-awesome-icon icon="times"/>-->
        </span>
    </div>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';

    const { mapGetters } = createNamespacedHelpers('Dropdown');

    export default {
        name: "Header",
        data() {
            return {
                items: {}
            }
        },
        mounted() {
            this.items = {...this.socialQuickLinks};
        },
        computed: {
            ...mapGetters(['socialQuickLinks'])
        },
        methods: {
            onLogout() {
                this.$auth.logout({
                        makeRequest: true,
                        redirect: '/'
                    }).catch(error => {
                        console.error(error);
                });
            }
        }
    }
</script>

<style scoped>
    .v-menu {
        position: absolute;
    }

    .header {
        background: #000232;
        color: #fff;
    }

    .social-dropdown--list {
        background-color: #fff;
    }
</style>
