<template>
    <div class="bg-neutral-200 shadow-2xl w-96 h-auto p-6 rounded-md">
        <form @submit.prevent="submitForm" class="flex flex-col gap-4">
            <h2 class="text-2xl font-bold text-center">Регистрация</h2>

            <div>
                <label for="firstName" class="block mb-2">Имя</label>
                <input
                    v-model="form.firstName"
                    id="firstName"
                    name="firstName"
                    class="outline-none w-full p-2 border-2 rounded-md"
                    type="text"
                    placeholder="Введите ваше имя"
                    required
                />
                <div v-if="errors.firstName" class="text-red-500 text-sm">{{ errors.firstName }}</div>
            </div>

            <div>
                <label for="lastName" class="block mb-2">Фамилия</label>
                <input
                    v-model="form.lastName"
                    id="lastName"
                    name="lastName"
                    class="outline-none w-full p-2 border-2 rounded-md"
                    type="text"
                    placeholder="Введите вашу фамилию"
                    required
                />
                <div v-if="errors.lastName" class="text-red-500 text-sm">{{ errors.lastName }}</div>
            </div>

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
                <label for="password" class="block mb-2">Пароль</label>
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
                <label for="password_confirmation" class="block mb-2">Подтверждение пароля</label>
                <input
                    v-model="form.password_confirmation"
                    id="password_confirmation"
                    name="password_confirmation"
                    class="outline-none w-full p-2 border-2 rounded-md"
                    type="password"
                    placeholder="Подтвердите ваш пароль"
                    required
                />
                <div v-if="errors.password_confirmation" class="text-red-500 text-sm">{{ errors.password_confirmation }}</div>
            </div>

            <div>
                <Link :href="route('login.index')" class="rounded-md bg-[#8B1E3F] py-2 px-7">
                    У вас уже есть аккаунт?
                </Link>
            </div>

            <div>
                <button type="submit" class="py-2 px-4 w-full rounded-md bg-[#4B2E39] text-white font-semibold">Зарегистрироваться!</button>
            </div>
        </form>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import BlankLayout from "../../Layouts/BlankLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    name: "Register",
    components: {Link},
    layout: BlankLayout,
    props: {
        errors: {
            type: Object,
            default: () => ({})
        },
        form: {
            type: Object,
            default: () => ({firstName: '', lastName: '', email: '', password: '', password_confirmation: ''})
        },
    },
    methods: {
        submitForm() {
            Inertia.post(route('register.store'), this.form);
        }
    }
}
</script>
