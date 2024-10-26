<template>
    <div>
        <pre>
           User: {{ user }}
        </pre>
    </div>

    <Link :href="route('logout')">
        logout
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    name: "Edit",
    props: {
        user: Object,
    },
    components: {
        Link
    },
}
</script>

