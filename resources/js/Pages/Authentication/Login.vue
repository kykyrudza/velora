<template>
    <div class="bg-neutral-200 shadow-2xl w-96 h-auto p-6 rounded-md">
        <form @submit.prevent="submitForm" class="flex flex-col gap-4">
            <h2 class="text-2xl font-bold text-center">Login</h2>

            <div>
                <label for="email" class="block mb-2">Email</label>
                <input
                    v-model="form.email"
                    id="email"
                    name="email"
                    class="outline-none w-full p-2 border-2 rounded-md"
                    type="email"
                    placeholder="Введите ваш Email"
                    required
                />
                <div v-if="errors.email" class="text-red-500 text-sm">{{ errors.email }}</div>
            </div>

            <div>
                <label for="password" class="block mb-2">Password</label>
                <input
                    v-model="form.password"
                    id="password"
                    name="password"
                    class="outline-none w-full p-2 border-2 rounded-md"
                    type="password"
                    placeholder="Введите ваш пароль"
                    required
                />
                <div v-if="errors.password" class="text-red-500 text-sm">{{ errors.password }}</div>
            </div>
            <div>
                <Link :href="route('register.index')" class="rounded-md bg-[#8B1E3F] py-2 px-7">
                    У вас еще нету аккаунта?
                </Link>
            </div>
            <div>
                <button type="submit" class="py-2 px-4 w-full rounded-md bg-[#4B2E39] text-white font-semibold">Войти</button>
            </div>
        </form>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import BlankLayout from "../../Layouts/BlankLayout.vue";
import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "Login",
    components: {Link},
    layout: BlankLayout,
    props: {
        errors: {
            type: Object,
            default: () => ({})
        },
        form: {
            type: Object,
            default: () => ({ email: '', password: '' })
        },
    },
    methods: {
        submitForm() {
            Inertia.post(route('login.store'), this.form);
        }
    }
}
</script>
