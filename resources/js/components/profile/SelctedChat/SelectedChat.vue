<template>
    <div class="selected_chat">
            <div class="messages_container d-flex flex-column">
                <perfect-scrollbar
                    :options="{
                        suppressScrollX: true,
                        wheelPropagation: false,
                        wheelSpeed: 0.2
                    }"
                    class="messages__scrollbar">
                    <MessageItem
                        v-for="message in selectedChatMessages"
                        :key="message.id"
                        :path-to-image="message.path_to_image"
                        :user-name="message.sender_name"
                        :content="message.content"
                        :date="message.created_at"
                    ></MessageItem>
                </perfect-scrollbar>
            </div>
            <div class="selected_chat__send_message">
                <v-text-field
                    label="Write a message"
                    width="100%"
                    color="purple darken-2"
                    v-model="textMessage"
                />
                <button class="send_message__button" @click="sendMessage">Send</button>
            </div>
    </div>
</template>

<script>
    import axios from "axios";
    import {createNamespacedHelpers} from "vuex";
    import MessageItem from "./MessageItem";
    import { PerfectScrollbar } from 'vue2-perfect-scrollbar'
    import echoCreate from "../../../util/echoCreate";

    const {
        mapGetters: mapGettersUser
    } = createNamespacedHelpers('User');

    const {
        mapGetters: mapGettersSelectedChat
    } = createNamespacedHelpers('SelectedChat');

    const {
        mapGetters: mapGettersMessages,
        mapActions: mapActionsMessages
    } = createNamespacedHelpers('Messages');

    export default {
        name: "SelectedChat",
        components: {
            MessageItem,
            PerfectScrollbar
        },
        data() {
            return {
                textMessage: '',
            }
        },
        computed: {
            ...mapGettersUser(['user']),
            ...mapGettersSelectedChat(['selectedChat']),
            ...mapGettersMessages(['messages']),
            selectedChatMessages() {
                return this.messages(this.selectedChat.id);
            }
        },
        mounted() {
            const messagesContainer = document.querySelector('.messages_container'),
                  chatHeight = document.querySelector('.selected_chat').clientHeight;

            if (messagesContainer) {
                messagesContainer.style.height = chatHeight - 200 + 'px';
            }

            this.setScrollbar();
        },
        methods: {
            ...mapActionsMessages(['addMessage']),
            sendMessage() {
                //TODO проблемы с определеним пользователя, надо думать как сделать правильно
                const recipientId = this.selectedChat.recipient_id === this.user.id ? this.selectedChat.sender_id : this.selectedChat.recipient_id;

                axios.post('/chat/message', {
                    message: this.textMessage,
                    recipientId,
                    senderId: this.user.id,
                    chatId: this.selectedChat.id
                }).then(res => {
                    console.log(res);
                    console.log('send');

                    const message = {
                        ...res.data,
                        path_to_image: this.user.path_to_image
                    }

                    this.addMessage(message);
                }).finally(res => {
                    this.textMessage = '';
                })
            },
            setScrollbar() {
                const messagesScrollbar = document.querySelector('.messages__scrollbar');
                messagesScrollbar.scrollTop = messagesScrollbar.scrollHeight;
            }
        }
    }
</script>

<style scoped>
    .messages_container {
        width: 70%;
        height: 400px;
    }

    .messages_container > :first-child {
        margin-top: auto;
    }

    .selected_chat {
        align-items: center;
        display: flex;
        flex-direction: column;

        position: relative;
    }

    .selected_chat__send_message {
        position: absolute;
        bottom: 0;
        margin-bottom: 30px;
        height: 100px;
        width: 70%;
    }

    .messages__scrollbar {
        padding-right: 30px;
    }
</style>
