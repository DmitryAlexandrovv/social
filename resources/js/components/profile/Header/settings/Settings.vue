<template>
    <fragment>
        <SocialModal
            :title="title"
            @close="close">
            <template slot="content">
                <div class="social-settings-header d-flex justify-content-start align-items-center px-4 py-4">
                    <img class="social-settings__avatar" src="data:image/jpeg;base64,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">
                    <div class="social-settings__name pl-3">
                        {{user.name}}
                    </div>
                </div>

                <hr>

                <div class="social-settings-info d-flex flex-column align-items-start pl-4">
                    <div class="social-settings-info-section d-flex align-items-start justify-content-center">
                        <v-icon class="mr-4">
                            mdi-phone
                        </v-icon>

                        <div class="social-settings-info-section-content">
                            <div class="social-settings-info-section-content__item social-settings__phone">
                                <p class="social--settings-info__item field-with-description">{{user.phone}}</p>
                                <p class="social--settings-info__description field-with-description">phone</p>
                            </div>
                            <div class="social-settings-info-section-content__item social-settings__email">
                                <p class="social--settings-info__item field-with-description">{{user.email}}</p>
                                <p class="social--settings-info__description">e-mail</p>
                            </div>
                        </div>
                    </div>

                    <div class="social-settings-info-section d-flex align-items-start">
                        <v-icon class="mr-4">
                            mdi-reorder-horizontal
                        </v-icon>

                        <div class="social-settings-info-section-content">
                            <div class="social-settings-info-section-content__item social-settings__logout">
                                <p class="social-settings__link" @click="onLogout">Log out</p>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </SocialModal>
    </fragment>
</template>

<script>
    import Vue from 'vue';
    import { Plugin } from 'vue-fragment';
    import { createNamespacedHelpers } from 'vuex';

    import SocialModal from "../../../abstract/modals/SocialModal";

    Vue.use(Plugin);

    const { mapActions } = createNamespacedHelpers('User');

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
        data() {
            return {
                user: JSON.parse(localStorage.getItem('user'))
            }
        },
        methods: {
            ...mapActions(['setUser']),
            onLogout() {
                this.close();
                localStorage.removeItem('user');

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
    .social-settings-info-section {
        margin-bottom: 12px;
    }

    .social-settings-info-section-content__item {
        margin-bottom: 10px;
    }

    .social-settings__logout {
        cursor: pointer;
    }

    .social-settings__name {
        font-size: 14px;
        font-weight: 700;
    }

    .social-settings__avatar {
        display: block;
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }

    .social--settings-info__item {
        padding: 4px 0;
        line-height: 16px;
    }

    .social--settings-info__item.field-with-description {
        padding: 0;
    }

    .social--settings-info__description {
        color: #909090;
        font-size: 11px;
        line-height: 10px;
        margin-top: 4px;
    }

    .social-settings__link:hover {
        color: #9048d4;
    }
</style>
