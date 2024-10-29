<template>
    <Link
        class="group relative block rounded-xl focus:outline-none"
        :href="route('home')">
        <div class="shrink-0 relative rounded-xl overflow-hidden w-full h-[350px] before:absolute before:inset-x-0 before:z-[1] before:size-full before:bg-gradient-to-t before:from-gray-900/70">
            <img
                class="size-full absolute top-0 start-0 object-cover"
                :src="`http://127.0.0.1:8000/${recipes.image}`"
                :alt="recipes.name">
        </div>

        <div class="absolute top-0 inset-x-0 z-10">
            <div class="p-4 flex flex-col h-full sm:p-6">
                <!-- Avatar -->
                <div class="flex items-center justify-between">
                    <div class="shrink-0">
                        <ul class="flex flex-wrap gap-2">
                            <li v-for="ingredient in recipes.ingredients" :key="ingredient.id"
                                class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs sm:text-sm font-medium text-gray-700 ring-1 ring-gray-500/10">
                                {{ ingredient.name }}
                            </li>
                        </ul>
                    </div>
                    <div class="ms-2.5 sm:ms-4">
                        <img :src="`http://127.0.0.1:8000/storage/default/${recipes.difficulty}_star.png`" alt="Difficulty Star"
                             class="w-auto h-7">
                    </div>
                </div>
                <!-- End Avatar -->
            </div>
        </div>

        <div class="absolute bottom-0 inset-x-0 z-10">
            <div class="flex flex-col h-full p-4 sm:p-6">
                <h3 class="text-lg sm:text-3xl font-semibold text-white group-hover:text-white/80 group-focus:text-white/80">
                    {{ recipes.name }}
                </h3>
                <p class="mt-2 text-white/80">
                    {{ recipes.description }}
                </p>
            </div>
        </div>
    </Link>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';
export default {
    name: "RecipeCard",
    props: {
        recipes: {
            type: Object,
            required: true
        }
    },
    components: {
        Link
    }
}
</script>
