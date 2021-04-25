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
                    <v-list-item-title
                        @click="showModal(item.component, {
                            title: item.title
                        })"
                       v-text="item.title">

                    </v-list-item-title>
                </v-list-item>
            </v-list>
        </v-menu>
    </div>
</template>

<script>
    import Vue from 'vue';
    import VModal from 'vue-js-modal'
    import { createNamespacedHelpers } from 'vuex';
    import Settings from "./settings/Settings";

    const { mapGetters } = createNamespacedHelpers('Dropdown');

    Vue.use(VModal);

    export default {
        name: "Header",
        data() {
            return {
                items: {}
            }
        },
        components: {
            Settings
        },
        mounted() {
            this.items = {...this.socialQuickLinks};
        },
        computed: {
            ...mapGetters(['socialQuickLinks'])
        },
        methods: {
            showModal(component, props) {
                switch (component) {
                    case 'Settings':
                        this.$modal.show(
                            Settings,
                            props
                        );
                }
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
