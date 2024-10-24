<template>
    <header>
        <nav class="mx-auto flex items-center justify-center p-6 lg:px-8" aria-label="Global">
            <div class="hidden lg:flex lg:gap-x-12">
                <Link
                    :href="route('home')"
                    class="text-sm font-semibold leading-6 text-gray-900 px-5 py-2"
                >
                    Home
                </Link>
                <Link
                    :href="route('about')"
                    class="text-sm font-semibold leading-6 text-gray-900 px-5 py-2"
                >
                    About
                </Link>
                <Link
                    :href="route('contacts')"
                    class="text-sm font-semibold leading-6 text-gray-900 px-5 py-2"
                >
                    Contacts
                </Link>
            </div>
        </nav>
    </header>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
    components: { Link },
};
</script>
