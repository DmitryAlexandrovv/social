<template>
    <div class="social-modal pb-4">
        <div class="social-modal__header px-4">
            <p class="social-modal__title py-2">{{title}}</p>
            <p class="social-modal__close py-2" @click.prevent="close">Close</p>
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

    .social-modal__close {
        cursor: pointer;
        color: #dde8f1;
    }

    .social-modal__close:hover {
        color: #fff;
    }
</style>
