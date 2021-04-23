<template>
    <fragment>
        <Header/>
    </fragment>
</template>

<script>
    import Vue from 'vue';
    import { Plugin } from 'vue-fragment';

    import Header from "./Header/Header";

    Vue.use(Plugin);

    export default {
        name: "Profile",
        components: {
            Header
        }
    }
</script>
