<template>
    <div class="social-modal">
        <div class="social-modal__header">
            <p class="social-modal__title">{{title}}</p>
            <p class="social-modal__close" @click.prevent="close">Close</p>
        </div>
        <slot name="content"></slot>
    </div>
</template>

<script>
    export default {
        name: "SocialModal",
        props: {
            title: {
                type: String,
                required: true
            }
        },
        methods: {
            close() {
                this.$emit('close');
            }
        }
    }
</script>

<style scoped>
    .social-modal__header {
        background: #000232;
        color: #fff;

        display: flex;
        justify-content: space-between;
    }

    .social-modal__header p {
        margin: 10px 20px 10px 20px;
    }

    .social-modal__close {
        cursor: pointer;
    }
</style>
