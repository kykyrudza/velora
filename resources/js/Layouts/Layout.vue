<template>
    <div class="">
        <Header :auth="auth"/>
        <slot />
    </div>
</template>

<script>
import Header from './Components/Header.vue';
export default {
    components: {
        Header
    },
    props: {
        auth: {
            type: Object,
            required: true
        }
    }
}
</script>
