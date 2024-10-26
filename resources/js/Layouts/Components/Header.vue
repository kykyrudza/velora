<template>
    <header class="bg-[#4B2E39] px-12 py-2 text-white">
        <div :class="[MenuBar, 'md:hidden duration-300 absolute top-12 h-[680px] w-1/2 bg-[#8B1E3F] p-12']">

            <div class=" active:scale-110 duration-300 absolute bottom-2 -left-24 size-72">
                <img class="drop-shadow-xl duration-300 active:drop-shadow-2xl" :src="menuImage" alt="menu-image-1">
            </div>
            <div class="">
                <div class="flex flex-col dancing text-xl gap-8">
                    <button class="menu-buttons" >
                        <Link :href="route('home')">
                            Home
                        </Link>
                    </button>
                    <button class="menu-buttons" >
                        <Link :href="route('about')">
                            About
                        </Link>
                    </button>
                    <button class="menu-buttons" >
                        <Link :href="route('contacts')">
                            Contacts
                        </Link>
                    </button>
                    <button class="menu-buttons" >Gutter</button>
                </div>

            </div>
        </div>

        <div class="flex items-center justify-between">
            <div>
                <Link class="text-2xl dancing font-bold " :href="route('home')">Velora</Link>
            </div>
            <div class="hidden md:block">
                <ul class="flex space-x-7 lora">
                    <li><Link :href="route('home')">Home</Link></li>
                    <li><Link :href="route('about')">About</Link></li>
                    <li><Link :href="route('home')">Price</Link></li>
                    <li><Link :href="route('contacts')">Contacts</Link></li>
                </ul>
            </div>
            <div class="hidden md:block lora">
                <Link v-if="auth.user" :href="route('profile.show', auth.user.id)">
                    <button class="py-2 px-7">
                        {{ auth.user.firstName }} {{ auth.user.lastName }}
                    </button>
                </Link>
                <Link v-else :href="route('login.index')" class="rounded-md bg-[#8B1E3F] py-2 px-7">
                        Login
                </Link>
            </div>
            <div class=" md:hidden duration-300 active:scale-75">
                <i @click="HideButton" :class="[BurgerSwap, 'ri-menu-line  cursor-pointer text-xl']"></i>
            </div>
        </div>
    </header>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import {route} from "ziggy-js";

export default {
    props: {
        auth: {
            type: Object,
            default: () => ({ user: null })
        }
    },
    data(){
        return {
            MenuBar: '-right-full',
            BurgerSwap: 'ri-menu-line',
            menuImage:'/img/menu-image-1.png',
        }
    },
    methods:{
        route,
        HideButton(){
            this.MenuBar = this.MenuBar === '-right-full' ? 'right-0' : '-right-full';
            this.BurgerSwap = this.BurgerSwap === 'ri-menu-line' ? 'ri-close-large-line' : 'ri-menu-line';
        }
    },
    components: { Link },
};
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap');
.dancing{
    font-family: 'Dancing Script', cursive;
}
@import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap');
.lora{
    font-family: 'Lora', serif;
}
.menu-buttons{
    @apply p-4 bg-[#4B2E39] bg-opacity-20 duration-300 active:bg-opacity-40 active:drop-shadow-xl active:scale-110 text-left  rounded-md;
}
</style>
