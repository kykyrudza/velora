<template>
    <div class="flex w-full max-w-screen-xl pt-10">
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


