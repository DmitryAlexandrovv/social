<template>
    <div class="row justify-content-center vh-100 align-items-center">
        <div class="col-md-6 col-lg-4">
            <div class="login-wrap py-5">
                <div class="img d-flex align-items-center justify-content-center"></div>
                <slot name="content"></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "AuthTemplate"
    }
</script>

<style scoped>
    .login-wrap {
        position: relative;
        background: #fff;
        border-radius: 5px;
        padding-left: 30px;
        padding-right: 30px;
        box-shadow: 0px 10px 34px -15px rgba(0, 0, 0, 0.24);
    }
</style>
