<template>
    <v-app>
        <div class="container">
            <router-view>

            </router-view>
        </div>
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
