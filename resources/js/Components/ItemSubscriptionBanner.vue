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
  height:550px;
  background-size: cover;
  background-image: url("/storage/bg/Fondo-subscripcion.svg") ;
  background-repeat: no-repeat;
  @media screen and (max-width: 1440px) {
    background-position: center;
  }
  @media screen and (max-width: 1024px) {
    background-size: cover;
    height: 1300px;

  }
  @media screen and (max-width: 425px) {
    height:800px;
    background-size: cover;

  }
  .card-plan{
    position: absolute;
    top:4rem;
    right:10rem ;
    @media screen and (max-width: 1440px) {
      right:0.5rem;
      img{
        width:80%;
        float: right;
        padding-top: 10rem;
        padding-right: 10rem;
      }
    }
    @media screen and (max-width: 1024px) {
      top:20rem;

      img{
        width:60%;
        float: right;
        padding-top: 0;
        padding-right: 0;
      }

    }
    @media screen and (max-width: 768px) {
      top:22rem;

      img{
        width:50%;
        float: right;
      }

    }
    @media screen and (max-width: 425px) {


      img{
        width:50%;

      }

    }

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
    @media screen and (max-width: 1440px) {
      left:5rem;
    }
    @media screen and (max-width: 425px) {
      top:2rem;
      width:300px;
      line-height: 40px;
      font-size:30px;
      left:2.5rem;
      margin-top:2rem;

    }
    @media screen and (max-width: 320px) {
      top:2rem;
      width:280px;
      left:2rem

    }

    .subtitle{
      margin-top:4rem;
      font-size: 36px;
      line-height: 43.88px;
      @media screen and (max-width: 425px) {

        font-size: 18px;

      }
      @media screen and (max-width: 320px) {
        margin-top:1.5rem;

      }

    }

  }
  .btn{
    position: absolute;
    left: 10rem;
    top:30rem;
    @media screen and (max-width: 1440px) {
      left:5rem;
    }
    @media screen and (max-width: 425px) {
      top:25rem ;
      left:2rem;
    }

    @media screen and (max-width: 320px) {
      top:28rem ;
      left:1rem;

    }
  };

}

</style>