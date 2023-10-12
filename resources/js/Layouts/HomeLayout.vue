<script setup>

import {Head} from "@inertiajs/vue3";
//import { PhoneIcon } from '@heroicons/vue/24/solid'
import NavLink from "../Components/NavLink.vue";
import {computed} from "vue";
import RegisterButton from "../Components/RegisterButton.vue";
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
    <div class="flex-col max-w-screen lg:px-16  md:px-4 sm:px-2.5 ">
        <Head title="Revolution Travel" />

        <div class="header">

            <img class="logo w-5/12 pl-3" src="/icons/logo.png" alt="logo">

            <div class="menu">


                  <nav-link >
                    Subscription
                  </nav-link>

                  <nav-link>
                    Login
                  </nav-link>


            </div>
            <RegisterButton type="String">
              Registers
            </RegisterButton>
            <div>
              <img src="/storage/icon/Leng.png" alt="lang">
            </div>
<!--            <div class="flex text-xl mr-4">
                <nav-link>Login</nav-link>
                <p class="self-center">|</p>
                <nav-link>Register</nav-link>
            </div>-->
        </div>

        <slot/>
    </div>
</template>

<style  scoped>
.header{
  display: flex;
  height: 85px;
}

.header{
  display: flex;
  justify-content:flex-end;
  align-items: center;
  width: 100%;
  padding-right:10rem;
  gap: 5rem;

  @media screen and (max-width: 1440px) {
    padding-right:2rem;
    gap:2rem
  }

  @media screen and (max-width: 425px) {
    gap:0.5rem;
    padding-right:0.2rem;
  }
  @media screen and (max-width: 375px) {
    padding-right:0.5rem;
    .btn-format{
      display: none;
    }
  }
  .logo{
    position: absolute;
    width: 200px;
    height: 40px;
    top: 22px;
    left: 180px;
    @media screen and (max-width: 1440px) {
      left:30px ;
    }

    @media screen and (max-width: 425px) {
      left:2px ;
    }
  }
  .menu{
    display: flex;
    justify-content:flex-end;
    align-items: center;

    gap:2rem;
    @media screen and (max-width: 425px) {
      display: none;
    }




  }
}



</style>
