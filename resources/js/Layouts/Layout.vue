<template>
    <div class="">
        <Header />
        <slot />
    </div>
</template>

<script>
import Header from './Components/Header.vue';
export default {
    components: {
        Header
    }
}
</script>
