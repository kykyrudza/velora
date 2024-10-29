<template>
    <div class="lora mt-16 flex flex-col max-w-md mx-auto p-6 bg-white drop-shadow-xl rounded-lg">
        <h1 class="text-2xl text-center font-bold mb-4">Edit Profile</h1>

        <form @submit.prevent="submit">
            <!-- First Name Field -->
            <div class="mb-4">
                <label class="block text-gray-700">First Name</label>
                <input v-model="firstName" type="text" class="mt-3 duration-300 hover:p-2 focus:p-2 block w-full border-gray-300 rounded-md drop-shadow-xl" />
                <button @click.prevent="updateField('firstName', firstName, '/profile/first-name')" class="mt-3 bg-[#4B2E39] text-white p-1 rounded w-full">Save</button>
                <span v-if="errors.firstName" class="text-red-500 text-sm">{{ errors.firstName }}</span>
                <span v-if="successMessage.firstName" class="text-green-500 text-sm">{{ successMessage.firstName }}</span>
            </div>

            <!-- Last Name Field -->
            <div class="mb-4">
                <label class="block text-gray-700">Last Name</label>
                <input v-model="lastName" type="text" class="mt-3 duration-300 hover:p-2 focus:p-2 block w-full border-gray-300 rounded-md drop-shadow-xl" />
                <button @click.prevent="updateField('lastName', lastName, '/profile/last-name')" class="mt-3 bg-[#4B2E39] text-white p-1 rounded w-full">Save</button>
                <span v-if="errors.lastName" class="text-red-500 text-sm">{{ errors.lastName }}</span>
                <span v-if="successMessage.lastName" class="text-green-500 text-sm">{{ successMessage.lastName }}</span>
            </div>

            <!-- Description Field -->
            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea v-model="description" class="mt-3 block w-full border-gray-300 rounded-md drop-shadow-xl"></textarea>
                <button @click.prevent="updateField('description', description, '/profile/description')" class="mt-3 bg-[#4B2E39] text-white p-1 rounded w-full">Save</button>
                <span v-if="errors.description" class="text-red-500 text-sm">{{ errors.description }}</span>
                <span v-if="successMessage.description" class="text-green-500 text-sm">{{ successMessage.description }}</span>
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input v-model="email" type="email" class="mt-3 duration-300 hover:p-2 focus:p-2 block w-full border-gray-300 rounded-md drop-shadow-xl" />
                <button @click.prevent="updateField('email', email, '/profile/email')" class="mt-3 bg-[#4B2E39] text-white p-1 rounded w-full">Save</button>
                <span v-if="errors.email" class="text-red-500 text-sm">{{ errors.email }}</span>
                <span v-if="successMessage.email" class="text-green-500 text-sm">{{ successMessage.email }}</span>
            </div>

            <!-- Avatar Upload Field -->
            <div class="mb-4">
                <label class="block text-gray-700">Avatar</label>
                <input type="file" @change="handleFileUpload" class="mt-3 block w-full border-gray-300 rounded-md drop-shadow-xl" />
                <button @click.prevent="updateAvatar" class="mt-3 bg-[#4B2E39] text-white p-1 rounded w-full">Save</button>
                <span v-if="errors.avatar" class="text-red-500 text-sm">{{ errors.avatar }}</span>
                <span v-if="successMessage.avatar" class="text-green-500 text-sm">{{ successMessage.avatar }}</span>
            </div>

            <!-- Password Fields -->
            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input v-model="password" type="password" class="mt-3 duration-300 hover:p-2 focus:p-2 block w-full border-gray-300 rounded-md drop-shadow-xl" />

                <span v-if="errors.password" class="text-red-500 text-sm">{{ errors.password }}</span>
                <span v-if="successMessage.password" class="text-green-500 text-sm">{{ successMessage.password }}</span>
                <div class="mb-4">
                    <label class="block text-gray-700">Confirm Password</label>
                    <input v-model="password_confirmation" type="password" class="mt-3 duration-300 hover:p-2 focus:p-2 block w-full border-gray-300 rounded-md drop-shadow-xl" />
                </div>
            </div>
            <button @click.prevent="updatePassword" class="mt-2 bg-[#4B2E39] text-white p-1 rounded w-full">Save</button>


        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    props: {
        user: Object,
    },
    setup(props) {
        const firstName = ref(props.user.first_name || '');
        const lastName = ref(props.user.last_name || '');
        const description = ref(props.user.description || '');
        const email = ref(props.user.email || '');
        const password = ref('');
        const password_confirmation = ref('');
        const avatar = ref(null);

        const errors = ref({});
        const successMessage = ref({});

        const handleFileUpload = (event) => {
            avatar.value = event.target.files[0];
        };

        const updateField = (field, value, route) => {
            Inertia.post(route, { [field]: value }, {
                onSuccess: (page) => {
                    successMessage.value[field] = page.props.flash.success;
                },
                onError: (error) => {
                    errors.value[field] = error[field];
                },
            });
        };

        const updateAvatar = () => {
            const formData = new FormData();
            formData.append('avatar', avatar.value);
            Inertia.post('/profile/avatar', formData, {
                onSuccess: (page) => {
                    successMessage.value.avatar = page.props.flash.success;
                },
                onError: (error) => {
                    errors.value.avatar = error.avatar;
                },
            });
        };

        const updatePassword = () => {
            Inertia.post('/profile/password', {
                password: password.value,
                password_confirmation: password_confirmation.value,
            }, {
                onSuccess: (page) => {
                    successMessage.value.password = page.props.flash.success;
                },
                onError: (error) => {
                    errors.value.password = error.password;
                },
            });
        };

        return {
            firstName,
            lastName,
            description,
            email,
            password,
            password_confirmation,
            updateField,
            updateAvatar,
            updatePassword,
            errors,
            successMessage,
            handleFileUpload,
        };
    },
};
</script>
