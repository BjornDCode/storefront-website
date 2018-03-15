<template>
    <div class="feature">
        <div class="feature--header" @click="toggleContent">
            <h4>{{ title }}</h4>
            <span class="icon" :class="open ? 'open' : ''"></span>
        </div>
        <div class="feature--body" v-show="open">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                required: true
            }
        },

        data() {
            return {
                open: false
            }
        },

        methods: {

            toggleContent() {
                this.open = !this.open;
            }

        }
    }
</script>
