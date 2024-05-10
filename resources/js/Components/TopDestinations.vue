<script setup>
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Pagination, Slide, Navigation } from 'vue3-carousel'
import TopDestinationCard from "./TopDestinationCard.vue";
import {computed} from "vue";
const props = defineProps(["destinations"]);
console.log("Dest",props.destinations);
const itemsToShow = computed(() => {
  const width = window.innerWidth;
  console.log("Widt",width);
  if(width > 1344)
    return 4;
  if(width > 1000 && width < 1344 ){
    return 3;
  }
  if( width > 760 && width < 1000){
    return 2;
  }
  if (width < 760) return 1;
  return 3;
})
</script>

<template>
  <div class="content">
    <div class="title mb-4">
      <span>Top </span>
      <span class="text-[#0084BD]">natural paradises </span>
      <span>you have to visit</span>

    </div>
    <Carousel :itemsToShow="itemsToShow" :wrapAround="false" :transition="500">
      <Slide v-for="slide in props.destinations" :key="slide">
        <div class="carousel__item">
          <TopDestinationCard :destination="slide"/>
        </div>
      </Slide>
      <template #addons>
        <Navigation />
        <Pagination />
      </template>
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