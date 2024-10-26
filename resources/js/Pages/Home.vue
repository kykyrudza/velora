<template>
    <div class="">
            <div>
                <p v-if="auth.user">User: {{ auth.user.name }}</p>
                <pre>{{ auth }}</pre>
                <pre>{{ recipes }}</pre>
                <div>
                    <div class="">

                    </div>
                </div>
                <div>
                    <div>
                        <img src="" alt="">
                    </div>
                    <div>
                        <img src="" alt="">
                    </div>
                </div>

            </div>
        </div>
</template>
<script>
export default {
    props:{
        title: String,
        auth: {
            type: Object,
            default: () => ({ user: null })
        },
        recipes: Object
    },
};
</script>


