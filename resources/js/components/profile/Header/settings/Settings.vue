<template>
    <fragment>
        <SocialModal
            :title="title"
            @close="close">
            <template slot="content">
                <div class="social-settings__logout" @click="onLogout">
                    Log out
                </div>
            </template>
        </SocialModal>
    </fragment>
</template>

<script>
    import Vue from 'vue';
    import { Plugin } from 'vue-fragment';

    import SocialModal from "../../../abstract/modals/SocialModal";

    Vue.use(Plugin);

    export default {
        name: "Settings",
        components: {
            SocialModal
        },
        props: {
            title: {
                type: String,
                required: true
            }
        },
        methods: {
            onLogout() {
                this.close();

                this.$auth.logout({
                    makeRequest: true,
                    redirect: '/signIn'
                });
            },
            close() {
                this.$emit('close');
            }
        }
    }
</script>

<style scoped>
    .social-settings__logout {
        cursor: pointer;
    }
</style>
