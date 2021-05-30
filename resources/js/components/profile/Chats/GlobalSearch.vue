<template>
    <fragment>
        <div class="global-search-description">
            Global search
        </div>
        <div class="chats-list global-search-list">
            <chat-item
                v-for="item in items"
                :key="item.id"
                :interlocutor-name="item.name"
                :path-to-image="item.path_to_image"
                :selected="item.selected"
                :user-id="item.id"
                @selectRecipient="selectRecipient"/>
        </div>
    </fragment>
</template>

<script>
    import axios from "axios";
    import ChatItem from "./ChatItem";

    export default {
        name: "GlobalSearch",
        components: {
            ChatItem
        },
        props: {
            searchText: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                items: []
            }
        },
        watch: {
            searchText(val) {
                this.findUsersByUsername(val);
            }
        },
        methods: {
            selectRecipient(recipientId) {
                this.$emit('selectRecipient', recipientId);
            },
            findUsersByUsername(value) {
                axios.post('/user/findByUsername/', {
                    username: value
                }).then(res => {
                    this.items = res.data;
                });
            }
        }
    }
</script>

<style scoped>

</style>
