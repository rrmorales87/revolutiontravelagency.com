<script setup>
import {defineProps} from 'vue';
const props = defineProps(['title'])
</script>

<template>
  <div
      class="flex flex-col items-start justify-start gap-4 pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
  >
    <h1 class="text-2xl font-semibold whitespace-nowrap">{{props.title}}</h1>
    <slot/>
  </div>
</template>

<style scoped lang="scss">

</style>