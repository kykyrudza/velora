<template>
    <div class="border border-black w-80 h-56 rounded-xl p-5 text-white bg-contain relative"
         :style="{ backgroundImage: `url(${recipes.image})` }">
        <div class="absolute inset-0 bg-black opacity-60 rounded-xl"></div>
        <div class="recipe-card relative z-10">
            <div class="w-full flex justify-between">
                <div class="w-1/2">
                    <ul class="flex gap-2">
                        <li v-for="ingredient in recipes.ingredients" :key="ingredient.id">
                            <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">
                                {{ ingredient.name }}
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="w-1/2 flex justify-end">
                    <img
                        class="w-auto h-7"
                        :src="`storage/default/${recipes.difficulty}_star.png`"
                        alt="Difficulty Star">
                </div>
            </div>
            <div class="w-full lora text-4xl my-4 flex justify-between border-b pb-2">
                <h3>{{ recipes.name }}</h3>
            </div>
            <div class="w-full lora text-md my-4">
                <p>{{ recipes.description }}</p>
            </div>
            <div class="lora w-full">
                <div class="w-full flex justify-between mt-4">
                    <div class="w-1/2">
                        <p>Время: {{ recipes.cooking_time }} мин.</p>
                    </div>
                    <div class="w-1/2 flex justify-end">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "RecipeCard",
    props: {
        recipes: {
            type: Object,
            required: true
        }
    },
}
</script>
