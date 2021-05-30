<template>
    <div class="d-flex flex-column h-100">
        <Header/>
        <div class="social-content d-flex h-100">
            <ChatsList
                class="col-md-4 p-0 h-100"
            />
            <SelectedChat
                class="col-md-8 h-100"
                v-if="this.selectedChat"
            />
        </div>
        <Notification/>
    </div>
</template>

<script>
    import Header from "./Header/Header";
    import ChatsList from "./Chats/ChatsList";
    import SelectedChat from "./SelctedChat/SelectedChat";
    import Notification from "../notification/Notification";
    import {createNamespacedHelpers} from "vuex";
    import echoCreate from "../../util/echoCreate";

    const {
        mapGetters: mapGettersUser
    } = createNamespacedHelpers('User');

    const {
        mapGetters: mapGettersSelectedChat
    } = createNamespacedHelpers('SelectedChat');

    const {
        mapActions: mapActionsNotifications
    } = createNamespacedHelpers('Notifications');

    const {
        mapGetters: mapGettersMessages,
        mapActions: mapActionsMessages
    } = createNamespacedHelpers('Messages');

    const {
        mapActions: mapActionsContacts
    } = createNamespacedHelpers('Contacts');


    export default {
        name: "Profile",
        components: {
            Notification,
            Header,
            ChatsList,
            SelectedChat
        },
        computed: {
            ...mapGettersUser(['user']),
            ...mapGettersSelectedChat(['selectedChat']),
        },
        mounted() {
            const Echo = echoCreate({
                token: "Bearer " + localStorage.getItem('auth_token_default')
            });

            Echo.private(`notification.${this.user.id}`)
                .listen('ChatNotification', (e) => {
                    if (this.user.id === e.message.recipient_id) {
                        //TODO ужасный костыль, надо с сервера отправлять в правильном виде
                        const pathToImage = e.sender.path_to_image,
                              message = {
                                  ...e.message,
                                  pathToImage
                              };

                        const messageItem = {
                            ...e.message,
                            path_to_image: pathToImage
                        }

                        this.addNotification(message);
                        this.addMessage(messageItem);
                        this.addContact(e.sender);

                        //Переделать на плавное удаление
                        window.setTimeout(() => {
                            this.removeNotification(e.message);
                        }, 7000);
                    }
                });
        },
        methods: {
            ...mapActionsNotifications(['addNotification', 'removeNotification']),
            ...mapActionsMessages(['addMessage']),
            ...mapActionsContacts(['addContact'])
        }
    }
</script>

<style scoped>
    .social-content {
        border-left: 1px solid #dfe5ec;
        border-right: 1px solid #dfe5ec;
        box-shadow: 0px 1px 0 #dfe5ec;
        background: #fff;
    }
</style>
