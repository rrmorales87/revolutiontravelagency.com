<script setup>
import HomeLayout from "../../Layouts/HomeLayout.vue";
import ItemBanner from "../../Components/ItemBanner.vue";
import TrustPilot from "../../Components/TrustPilot.vue";
import TopDestinations from "../../Components/TopDestinations.vue";
import {computed, toRaw} from "vue";
import {router} from "@inertiajs/vue3";
import {useStore} from "vuex";
import {SET_DESTINY, SET_ORIGIN} from "../../store/mutations/type";
const props = defineProps(['destinations','origins']);
const store = useStore();

const destinations = computed(()=> {
  if (!props.destinations || !props.destinations.data) return [];
  return toRaw(props.destinations.data);
})
const origins = computed(()=>{
  if(!props.origins || !props.origins.data) return [];
  return toRaw(props.origins.data);

})
const request = (params)=> {
  store.commit(SET_ORIGIN,params.origin);
  store.commit(SET_DESTINY,params.destiny)
  router.visit(route('reservations',{
    origin:params.origin,
    destiny:params.destiny
  }))
}
</script>

<template>
    <HomeLayout>
       <item-banner :destinations="destinations" :origins="origins" @request="request"/>
       <div class="mt-5">
        <TopDestinations :destinations="props.destinations.data"/>
       </div>
      
      <TrustPilot/>
    </HomeLayout>

</template>

<style scoped>

</style>
