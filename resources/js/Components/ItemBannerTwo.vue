<script setup>
import PrimaryButton from "./PrimaryButton.vue";
</script>
<template>
<div class="main">
  <img src="/storage/bg/fondo3.svg" alt="">
<div class="title title-text-banner ">
  <div>{{ $t('Your travel begin here') }}</div>
  <div class="subtitle subtitle-text-banner">
    {{ $t("withUs")}}
  </div>
  <div class="mt-5">
    <primary-button>
      <span class="link">Explore more </span>
      <span><i><img src="/storage/icon/chevron.svg"></i></span>
    </primary-button>
  </div>

</div>
</div>
</template>

<style lang="scss" scoped>
.main{
  height:650px;
  background-image: url("/storage/bg/Fondo3.svg") ;
  background-repeat: no-repeat;
  background-size: cover;
  display: flex;
  justify-content: flex-end;
  align-items: center;
  padding-right: 10rem;
  .title{

    width:600px;

    .subtitle{
      margin-top:4rem;
      width: 497px;
    }
  }




}

</style>