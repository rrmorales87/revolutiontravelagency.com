<script setup>
import { Carousel, Pagination, Slide } from 'vue3-carousel'
</script>

<template>
  <div class="content">
    <div class="title">
      <span>Top </span>
      <span class="text-[#0084BD]">natural paradises </span>
      <span>you have to visit</span>

    </div>
    <Carousel :itemsToShow="3" :wrapAround="false" :transition="500">
      <Slide v-for="slide in 10" :key="slide">
        <div class="carousel__item">{{ slide }}</div>
      </Slide>

      ...
    </Carousel>

  </div>
</template>

<style scoped lang="scss">
.content {
  margin: 2rem 5rem;
  @apply font-Musticapro;
  .title {
    font-size: 2.5rem;
    font-weight: 600;
    line-height: 55.04px;
    text-align: left;

  }
}
</style>