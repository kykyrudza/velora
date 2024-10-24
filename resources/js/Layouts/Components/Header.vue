<template>
    <header class="bg-[#4B2E39] px-12 py-2 text-white">
        <!--Login-Form-->
        <div class="bg-green-500 absolute w-96 h-auto top-80 left-60 p-6 rounded-md shadow-lg">
            <form class="flex flex-col gap-4">
                <!-- Заголовок формы -->
                <h2 class="text-2xl text-white font-bold">Login</h2>

                <!-- Поле для ввода Email -->
                <div>
                    <label for="email" class="block text-white mb-2">Email</label>
                    <input id="email" name="email" class="outline-none w-full p-2 bg-[#4B2E39] text-white rounded-md" type="email" placeholder="Введите ваш Email" required />
                </div>

                <!-- Поле для ввода Пароля -->
                <div>
                    <label for="password" class="block text-white mb-2">Password</label>
                    <input id="password" name="password" class="outline-none w-full p-2 bg-[#4B2E39] text-white rounded-md" type="password" placeholder="Введите ваш пароль" required />
                </div>

                <!-- Кнопка отправки формы -->
                <div>
                    <button type="submit" class="py-2 px-4 w-full rounded-md bg-[#4B2E39] text-white font-semibold">Войти</button>
                </div>
            </form>
        </div>

        <!--Menu-Tab-->
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
            <!--      Logo-->
            <div>
                <Link class="text-2xl dancing font-bold " :href="route('home')">Velora</Link>
            </div>
            <!--      Pages-->
            <div class="hidden md:block">
                <ul class="flex space-x-7 lora">
                    <li><Link :href="route('home')">Home</Link></li>
                    <li><Link :href="route('about')">About</Link></li>
                    <li><Link :href="route('home')">Price</Link></li>
                    <li><Link :href="route('contacts')">Contacts</Link></li>
                </ul>
            </div>
            <!--      Button-Login-->
            <div class="hidden md:block rounded-md  bg-[#8B1E3F] lora">
                <button class="py-2 px-7 ">Login</button>
            </div>
            <!--      Burger-Menu-->
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
