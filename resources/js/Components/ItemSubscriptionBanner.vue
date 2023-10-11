<script setup>


import RegisterButton from "./RegisterButton.vue";
</script>

<template>
<div class="main">
  <div class="card-plan">
      <img src="/storage/icon/plan-tarjetas.png">
  </div>
<div class="title">
  <div>Choose and travel like never before</div>
  <div class="subtitle">
    Get a plan and join the community
  </div>



</div>
  <div class="btn">
   <RegisterButton>
     Registers
   </RegisterButton>
  </div>
</div>
</template>

<style lang="scss" scoped>
.main{
  height: 650px;
  background-size: cover;
  background-image: url("../storage/bg/Fondo-subscripcion.png") ;
  background-repeat: no-repeat;
  .card-plan{
    position: absolute;
    top:4rem;
    right:10rem ;
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
    color:  #0077D9;

    .subtitle{
      margin-top:4rem;
      font-size: 36px;
      line-height: 43.88px;

    }

  }
  .btn{
    position: absolute;
    left: 10rem;
    top:30rem;

  };

}

</style>