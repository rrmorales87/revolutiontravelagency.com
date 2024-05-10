<script setup>
import {HandThumbUpIcon} from "@heroicons/vue/24/outline";
const props = defineProps(['destination']);
</script>

<template>
  <div class="card  @apply font-Lato mb-5 shadow-2xl rounded-2xl">
      <img class="w-80 h-56 rounded-t-2xl object-fit" :src="props.destination.photo"  alt="logo">
      <div class="card-body text-left mt-2 flex flex-col gap-2 p-2">
          <div class="text-[#0084BD] font-bold cursor-pointer">
            {{props.destination.name}}
          </div>
          <div class="flex justify-between text-xs">
            <div class="flex gap-1 ">
              <HandThumbUpIcon class="w-4 text-gray-950 cursor-pointer" />
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