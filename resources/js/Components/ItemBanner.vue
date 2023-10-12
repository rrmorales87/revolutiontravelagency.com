<script setup>

import ReserveButton from "./ReserveButton.vue";
</script>

<template>
<div class="main">
<div class="title">
  <div>Cuba is waiting for you by taxi</div>
  <div class="subtitle">
    Travel as a family quickly and without commitment
  </div>



</div>
  <div class="btn">
    <ReserveButton>
      Reserve
    </ReserveButton>
  </div>
</div>
</template>

<style lang="scss" scoped>
.main{
  height: 650px;
  background-image: url("../storage/bg/Fondo.png") ;
  background-size: cover;

  
  @media screen and (max-width: 1440px) {
    background-position: right;

  }
  @media screen and (max-width: 1024px) {
    background-size: cover;
    height: 1300px;
    background-position:1300px;

  }
  @media screen and (max-width: 768px) {
    background-size: cover;
    height: 1300px;
    background-position:1200px;

  }

  .title{
    position: absolute;
    width:500px;
    top:4rem;
    left: 10rem;
    font-family: Montserrat;
    font-weight: 600;
    font-size: 64px;
    line-height: 78.02px;
    color: white;
    .subtitle{
      margin-top:4rem;
      font-size: 36px;
      line-height: 43.88px;

    }
    @media screen and (max-width: 1024px) {
      top: 2rem;
      left: 2rem;
    }

  }
  .btn{
    position: absolute;
    left: 10rem;
    top:30rem;
    @media screen and (max-width: 1024px) {
      left: 2rem;
    }

  };

}

</style>