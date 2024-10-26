<template>
    <div class="max-w-md mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Edit Profile</h1>

        <form @submit.prevent="submit">
            <div class="mb-4">
                <label class="block text-gray-700">First Name</label>
                <input v-model="firstName" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <button @click.prevent="updateFirstName" class="mt-2 bg-blue-500 text-white p-1 rounded">Save</button>
                <span v-if="errors.firstName" class="text-red-500 text-sm">{{ errors.firstName }}</span>
                <span v-if="successMessage.firstName" class="text-green-500 text-sm">{{ successMessage.firstName }}</span>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Last Name</label>
                <input v-model="lastName" type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <button @click.prevent="updateLastName" class="mt-2 bg-blue-500 text-white p-1 rounded">Save</button>
                <span v-if="errors.lastName" class="text-red-500 text-sm">{{ errors.lastName }}</span>
                <span v-if="successMessage.lastName" class="text-green-500 text-sm">{{ successMessage.lastName }}</span>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Description</label>
                <textarea v-model="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                <button @click.prevent="updateDescription" class="mt-2 bg-blue-500 text-white p-1 rounded">Save</button>
                <span v-if="errors.description" class="text-red-500 text-sm">{{ errors.description }}</span>
                <span v-if="successMessage.description" class="text-green-500 text-sm">{{ successMessage.description }}</span>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input v-model="email" type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <button @click.prevent="updateEmail" class="mt-2 bg-blue-500 text-white p-1 rounded">Save</button>
                <span v-if="errors.email" class="text-red-500 text-sm">{{ errors.email }}</span>
                <span v-if="successMessage.email" class="text-green-500 text-sm">{{ successMessage.email }}</span>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Avatar</label>
                <input type="file" @change="handleFileUpload" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <button @click.prevent="updateAvatar" class="mt-2 bg-blue-500 text-white p-1 rounded">Save</button>
                <span v-if="errors.avatar" class="text-red-500 text-sm">{{ errors.avatar }}</span>
                <span v-if="successMessage.avatar" class="text-green-500 text-sm">{{ successMessage.avatar }}</span>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Password</label>
                <input v-model="password" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                <button @click.prevent="updatePassword" class="mt-2 bg-blue-500 text-white p-1 rounded">Save</button>
                <span v-if="errors.password" class="text-red-500 text-sm">{{ errors.password }}</span>
                <span v-if="successMessage.password" class="text-green-500 text-sm">{{ successMessage.password }}</span>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Confirm Password</label>
                <input v-model="password_confirmation" type="password" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
            </div>
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

        const updateFirstName = () => {
            Inertia.post('/profile/first-name', { firstName: firstName.value }, {
                onSuccess: (page) => {
                    successMessage.value.firstName = page.props.flash.success;
                },
                onError: (error) => {
                    errors.value.firstName = error.firstName;
                },
            });
        };

        const updateLastName = () => {
            Inertia.post('/profile/last-name', { lastName: lastName.value }, {
                onSuccess: (page) => {
                    successMessage.value.lastName = page.props.flash.success;
                },
                onError: (error) => {
                    errors.value.lastName = error.lastName;
                },
            });
        };

        const updateDescription = () => {
            Inertia.post('/profile/description', { description: description.value }, {
                onSuccess: (page) => {
                    successMessage.value.description = page.props.flash.success;
                },
                onError: (error) => {
                    errors.value.description = error.description;
                },
            });
        };

        const updateEmail = () => {
            Inertia.post('/profile/email', { email: email.value }, {
                onSuccess: (page) => {
                    successMessage.value.email = page.props.flash.success;
                },
                onError: (error) => {
                    errors.value.email = error.email;
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
            updateFirstName,
            updateLastName,
            updateDescription,
            updateEmail,
            updateAvatar,
            updatePassword,
            errors,
            successMessage,
            handleFileUpload,
        };
    },
};
</script>
