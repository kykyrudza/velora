<template>
    <Head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" integrity="sha512-MqL4+Io386IOPMKKyplKII0pVW5e+kb+PI/I3N87G3fHIfrgNNsRpzIXEi+0MQC0sR9xZNqZqCYVcC61fL5+Vg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </Head>
    <header class="bg-[#4B2E39] px-12 py-2 text-white">
        <!--    Menu-Tab-->
        <div :class="[MenuBar, 'md:hidden duration-300 absolute top-12 h-screen w-1/2 bg-[#8B1E3F] p-12']">

            <div class=" active:scale-110 duration-300 absolute bottom-12 -left-24 size-72">
                <img class="drop-shadow-xl" :src="menuImage" alt="menu-image-1">
            </div>
            <div class="">
                <div class="flex flex-col dancing text-xl gap-8">
                    <button class="menu-buttons" >Home</button>
                    <button class="menu-buttons" >About</button>
                    <button class="menu-buttons" >Price</button>
                    <button class="menu-buttons" >Gutter</button>
                </div>

            </div>
        </div>

        <div class="flex items-center justify-between">
            <!--      Logo-->
            <div>
                <Link class="text-2xl dancing font-bold " :href="home">Velora</Link>
            </div>
            <!--      Pages-->
            <div class="hidden md:block">
                <ul class="flex space-x-7 lora">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Price</a></li>
                    <li><a href="#">Gutter</a></li>
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
import { Link } from "@inertiajs/inertia-vue3";
export default {
    data(){
      return {
          MenuBar: '-right-full',
          BurgerSwap: 'ri-menu-line',
          menuImage:'/img/menu-image-1.png',
      }
    },
    methods:{
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
