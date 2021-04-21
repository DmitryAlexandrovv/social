<template>
    <div class="container">
        <Header/>
        <div class="chats-container">
            chats-container
        </div>
        <div class="selected-chat">
            selected-chat
        </div>
    </div>
</template>

<script>
    import Header from "./Header/Header";

    export default {
        name: "Profile",
        components: {
            Header
        }
    }
</script>
