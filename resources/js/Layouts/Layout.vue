<template>
    <div class="bg-amber-300">
        <Header />
        <div class="container mx-auto ">
            <slot />
        </div>
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
