<script setup>
import {Head} from "@inertiajs/vue3";
import {computed} from "vue";
import Header from "../Components/Header.vue";


const setDeviceType = computed(() => {
  const platform = navigator.platform.toLowerCase();
  if (/(android|webos|iphone|ipad|ipod|blackberry|windows phone)/.test(platform)) {
    return 'mobile';
  } else if (/mac|win|linux/i.test(platform)) {
    return 'desktop';
  } else if (/tablet|ipad/i.test(platform)) {
    return 'tablet';
  } else {
    return 'unknown';
  }
});


</script>

<template>
  <div class="flex-col ">
    <Head title="Travel with"/>
    <Header/>
     <slot/>
  </div>
</template>

<style lang="scss" scoped>


.header {
  display: flex;
  height: 85px;
  justify-content: flex-end;
  align-items: center;
  width: 100%;
  padding-right: 10rem;
  gap: 5rem;

  .register-btn {
    @media screen and (max-width: 375px) {
      display: none;
    }
  }

  @media screen and (max-width: 1440px) {
    padding-right: 2rem;
    gap: 2rem
  }

  @media screen and (max-width: 425px) {
    gap: 0.5rem;
    padding-right: 0.2rem;
  }
  @media screen and (max-width: 375px) {
    padding-right: 0.5rem;

  }

  .logo {
    position: absolute;
    width: 200px;
    height: 40px;
    top: 22px;
    left: 180px;
    @media screen and (max-width: 1440px) {
      left: 30px;
    }

    @media screen and (max-width: 425px) {
      left: 2px;
    }
  }

  .menu {
    display: flex;
    justify-content: flex-end;
    align-items: center;

    gap: 2rem;
    @media screen and (max-width: 425px) {
      display: none;
    }


  }
}


</style>
