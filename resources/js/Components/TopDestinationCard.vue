<script setup>
import {HandThumbUpIcon} from "@heroicons/vue/24/outline";

const props = defineProps(['destination']);
</script>

<template>
  <div class="card  @apply font-Lato">
      <img class="w-72 h-56 rounded-2xl object-fit" :src="props.destination.photo"  alt="logo">
      <div class="card-body text-left mt-2 flex flex-col gap-2">
          <div class="text-[#0084BD] font-bold cursor-pointer">
            {{props.destination.name}}
          </div>
          <div class="flex justify-between text-xs">
            <div class="flex gap-1 ">
              <HandThumbUpIcon class="w-4 text-gray-950 cursor-pointer" />
              <span class="text-md font-bold ">{{props.destination.likes}}</span>
            </div>
            <div class="text-right  font-bold">
              desde ${{ props.destination.price }}
            </div>
          </div>
      </div>


  </div>

</template>

<style scoped lang="scss">

</style>