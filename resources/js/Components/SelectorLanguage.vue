<script setup>
import {getActiveLanguage, loadLanguageAsync} from "laravel-vue-i18n";
import {onMounted, ref} from "vue";
import {useStore} from "vuex";
import { useTawkto } from "../module/useTawkto";
const  { changeWidgetByLocale } = useTawkto();
import {SET_LOCALE} from "../store/mutations/type";
import {router} from "@inertiajs/vue3";
const showLocale = ref(getActiveLanguage());
const store = useStore();
onMounted(()=>store.commit(SET_LOCALE,showLocale.value))

const setLocale = async (locale)  =>  {
  await loadLanguageAsync(locale);
  showLocale.value = locale;
  store.commit(SET_LOCALE,locale);
  router.get("/change-locale",{locale});
  changeWidgetByLocale(locale);
}



</script>

<template>


  <el-dropdown >
    <div class="flex flex-nowrap justify-center justify-items-center outline-transparent">
      <img class="icon-view" src="/storage/icon/language-icon.svg" alt="language" >
      <div class="uppercase underline underline-offset-1 menu-text">{{showLocale}}</div>
    </div>

    <template #dropdown>
      <el-dropdown-menu class="@apply font-Musticapro">
        <el-dropdown-item @click="setLocale('en')" v-if="showLocale!=='en'">
          <div class="flex justify-between w-24">
            <img class="w-10" src="/storage/icon/us.webp" alt="us">
            <div>{{ $t("english") }}</div>
          </div>

        </el-dropdown-item>
        <el-dropdown-item @click="setLocale('es') " v-if="showLocale!=='es'">
          <div class="flex justify-between w-24">
            <img class="w-10"  src="/storage/icon/es.webp" alt="es">
            <div>{{ $t("spanish") }}</div>
          </div>

        </el-dropdown-item>

      </el-dropdown-menu>
    </template>
  </el-dropdown>

</template>

<style scoped lang="scss">
@import "../../css/mixin";
.flags {
  width: 1.8rem;

}
.icon-view {
  width: 27px;
  height: 18.81px;

}
.menu-text {
  @apply font-Musticapro;
  font-size: 16px;
  font-weight: 600;
  line-height: 22px;
  letter-spacing: 0;
  text-align: left;
  color: #0F3B53;



}
</style>