<template>
    <div>
        <Header/>
        <div class="social-content d-flex">
            <ChatsList
                class="col-md-4 p-0"
            />
        </div>
    </div>
</template>

<script>
    import Header from "./Header/Header";
    import ChatsList from "./Chats/ChatsList";

    export default {
        name: "Profile",
        components: {
            Header,
            ChatsList
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
