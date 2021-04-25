<template>
    <div class="d-flex flex-column align-items-center justify-content-center h-100">
        <h1 class="title">Social Network</h1>
        <div class="auth-buttons">
            <router-link to="/signIn">
                <v-btn
                    width="150px"
                    depressed
                    color="primary"
                    type="submit">
                    Войти
                </v-btn>
            </router-link>
            <router-link to="/signUp">
                <v-btn
                    width="150px"
                    depressed
                    color="primary"
                    type="submit">
                    Регистрация
                </v-btn>
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
