<template>
    <div>
        <h1 class="title">Social Network</h1>
        <p>Lorem ipsum description</p>
        <div class="auth-buttons">
            <router-link to="/signIn">
                <button>Войти</button>
            </router-link>
            <router-link to="/signUp">
                <button>Регистрация</button>
            </router-link>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Home"
    }
</script>

<style scoped>

</style>
