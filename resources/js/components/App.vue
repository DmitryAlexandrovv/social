<template>
    <div class="container">
        <router-view>

        </router-view>
    </div>
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
