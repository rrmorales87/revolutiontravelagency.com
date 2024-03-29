<script setup>
import { wTrans } from 'laravel-vue-i18n';
</script>

<template>
<div class="flex flex-col bg-gray-100 p-40 ">
  <img class="icon-logo" src="/storage/icon/rtravel-Logo.svg" alt="main logo">
  <div class="py-4 build">
    <p>{{wTrans("titlePageBuild").value}}</p>
  </div>
  <div class="w-1/3 build-subtitle">
      <p>
        {{wTrans("subTitlePageBuild").value}}
      </p>
  </div>
</div>
</template>

<style scoped lang="scss">
.build {
  @apply font-Musticapro;
  font-size: 40px;
  font-weight: 600;
  line-height: 55px;
  text-align: left;

}
.build-subtitle {
  @apply font-Lato;
  font-size: 17px;
  font-weight: 400;
  line-height: 25px;
  text-align: left;


}
</style>