<template>
        <div class="chats-list">
            <v-text-field
                class="chats-list__search"
                label="Search"
                color="purple darken-2"
                v-model="searchText"
                @input="findUsersByUsername"
            ></v-text-field>
            <chat-item
                v-for="item in items"
                :key="item.id"
                :interlocutor-name="item.name"
                :path-to-image="item.path_to_image"
                :selected="item.selected"
                :user-id="item.id"
                @selectRecipient="selectChat"/>
            <div v-show="isShowGlobal">
                <GlobalSearch
                    :search-text="searchText"
                    @selectRecipient="selectChat"
                />
            </div>
        </div>
</template>

<script>
    import ChatItem from "./ChatItem";
    import GlobalSearch from "./GlobalSearch";
    import axios from "axios";
    import {createNamespacedHelpers} from 'vuex';

    const {
        mapGetters: mapGettersUser
    } = createNamespacedHelpers('User');

    const {
        mapGetters: mapGettersSearch,
        mapActions: mapActionsSearch
    } = createNamespacedHelpers('Search');

    const { mapGetters: mapGettersSelectedChat,
            mapActions: mapActionsSelectedChat
    } = createNamespacedHelpers('SelectedChat');

    const {
        mapGetters: mapGettersMessages,
        mapActions: mapActionsMessages
    } = createNamespacedHelpers('Messages');

    const {
        mapGetters: mapGettersContacts,
        mapActions: mapActionsContacts
    } = createNamespacedHelpers('Contacts');

    export default {
        name: "ChatsList",
        components: {
            ChatItem,
            GlobalSearch
        },
        data() {
            return {
                searchText: '',
                items: [],
                isShowGlobal: false
            }
        },
        computed: {
            ...mapGettersUser(['user']),
            ...mapGettersSearch(['searchContacts']),
            ...mapGettersMessages(['messages']),
            ...mapGettersContacts(['contacts'])
        },
        created() {
            this.items = this.contacts;
        },
        methods: {
            ...mapActionsSearch(['setSearchContacts']),
            ...mapActionsSelectedChat(['setSelectedChat']),
            ...mapActionsMessages(['addMessage', 'setMessages']),
            ...mapActionsContacts(['addContact']),
            async selectChat(recipientId) {
                const chat = await axios.post('/room/findChatRoom', {
                    recipientId,
                    senderId: this.user.id
                });

                const recipient = await axios.post('user/findById', {
                    recipientId
                });

                this.setSelectedChat(chat.data);
                this.addContact(recipient.data);

                axios.get(`/room/getRoomMessages/${chat.data.id}`)
                .then(res => {
                    this.setMessages({
                        messages: res.data,
                        chatId: chat.data.id,
                        userId: this.userId
                    })
                })
            },
            findUsersByUsername(value) {
                this.isShowGlobal = value !== '';

                const contacts = this.contacts;

                this.items = contacts.filter(item => {
                    console.log(item);
                    return item.username.includes(value);
                });
            }
        }
    }
</script>

<style scoped>
    .chats-list {
        border-right: 2px solid #E9EBED;
    }

    .chats-list__search {
        padding-left: 10px;
        padding-right: 6px;
    }
</style>
