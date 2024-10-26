
<template>
    <div class="flex w-full">
        <div class="w-1/2">
            <pre>
               User: {{ user }}
            </pre>
        </div>
        <div class="w-1/2">
            <pre>
                Recipes: {{ recipes }}
            </pre>
        </div>
    </div>


    <Link :href="route('logout')">
        logout
    </Link>
    <Link :href="route('profile.edit', user.id)">
        edit profile
    </Link>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
    name: "Index",
    props: {
        user: Object,
        recipes: Object,
    },
    components: {
        Link
    },
}
</script>

