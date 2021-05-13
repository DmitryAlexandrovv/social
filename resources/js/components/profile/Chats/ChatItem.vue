<template>
    <div :class="chatItemClass">
        <div class="interlocutor-avatar">
            <img :src="pathToImage">
        </div>
        <div class="interlocutor-info ml-2 py-1">
            <p>{{interlocutorName}}</p>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ChatItem",
        props: {
            interlocutorName: {
                type: String,
            },
            pathToImage: {
                type: String,
            },
            selected: {
                type: Boolean,
                default: false
            }
        },
        computed: {
            chatItemClass() {
                return {
                    'chat-item d-flex': true,
                    'selected': this.selected
                }
            }
        }
    }
</script>

<style scoped>
    .chat-item {
        padding: 4px 0 4px 10px;
    }

    .chat-item.selected {
        background: red;
    }

    .chat-item:hover {
        background: #f2f6fa;
        cursor: pointer;
    }

    .interlocutor-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .interlocutor-avatar img {
        display: block;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .interlocutor-info p {
        font-size: 15px;
        font-weight: 600;
        margin: 0;
    }
</style>
