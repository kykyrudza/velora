<template>
    <Link
        class="group relative block rounded-xl focus:outline-none duration-300 hover:scale-105 active:scale-95 "
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
                                :class="['inline-flex items-center rounded-md px-2 py-1 text-xs sm:text-sm font-medium ring-1 ring-gray-500/10', getIngredientColor(ingredient.name)]">
                                {{ ingredient.name }}
                            </li>
                        </ul>
                    </div>
                    <div class="flex items-center space-x-1">
                        <i v-for="i in getDifficultyLevel(recipes.difficulty)"
                           :key="i"
                           class="ri-star-fill text-2xl"
                           :class="{
                                'text-green-500': recipes.difficulty === 'easy',
                                'text-yellow-500': recipes.difficulty === 'medium',
                                'text-red-500': recipes.difficulty === 'hard'
       }">
                        </i>
                    </div>


                </div>
                <!-- End Avatar -->
            </div>
        </div>

        <div class="absolute bottom-0 inset-x-0 z-10">
            <div class="flex flex-col h-full p-4 sm:p-6">
                <h3 class="text-lg sm:text-3xl font-semibold text-white">
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
    },
    methods: {
        getDifficultyLevel(difficulty) {
            if (difficulty === 'easy') return 1;
            if (difficulty === 'medium') return 2;
            if (difficulty === 'hard') return 3;
            return 0;
        },
        getIngredientColor(ingredient) {
            const colors = {
                "Морковь": "bg-orange-100 text-orange-500 border-2 border-orange-500",
                "Соль": "bg-gray-200 text-gray-500 border-2 border-gray-500",
                "Перец": "bg-red-100 text-red-500 border-2 border-red-500",
                "Томаты": "bg-rose-100 text-rose-500 border-2 border-rose-500",
                "Лук": "bg-fuchsia-100 text-fuchsia-700 border-2 border-fuchsia-700",
                "Чеснок": "bg-white text-gray-400 border-2 border-gray-400",
                "Курица": "bg-yellow-100 text-yellow-500 border-2 border-yellow-500",

            };
            return colors[ingredient] || "bg-gray-50 text-gray-700"; // цвет по кд
        }
    }
}
</script>


