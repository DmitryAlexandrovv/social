<template>
    <div class="chats-list">
        <v-text-field
            class="chats-list__search"
            label="Search"
            color="purple darken-2"
        ></v-text-field>
        <chat-item
            v-for="item in items"
            :key="item.id"
            :interlocutor-name="item.name"
            :path-to-image="item.pathToImage"
            :selected="item.selected"/>
    </div>
</template>

<script>
    import ChatItem from "./ChatItem";

    export default {
        name: "ChatsList",
        components: {
            ChatItem
        },
        data() {
            return {
                items: [
                    {
                        id: 0,
                        name: 'Almaz',
                        pathToImage: 'storage/defaults/avatar/avatar.png'
                    },
                    {
                        id: 1,
                        name: 'Ruslan',
                        pathToImage: 'storage/uploads/16/avatar/avatar',
                        selected: true
                    }
                ]
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
