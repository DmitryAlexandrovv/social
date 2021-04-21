<template>
    <div class="header">
        Header
        <span class="fa fa-times" @click="onLogout">
            <font-awesome-icon icon="times"/>
        </span>
    </div>
</template>

<script>
    export default {
        name: "Header",
        methods: {
            onLogout() {
                this.$auth.logout({
                        makeRequest: true,
                        redirect: '/'
                    }).then((res) => {
                        console.log(res);
                    }).catch(error => {
                        console.error('something goes wrong');
                });
            }
        }
    }
</script>
