<template>
    <header class="bg-[#4B2E39] px-5 py-2  top-0 w-full  z-50 text-white">
        <div
            @click="BlackHide"
            :class="[MenuBlack, 'fixed md:hidden transition-opacity duration-300 z-40 w-screen h-screen bg-black opacity-50']">
        </div>
        <div :class="[MenuBar, 'md:hidden duration-300 fixed z-50  h-[680px] w-2/3 bg-[#8B1E3F]']">
            <div class=" active:scale-110 duration-300 absolute -bottom-12 -left-24 size-72">
                <img class="drop-shadow-xl duration-300 active:drop-shadow-2xl" :src="menuImage" alt="menu-image-1">
            </div>
            <div class="">
                <div class=" flex flex-col lora text-lg gap-8">
                    <Link v-if="auth.user" :href="route('profile.show', auth.user.id)">
                        <button class="">
                            <img class="size-32 rounded-xl" :src="`http://127.0.0.1:8000/${auth.user.avatar}`" alt="">
                        </button>
                    </Link>
                    <button v-else class="menu-login">
                        <Link :href="route('login.index')">
                            Login
                        </Link>
                    </button>

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
                    <button>
                        <img class="size-10 rounded-md" :src="`http://127.0.0.1:8000/${auth.user.avatar}`" alt="">
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
            MenuBlack: 'hidden' ,
            MenuBar: '-right-full',
            BurgerSwap: 'ri-menu-line',
            menuImage:'/img/menu-image-1.png',
        }
    },
    methods: {
        route,
        HideButton() {
            this.MenuBar = this.MenuBar === '-right-full' ? 'right-0' : '-right-full';
            this.BurgerSwap = this.BurgerSwap === 'ri-menu-line' ? 'ri-close-large-line' : 'ri-menu-line';
            this.MenuBlack = this.MenuBar === 'right-0' ? 'block' : 'hidden';
        },
        BlackHide() {
            this.MenuBlack = 'hidden';
            this.MenuBar = '-right-full';
            this.BurgerSwap = 'ri-menu-line';
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
.menu-login{
    @apply p-4 bg-[#4B2E39] bg-opacity-20 duration-300 active:bg-opacity-40 active:drop-shadow-xl active:scale-110 text-left  rounded-md;
}
</style>
