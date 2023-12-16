<script setup>

import ItemBanner from "./ItemBanner.vue";
import ItemSubscriptionBanner from "./ItemSubscriptionBanner.vue";
import {computed} from "vue";

const widthScreen = computed(() => {
  const screen = window.screen.width;
  console.log(screen);
  if(screen<=425)return 'height:1300px';
  return 'height:800px';
})
</script>

<template>

  <el-carousel height="550px" autoplay :interval="5000">
    <el-carousel-item >
      <ItemBanner></ItemBanner>
    </el-carousel-item>
    <el-carousel-item>
      <ItemSubscriptionBanner></ItemSubscriptionBanner>
    </el-carousel-item>

  </el-carousel>


</template>

<style lang="scss" scoped>
.carrousel {
  height: 650px;
  @media screen and (min-width: 1024px) {
    height: 1300px;
  }

}


</style>
