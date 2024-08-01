<script setup>
import {HandThumbUpIcon} from "@heroicons/vue/24/outline";
import {router} from "@inertiajs/vue3";
const props = defineProps(['destination']);
const  addLike = (id) => {
router.post(route('addlike',id));
}
const goToReservation = destiny => {
  console.log("Destiny",destiny);
  const origin = '';
  router.get(route('reservations'),{origin,destiny});
}
</script>

<template>
  <div class="card  @apply font-Lato mb-5 shadow-2xl rounded-2xl cursor-pointer" >
      <img class="w-80 h-56 rounded-t-2xl object-fit" :src="props.destination.photo"  alt="logo"
           @click="goToReservation(props.destination.name)">
      <div class="card-body text-left mt-2 flex flex-col gap-2 p-2" >
          <div class="text-[#0084BD] font-bold cursor-pointer" @click="goToReservation(props.destination.name)">
            {{props.destination.name}}
          </div>
          <div class="flex justify-between text-xs">
            <div class="flex gap-1 ">
              <HandThumbUpIcon class="w-4 text-gray-950 cursor-pointer" @click="addLike(props.destination.id)" />
              <span class="text-md font-bold ">{{props.destination.likes}}</span>
            </div>
            <div class="flex gap-1 text-right  font-bold ">
              <span>{{$t("from")}}</span>
              <span>${{ props.destination.price }}</span>
            </div>
          </div>
      </div>


  </div>

</template>

<style scoped lang="scss">

</style>