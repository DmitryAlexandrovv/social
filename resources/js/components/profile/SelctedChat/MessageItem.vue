<template>
    <div class="message d-flex justify-content-start">
        <div class="sender__avatar">
            <img class="avatar" :src="pathToImage">
        </div>
        <div class="content_container">
            <p class="message__username">{{userName}}</p>
            <p class="message__content">{{content}}</p>
        </div>
        <div class="message__date">
            <p class="date">{{formattedDate}}</p>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        name: "MessageItem",
        props: {
            pathToImage: {
                type: String,
                required: true
            },
            userName: {
                type: String,
                required: true
            },
            content: {
                type: String,
                required: true
            },
            date: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                formattedDate: ''
            }
        },
        mounted() {
            this.formattedDate = moment(this.date).format('h:mm:ss a').toUpperCase();
        }
    }
</script>

<style scoped>
    .message {
        position: relative;
        margin-bottom: 10px;
    }

    .content_container {
        margin: 0 0 0 10px;
    }

    .message__username {
        margin: 0;
        font-size: 14px;
        color: #3a6d99;
        font-weight: 700;
    }

    .message__username:hover {
        cursor: pointer;
        text-decoration: underline;
    }

    .message__content {
        line-height: 150%;
        margin: 0;
    }

    .sender__avatar .avatar {
        display: block;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .message__date {
        position: absolute;
        top: 50%;
        right: 0;
        transform: translateY(-50%);
    }

    .content_container {
        margin-right: 90px;
    }
</style>
