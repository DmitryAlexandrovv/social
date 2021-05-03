<template>
    <social-modal title="Username" @close="close">
        <template slot="content">
            <div class="social-settings-info d-flex flex-column align-items-start px-4 mt-5">
                <div class="social-settings-info-section d-flex align-items-start justify-content-center">

                    <div class="social-settings-info-section-content">
                        <div class="social-settings-info-section-content__item social-settings__phone">
                            <v-text-field
                                v-model="user.username"
                                :error-messages="checkError('username')"
                                color="purple darken-2"
                                label="Username"
                                required
                            ></v-text-field>
                            <p class="social--settings-info__description username-change__description field-with-description">
                                You can choose a username on <b>Social</b>. If you do, other people will be able to find you by this username and contact you without knowing your phone number.
                                You can use a-z, 0-9 and underscores.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="social-settings-footer d-flex justify-content-end align-items-center px-4 pt-2">
                <p class="social-modal__link social-modal__save" @click.prevent="save">Save</p>
            </div>
        </template>
    </social-modal>
</template>

<script>
    import { createNamespacedHelpers } from 'vuex';
    import axios from "axios";

    import SocialModal from "../../../abstract/modals/SocialModal";

    const { mapActions, mapGetters} = createNamespacedHelpers('User');

    export default {
        name: "UsernameChange",
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
                username: '',
                errors: {},
            }
        },
        computed: {
            ...mapGetters(['user'])
        },
        methods: {
            ...mapActions(['setUser']),
            close() {
                this.$emit('close');
            },
            save() {
                axios.post('updateUser/username',
                    {
                    username: this.user.username
                }, {
                    headers: {
                        'Content-type': 'application/json'
                    }
                }).then(res => {
                    this.setUser(res.data.user);
                }).catch(error => {
                    this.errors = error.response.data.errors;
                })
            },
            checkError(field) {
                return this.errors.hasOwnProperty(field) ? this.errors[field] : [];
            }
        }
    }
</script>

<style scoped>
    .social-modal__save {
        color: #4680b3;
        padding: 3px 6px;
    }

    .social-modal__save:hover {
        color: #4680b3;
        background-color: #f2f6fa;
    }

    .username-change__description {
        color: #777;
        line-height: 160%;
        font-size: 13px;
    }

    .error--text {
        color: rgb(227, 38, 54);
    }
</style>
