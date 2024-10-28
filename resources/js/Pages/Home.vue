<template>
    <div class="flex w-full">
        <div class="w-full mx-10 my-5">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <RecipeCard
                    v-for="recipe in recipes"
                    :key="recipe.id"
                    :recipes="recipe"
                />
            </div>
        </div>
    </div>
</template>
<script>
import RecipeCard from "./Components/RecipeCard.vue";
export default {
    props:{
        title: String,
        auth: {
            type: Object,
            default: () => ({ user: null })
        },
        recipes: {
            type: Object,
            required: true
        }
    },
    components: {
        RecipeCard,
    },
};
</script>


