<script setup>
import {Head} from "@inertiajs/vue3";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";
import { useTawkto } from "../module/useTawkto";
const  { mounted } = useTawkto();
import { onMounted} from "vue";
onMounted(()=>mounted())
</script>

<template>
  <div class="flex-col ">
    <Head title="Travel with"/>
    <Header/>
    <div class="mt-32">
      <slot/>
    </div>

    <Footer/>

  </div>
</template>

<style lang="scss" scoped>
</style>
