<script setup>

import ItemBanner from "./ItemBanner.vue";
</script>

<template>
    <div class="m-4">
        <el-carousel height="55rem" :interval="5000" arrow="always">
            <el-carousel-item >
               <ItemBanner></ItemBanner>
            </el-carousel-item>

        </el-carousel>
    </div>
</template>

<style scoped>

</style>
