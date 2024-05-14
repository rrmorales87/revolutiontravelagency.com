<script setup>
import HomeLayout from "../../Layouts/HomeLayout.vue";
import ItemBanner from "../../Components/ItemBanner.vue";
import TrustPilot from "../../Components/TrustPilot.vue";
import TopDestinations from "../../Components/TopDestinations.vue";
import {computed, toRaw} from "vue";
const props = defineProps(['destinations','origins']);
const destinations = computed(()=> {
  if (!props.destinations || !props.destinations.data) return [];
  return toRaw(props.destinations.data);
})
const origins = computed(()=>{
  if(!props.origins || !props.origins.data) return [];
  return toRaw(props.origins.data);

})
</script>

<template>
    <HomeLayout>
       <item-banner :destinations="destinations" :origins="origins"/>
      <TopDestinations :destinations="props.destinations.data"/>
      <TrustPilot/>
    </HomeLayout>

</template>

<style scoped>

</style>
