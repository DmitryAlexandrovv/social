<template>
    <div class="notification">
        <div class="notification__item d-flex justify-content-start"
            v-for="notification in notifications">
            <div class="notification__avatar">
                <img :src="notification.pathToImage" class="avatar">
            </div>
            <div class="notification__content">
                <p class="notification__username">{{notification.sender_name}}</p>
                <p class="notification__message">{{notification.content}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    import {createNamespacedHelpers} from "vuex";

    const { mapGetters } = createNamespacedHelpers('Notifications');

    export default {
        name: "Notification",
        computed: {
            ...mapGetters(['notifications'])
        },
        mounted() {
            console.log('mounted');
            console.log(this.notifications);
        }
    }
</script>

<style scoped>
    .notification {
        position: absolute;
        left: 0;
        bottom: 0;

        display: flex;
        flex-direction: column;

        margin: 0 0 10px 10px;
    }

    .notification__item {
        width: 300px;
        height: 80px;
        box-shadow: 0px 0px 34px 5px rgb(0 0 0 / 24%);
        background-color: #fff;
        padding: 10px;
    }

    .notification__item:not(:last-child) {
        margin-bottom: 10px;
    }

    .notification p {
        margin: 0;
    }

    .notification__avatar .avatar {
        display: block;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .notification__content {
        margin-left: 12px;
    }
</style>
