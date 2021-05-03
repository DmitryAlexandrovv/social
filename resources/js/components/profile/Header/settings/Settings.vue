<template>
    <fragment>
        <SocialModal
            :title="title"
            @close="close">
            <template slot="content">
                <div class="social-settings-header d-flex justify-content-start align-items-center px-4 py-4">
                    <img class="social-settings__avatar"
                         :src="user.path_to_image">
                    <div class="social-settings__name pl-3">
                        {{user.name}}
                    </div>
                    <div class="social-settings__upload-avatar">
                        <input @input.prevent="updateImage" type="file" name="image" id="social-settings__avatar">
                        <label for="social-settings__avatar" class="h3" id="social-settings__avatar-label">
                            <v-icon id="social-settings__avatar-icon">
                                mdi-camera
                            </v-icon>
                        </label>
                    </div>
                </div>

                <div class="social-settings-info d-flex flex-column align-items-start pl-4 mt-5">
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
                            <div class="social-settings-info-section-content__item social-settings__username">
                                <p v-if="!user.username"
                                   class="social--settings-info__item social--settings-info__set-username field-with-description"
                                   @click="setUsername('UsernameChange',
                                    {
                                        title: 'UsernameChange'
                                    },
                                    {
                                        height: 'auto',
                                        width: '300px'
                                    })">
                                    Set username
                                </p>
                                <p v-else
                                   class="social--settings-info__item social--settings-info__username field-with-description"
                                   @click="setUsername('UsernameChange',
                                    {
                                        title: 'UsernameChange'
                                    },
                                    {
                                        height: 'auto',
                                        width: '300px'
                                    })">
                                    {{user.username}}
                                </p>
                                <p class="social--settings-info__description">username</p>
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
    import axios from "axios";

    import SocialModal from "../../../abstract/modals/SocialModal";
    import UsernameChange from "./UsernameChange";

    Vue.use(Plugin);

    const { mapActions, mapGetters } = createNamespacedHelpers('User');

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
        computed: {
            ...mapGetters({
                user: 'user'
            })
        },
        methods: {
            ...mapActions(['setUser']),
            onLogout() {
                this.close();
                this.setUser({});

                this.$auth.logout({
                    makeRequest: true,
                    redirect: '/signIn'
                });
            },
            close() {
                this.$emit('close');
            },
            updateImage() {
                const data = new FormData(),
                      imageFile = document.querySelector('#social-settings__avatar');

                data.append('image', imageFile.files[0]);

                axios.post('updateUser/image', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(res => {
                    this.setUser(res.data.user);
                })
            },
            setUsername(component, componentProps, modalProps) {
                //Надо пробросить событие родителю
                this.$modal.show(
                    UsernameChange,
                    componentProps,
                    modalProps
                );
            }
        }
    }
</script>

<style>
    .social-settings-header {
        position: relative;
        border-bottom: 1px solid black;
        background: #000232;
    }

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
        color: #fff;
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

    .social-settings__upload-avatar {
        position: absolute;
        right: 0;
        bottom: 0;
        transform: translate3d(-20px, 50%, 0);

        background-color: #fff;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        border-radius: 50%;
        width: 50px;
        height: 50px;
    }

    #social-settings__avatar {
        display: none;
    }

    #social-settings__avatar-label {
        width: 100%;
        height: 100%;
        cursor: pointer;
        position: absolute;
    }

    #social-settings__avatar-icon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate3d(-50%, -50%, 0);
        cursor: pointer;
    }

    .social--settings-info__set-username, .social--settings-info__username {
        cursor: pointer;
        color: #3a6d99;
    }

    .social--settings-info__set-username:hover, .social--settings-info__username:hover {
        text-decoration: underline;
    }
</style>
