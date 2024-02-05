<script setup>
import PrimaryButton from "./PrimaryButton.vue";
</script>
<template>
<div class="main ">
<div class="title">
  <div class="hidden-sm">{{ $t("title-banner") }}</div>
  <div class="hidden-md">{{ $t("title-banner-mobile") }}</div>
  <div class="subtitle">
    <div class="hidden-sm">{{ $t("title-banner-description")}}</div>
    <div class="hidden-md">{{ $t("title-banner-description-mobile")}}</div>

  </div>
  <div class="btn-more mt-5">
    <primary-button>
      <span class="link">{{$t("more")}}</span>
      <span><i><img class="w-3" src="/storage/icon/arrow-right.svg"></i></span>
    </primary-button>
  </div>

</div>
</div>
</template>

<style lang="scss" scoped>
.main {
  height:700px;
  margin: 2rem 5rem;
  background-image: url("/storage/bg/Fondo.svg") ;
  background-repeat: no-repeat;
  background-size: cover;
  display: flex;
  justify-content: flex-start;
  align-items: center;
  padding-left: 10rem;
  border-radius: 50px;
  @media screen and (max-width: 768px) {
    background-image: url("/storage/bg/banner-mobile.svg") ;
    flex-flow: column;
    justify-content: start;
    justify-items: center;
    align-items: center;
    text-align: center;
    padding-left: 0;
    margin: 2rem 2rem;
    height:80rem;
  }
  .title{
    width: 36rem;
    font-size: 2.8125rem;
    font-weight: 600;
    line-height: 3.875rem;
    letter-spacing: 0;
    text-align: left;
    color: #EEF2F7;

    @media screen and (max-width: 768px) {
      font-size: 3rem;
      width: auto;
      padding: 2rem;
      line-height: 6.875rem;
      text-align: center;
    }


    .subtitle{
      margin-top: 1rem;
      font-size: 1.5625rem;
      font-weight: 400;
      line-height: 2.125rem;
      letter-spacing: 0;
      text-align: left;
      @media screen and (max-width: 768px) {
        width: auto;
        padding: 0.5rem;
        line-height: 1.875rem;
        text-align: center;
      }

    }
  }
  .btn-more {
    margin-top: 4rem;
    @media screen and (max-width: 768px) {
        display: flex;
       justify-items: center;
      justify-content: center;
    }
  }

}

</style>