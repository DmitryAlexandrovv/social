<template>
    <v-app>
        <router-view>

        </router-view>
    </v-app>
</template>

<script>
    import Home from './home';
    export default {
        components: {
            Home
        },
        name: "App"
    }
</script>
