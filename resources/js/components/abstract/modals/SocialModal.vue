<template>
    <div class="social-modal pb-4">
        <div class="social-modal__header px-4">
            <p class="social-modal__link social-modal__title py-2">{{title}}</p>
            <p class="social-modal__link social-modal__close py-2" @click.prevent="close">Close</p>
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

<style>
    .social-modal__header {
        background: #000232;
        color: #fff;

        display: flex;
        justify-content: space-between;
    }

    .social-modal .social-modal__link {
        cursor: pointer;
        color: #dde8f1;
    }

    .social-modal .social-modal__link:hover {
        color: #fff;
    }
</style>
