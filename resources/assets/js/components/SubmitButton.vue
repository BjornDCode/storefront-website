<template>
    <button 
        type="submit" 
        class="button" 
        :class="loading ? 'loading' : ''" 
        :disabled="loading || hasErrors || completed"
    >
        <span v-if="loading">
            <span class="loader">
                <span class="circle"></span>
            </span>
        </span>
        <span class="completed" v-else-if="completed">
            <slot name="completed">
                    Completed
            </slot>
        </span>
        <slot>
            Submit
        </slot>
    </button>
</template>

<script>
    export default {
        props: {
            loading: {
                type: Boolean,
                required: true
            },
            hasErrors: {
                type: Boolean,
                required: true
            },
            completed: {
                type: Boolean,
                required: true
            }
        }
    }
</script>
