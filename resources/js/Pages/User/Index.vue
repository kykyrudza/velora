<template>
    <section class="mt-5">
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
        <div class="w-full">
            <div class="py-10 lg:py-14 mx-auto">
                <div class="grid lg:grid-cols-3 gap-4">
                    <RecipeCard
                        v-for="recipe in recipes"
                        :key="recipe.id"
                        :recipes="recipe"
                    />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import RecipeCard from "../Components/RecipeCard.vue";

export default {
    name: "Index",
    props: {
        user: Object,
        recipes: Array,
    },
    components: {
        RecipeCard,
        Link
    },
}
</script>
