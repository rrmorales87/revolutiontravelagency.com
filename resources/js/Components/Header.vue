<script setup>
import {ref} from "vue";
import SelectorLanguage from "./SelectorLanguage.vue";
const search = ref();
</script>

<template>
<div class="w-full flex flex-row justify-between items-center gap-4 py-4 lg:px-24 md:px-14 sm:px-5">
  <div class="flex flex-row flex-nowrap">
     <img class="icon-view" src="/storage/icon/subscripcion-icon.svg" alt="subscription logo">
    <span class="menu-text px-2">{{$t("subscription")}}</span>
  </div>
  <div>
    <img class="icon-logo" src="/storage/icon/rtravel-Logo.svg" alt="main logo">
  </div>
  <div class="flex flex-row gap-8 items-center">
    <div class="menu-text flex flex-row gap-8 cursor-pointer">
      <nav>{{$t('community')}}</nav>
      <nav>{{$t('support')}}</nav>
    </div>
    <selector-language/>
    <button class="btn-circuit flex flex-row justify-center items-center px-4 py-2 rounded-full">
      <img class="btn-circuit_icon" src="/storage/icon/circuit-icon.svg" alt="circuit-icon">
      <span class="btn-circuit_text">{{$t('circuits')}}</span>
    </button>
  </div>

</div>
</template>

<style  lang="scss">
.icon-view {
  width: 27px;
  height: 18.81px;
}
.icon-logo {
  width: 135px;
  height: 45px;

}
.menu-text {
  font-family: Mustica Pro;
  font-size: 18px;
  font-weight: 600;
  line-height: 25px;
  letter-spacing: 0;
  text-align: left;
  color: #0F3B53;


}
.btn-circuit {

  background: #EEF2F7;

  &_icon {
    height: 1.68rem;
    width: 1.68rem;
  }

  &_text {
    font-family: Mustica Pro;
    font-size: 18px;
    font-weight: 600;
    line-height: 25px;
    letter-spacing: 0;
    text-align: left;

  }
}

</style>