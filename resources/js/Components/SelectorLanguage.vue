<script setup>
import {getActiveLanguage, loadLanguageAsync, trans} from "laravel-vue-i18n";
import {ref} from "vue";
const showLocale = ref(getActiveLanguage());
const setLocale = async (locale)  =>  {
  await loadLanguageAsync(locale);
  showLocale.value = locale;
}

</script>

<template>


  <el-dropdown >
    <div class="flex flex-nowrap justify-center justify-items-center outline-transparent">
      <img class="w-6" src="/storage/icon/lang.svg" alt="language" >
      <div class="self-center ml-1 font-bold text-2xl uppercase">{{showLocale}}</div>
    </div>

    <template #dropdown>
      <el-dropdown-menu class="my-2 ">
        <el-dropdown-item @click="setLocale('en')">
                <span class="float-left mr-4">
                  <img src="/storage/icon/us.webp" alt="us">
                </span>
          <span class="float-right">{{ $t("english") }}</span>
        </el-dropdown-item>
        <el-dropdown-item @click="setLocale('es')">
                <span class="float-left mr-4">
                  <img src="/storage/icon/es.webp" alt="es">
                </span>
          <span class="float-right">{{ $t("spanish") }}</span>
        </el-dropdown-item>

      </el-dropdown-menu>
    </template>
  </el-dropdown>

</template>

<style scoped lang="scss">

</style>