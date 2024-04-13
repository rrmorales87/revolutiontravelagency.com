<script setup>

import HomeLayout from "../../Layouts/HomeLayout.vue";
</script>

<template>
<home-layout>
  <div class="contact rounded-2xl m-10 lg:p-8 md:p-8 sm:p-2 flex flex-col @apply font-Musticapro bg-gray-100">
    <div class="lg:ml-44 md:mr-28 sm:-mr-2">
      <h1 class=" text-2xl my-6">{{ $t('contactUS') }}</h1>
      <div class="max-w-screen-sm">
        <label for="name" class="font-bold">{{$t("Name")}}</label>
        <el-input name="name" class="my-2"/>

      </div>
      <div class="max-w-xs">
        <label for="email">{{$t("emailNumber")}}</label>
        <el-input name="email" class="my-2"/>

      </div>
      <div class="max-w-screen-sm">
        <label for="message">{{$t("message")}}</label>
        <el-input name="message" class="my-2" :rows="4"    type="textarea"/>

      </div>
      <div class="max-w-screen-sm my-6">
        <el-button class="bg-cyan-950" >{{$t("send")}}</el-button>
      </div>

    </div>

  </div>
</home-layout>

</template>

<style scoped lang="scss">
@import "../../../css/mixin";
.contact {
  @include media(sm){
    padding: 14px 14px 14px 14px;
  }
}
</style>