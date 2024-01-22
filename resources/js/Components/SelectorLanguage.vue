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
      <img class="icon-view" src="/storage/icon/language-icon.svg" alt="language" >
      <div class="uppercase underline underline-offset-1 menu-text">{{showLocale}}</div>
    </div>

    <template #dropdown>
      <el-dropdown-menu class="my-2 ">
        <el-dropdown-item @click="setLocale('en')" v-if="showLocale!=='en'">
                <span class="float-left mr-4">
                  <img src="/storage/icon/us.webp" alt="us">
                </span>
          <span class="float-right">{{ $t("english") }}</span>
        </el-dropdown-item>
        <el-dropdown-item @click="setLocale('es') " v-if="showLocale!=='es'">
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
.icon-view {
  width: 27px;
  height: 18.81px;
}
.menu-text {
  font-family: Mustica Pro;
  font-size: 16px;
  font-weight: 600;
  line-height: 22px;
  letter-spacing: 0;
  text-align: left;
  color: #0F3B53;



}
</style>