<script setup>
import {Head} from "@inertiajs/vue3";
import {computed} from "vue";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";


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
    <Footer/>
  </div>
</template>

<style lang="scss" scoped>
</style>
