<template>
    <section class="mx-12 mt-24">
        <!-- Профиль пользователя -->
        <div>
            <div class="flex items-center justify-between">
                <!-- Аватар -->
                <div>
                    <img class="w-32 h-32 rounded-full object-cover" :src="`http://127.0.0.1:8000/${user.avatar}`" alt="User Avatar">
                </div>
                <!-- Имя пользователя -->
                <div class="lora font-bold text-2xl text-end">
                    <p>{{ user.firstName }}</p>
                    <p>{{ user.lastName }}</p>
                </div>
            </div>
            <!-- Описание пользователя -->
            <div class="lora my-4">
                <p>{{ user.description }}</p>
            </div>
            <!-- Кнопки выхода и редактирования профиля -->
            <div class="flex text-white rounded-lg items-center justify-center md:mx-12 lg:mx-24 xl:mx-48">
                <Link class="bg-[#4B2E39] py-2 w-1/2 text-center border-r-2 rounded-l-lg duration-300 active:bg-opacity-75" :href="route('logout')">
                    <i class="ri-logout-box-line text-2xl"></i>
                </Link>
                <Link class="bg-[#4B2E39] py-2 w-1/2 text-center rounded-r-lg duration-300 active:bg-opacity-75" :href="route('profile.edit', user.id)">
                    <i class="ri-edit-line text-2xl"></i>
                </Link>
            </div>
        </div>

        <!-- Список рецептов -->
        <div class="my-8">
            <h2 class="text-3xl font-semibold lora mb-4">Recipes:</h2>
            <div v-for="recipe in recipes" :key="recipe.id" class="bg-white drop-shadow-xl rounded-lg p-5 mb-6">
                <div class="flex items-center space-x-4">
                    <div v-if="recipe.image">
                        <img :src="`http://127.0.0.1:8000/${recipe.image}`" alt="Recipe Image" class="w-24 h-24 object-cover rounded-md">
                    </div>
                    <div v-else>
                        <div class="w-24 h-24 bg-gray-300 flex items-center justify-center rounded-md">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold">{{ recipe.name }}</h3>
                </div>

                <!-- Описание рецепта -->
                <p class="text-gray-600 mt-3">{{ recipe.description }}</p>

                <!-- Время приготовления и сложность -->
                <div class="flex justify-between mt-4">
                    <div class="text-gray-700">
                        <strong>Cooking Time:</strong> {{ recipe.cooking_time }} mins
                    </div>
                    <div class="text-gray-700 flex items-center">
                        <strong class="mr-2">Difficulty:</strong>
                        <template v-if="recipe.difficulty === 'easy'">
                            <i class="ri-star-fill text-green-500"></i>
                        </template>
                        <template v-else-if="recipe.difficulty === 'medium'">
                            <i class="ri-star-fill text-yellow-500"></i>
                            <i class="ri-star-fill text-yellow-500"></i>
                        </template>
                        <template v-else-if="recipe.difficulty === 'hard'">
                            <i class="ri-star-fill text-red-500"></i>
                            <i class="ri-star-fill text-red-500"></i>
                            <i class="ri-star-fill text-red-500"></i>
                        </template>
                    </div>
                </div>

                <!-- Ингредиенты -->
                <div class="mt-4">
                    <h4 class="font-medium text-gray-800">Ingredients:</h4>
                    <ul class="list-disc list-inside ml-4">
                        <li v-for="ingredient in recipe.ingredients" :key="ingredient.id" class="text-gray-700">
                            {{ ingredient.name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
    name: "Index",
    props: {
        user: Object,
        recipes: Array,
    },
    components: {
        Link
    },
}
</script>
