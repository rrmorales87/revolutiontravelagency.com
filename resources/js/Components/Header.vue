<script setup>
import { Search } from '@element-plus/icons-vue';
import {ref} from "vue";
import SelectorLanguage from "./SelectorLanguage.vue";
import NavLink from "./NavLink.vue";
const search = ref();
</script>

<template>
<div class="w-full h-20 flex flex-row gap-4 py-4">
  <div class="w-full">
    <img class="w-32" src="/storage/icon/logo.svg" alt="logo" >
  </div>
  <div class="w-full lg:flex md:flex flex-row justify-items-center justify-center sm:hidden ">
    <el-input
        v-model="search"
        class="w-100 m-2 rounded-full outline-transparent"
        size="large"
        :placeholder="$t('searchInput')"
        :prefix-icon="Search"
    />
  </div>
  <div class="w-full flex flex-row px-5 justify-items-center justify-end gap-4 h-full">
    <SelectorLanguage/>
    <nav class="mx-5 flex justify-items-end h-full gap-2">
      <nav-link href="/">{{$t('community')}}</nav-link>
      <nav-link href="/">{{$t('support')}}</nav-link>
    </nav>
    <div class="flex flex-row px-5 justify-items-center justify-end h-full">
      <el-button class="self-center" :round="true" :size="'large'">{{$t('Sign in')}}</el-button>
    </div>

  </div>
</div>
</template>

<style  lang="scss">
.el-input__wrapper {
  border-radius: 20px;
}
</style>