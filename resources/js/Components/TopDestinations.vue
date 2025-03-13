<script setup>
import 'vue3-carousel/dist/carousel.css'
import { Carousel, Pagination, Slide, Navigation } from 'vue3-carousel'
import TopDestinationCard from "./TopDestinationCard.vue";
import {onMounted, ref} from "vue";
const props = defineProps(["destinations"]);
const renderComponent = ref(true);

const itemsToShow = ref(6);

const windowResize = () => {

    const width = window.innerWidth;
    
    if(width > 1344){
      itemsToShow.value = 5;
      return ;
    }

    if(width > 1000 && width < 1344 ){
      itemsToShow.value = 3;
      return 3;
    }
    if( width > 760 && width < 1000){
      itemsToShow.value = 2;
      return 2;
    }
    if (width < 760){
      itemsToShow.value = 1;
      return 1;
    }

}
onMounted(()=>{
  windowResize();
  window.addEventListener('resize',windowResize);
})
</script>

<template>
  <div class="content" v-if="renderComponent" >
    <div class="title mb-4">
      <span>{{$t('top')}} </span>
      <span class="text-[#0084BD]"> {{ $t('natural_paradises') }} </span>
      <span>you have to visit</span>

    </div>
    <Carousel :itemsToShow="itemsToShow" :wrapAround="false" :transition="200">
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
@import "../../css/mixin";
.content {
  margin: 2rem 5rem;
  @apply font-Musticapro;
  @include media(sm) {
    margin: 1rem 1rem;
  }
  .title {
    font-size: 2.5rem;
    font-weight: 600;
    line-height: 55.04px;
    text-align: left;
    text-transform: uppercase;

  }
}
</style>