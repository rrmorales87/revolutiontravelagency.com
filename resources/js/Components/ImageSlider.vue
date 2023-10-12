<script setup>

import ItemBanner from "./ItemBanner.vue";
import ItemSubscriptionBanner from "./ItemSubscriptionBanner.vue";
</script>

<template>

        <el-carousel height="650px"  :interval="5000" >
            <el-carousel-item >
               <ItemBanner></ItemBanner>
            </el-carousel-item>
          <el-carousel-item >
            <ItemSubscriptionBanner></ItemSubscriptionBanner>
            </el-carousel-item>

        </el-carousel>

</template>

<style scoped>
@media screen and (max-width: 1024px) {

  height: 1300px;

}
</style>
