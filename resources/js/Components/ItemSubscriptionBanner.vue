<script setup>


import RegisterButton from "./RegisterButton.vue";
import PrimaryButton from "./PrimaryButton.vue";
</script>

<template>
<div class="main pr-48">

<div class="title">
  <div>{{ $t("Your adventure, your way")}}</div>
  <div class="subtitle">
    {{ $t("Travel around Cuba")}}
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
  background-size: cover;
  background-image: url("/storage/bg/Fondo-subscripcion.svg") ;
  background-repeat: no-repeat;
  display: flex;
  justify-content: flex-end;
  align-items: center;


  .title{

    width:600px;
    font-family: Musticapro;
    font-weight: 600;
    font-size: 40px;
    line-height: 78.02px;
    color:  white;
    .subtitle{
      margin-top:2rem;
      font-weight: 400;
      font-size: 20px;
      line-height: 43.88px;


    }

  }


}

</style>