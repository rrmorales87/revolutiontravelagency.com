<script setup>
</script>
<template>
<div class="main">
<div class="title title-text-banner">
  <div>Cuba is waiting for you by taxi</div>
  <div class="subtitle subtitle-text-banner">
    With more than 20 circuits available throughout
    the country, you won't find a faster way to get around
    the largest of the Antilles.
  </div>

</div>
  <div class="btn">

       <span class="link">Explore more </span>
        <span><i><img src="/storage/icon/chevron.svg"></i></span>

  </div>
</div>
</template>

<style lang="scss" scoped>
.main{
  height:550px;
  background-image: url("/storage/bg/Fondo.svg") ;
  background-size: cover;

  



  .title{
    position: absolute;
    width:600px;
    top:8rem;
    left: 10rem;

    .subtitle{
      margin-top:4rem;
      width: 497px;


    }



  }
  .btn{
    position: absolute;
    left: 10rem;
    top:24rem;
    width: 100%;

    .link{
      font-family: Mustica Pro;
      font-size: 20px;
      font-weight: 400;
      line-height: 28px;
      letter-spacing: 0em;
      text-align: left;
      color: #FFFFFF;
    }
  };

}

</style>