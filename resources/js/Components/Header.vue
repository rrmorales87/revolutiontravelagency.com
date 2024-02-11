<script setup>
import {ref} from "vue";
import SelectorLanguage from "./SelectorLanguage.vue";
const search = ref();
</script>

<template>
<div class="flex flex-col">
  <div class="w-full flex flex-row justify-between items-center gap-4 py-4 lg:px-24 md:px-14 sm:px-5 mb-10">
    <div class="hidden-sm flex flex-row flex-nowrap cursor-pointer " >
      <img class="icon-view" src="/storage/icon/subscripcion-icon.svg" alt="subscription logo">
      <span class="menu-text px-2">{{$t("subscription")}}</span>
    </div>
    <div>
      <img class="icon-logo" src="/storage/icon/rtravel-Logo.svg" alt="main logo">
    </div>
    <div class="flex flex-row gap-8 items-center ">
      <div class="hidden-sm  menu-text flex flex-row gap-8 cursor-pointer">
        <nav>{{$t('support')}}</nav>
        <nav>{{$t('community')}}</nav>

      </div>
      <selector-language/>
      <button class="btn-circuit flex flex-row justify-center items-center px-4 py-2 rounded-full">
        <img class="btn-circuit_icon" src="/storage/icon/circuit-icon.svg" alt="circuit-icon">
        <span class="btn-circuit_text">{{$t('circuits')}}</span>
      </button>
    </div>

  </div>
  <div class="flex flex-row justify-center items-center">
    <h1 class="title-search">{{$t("title-search1")}} <span class="title-cuba"> Cuba </span>{{$t("title-search2")}}</h1>
  </div>
</div>


</template>

<style  lang="scss">
.hidden-sm {
  @media screen and (max-width: 768px){
    display: none;
  }
}
.title-search {
  font-size: 2.5rem;
  font-weight: 600;
  line-height: 3.4375rem;
  letter-spacing: 0;
  text-align: left;
  color: #0F3B53;
  @media screen and (max-width: 768px){
    padding-right: 2rem;
    padding-left: 2rem;
    font-size: 1.5rem;
    line-height: 2rem;
  }
  .title-cuba {
    color:#0084BD;
  }


}
.icon-view {
  width: 27px;
  height: 18.81px;
}
.icon-logo {
  width: 135px;
  height: 45px;

}
.menu-text {
  font-size: 18px;
  font-weight: 600;
  line-height: 25px;
  letter-spacing: 0;
  text-align: left;
  color: #0F3B53;


}
.btn-circuit {

  background: #EEF2F7;
  width: 8.25rem;

  &_icon {
    height: 1.68rem;
    width: 1.68rem;
  }

  &_text {

    font-size: 18px;
    font-weight: 600;
    line-height: 25px;
    letter-spacing: 0;
    text-align: left;

  }
}

</style>