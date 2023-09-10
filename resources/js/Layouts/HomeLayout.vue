<script setup>

import {Head} from "@inertiajs/vue3";
import { PhoneIcon } from '@heroicons/vue/24/solid'
import NavLink from "../Components/NavLink.vue";
import {computed} from "vue";
const setDeviceType = computed(() => {
  const platform = navigator.platform.toLowerCase();
  if (/(android|webos|iphone|ipad|ipod|blackberry|windows phone)/.test(platform)) {
    return  'mobile';
  } else if (/mac|win|linux/i.test(platform)) {
    return  'desktop';
  } else if (/tablet|ipad/i.test(platform)) {
     return  'tablet';
  } else {
    return  'unknown';
  }
});
</script>

<template>
    <div class="flex-col max-w-screen font-Musticapro">
        <Head title="Revolution Travel" />
        <div class="flex justify-between bg-blue-950  border-cyan-50 px-28 py-2">
            <div class="flex  gap-4">
                <img class="w-7 cursor-pointer" src="/icons/facebook-white.png" alt="facebook">
                <img class="w-7 cursor-pointer" src="/icons/twitter-white.png" alt="twitter">
                <img v-if="setDeviceType==='mobile' || setDeviceType==='tablet'" class="w-7 cursor-pointer" src="/icons/whatsapp-white.png" alt="whatsapp">
            </div>
            <div class="flex justify-center justify-items-center p-1">
               <div class="flex gap-2 cursor-pointer ">

                   <p class="text-white">Contactus</p>
                   <PhoneIcon class="w-6 text-white" />

               </div>
            </div>


        </div>
        <nav class="flex m-2 justify-items-center">
            <div class="self-start">
                <img class="w-5/12 pl-3" src="/icons/logo.png" alt="logo">
            </div>
            <div class=" flex text-xl gap-4 mr-auto">
                <nav-link>
                    Home
                </nav-link>
                <nav-link>
                    About
                </nav-link>
            </div>
            <div class="flex text-xl mr-4">
                <nav-link>Login</nav-link>
                <p class="self-center">|</p>
                <nav-link>Register</nav-link>
            </div>
        </nav>

        <slot/>
    </div>
</template>

<style scoped>

</style>
