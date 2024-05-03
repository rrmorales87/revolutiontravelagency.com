<script setup>
import {Plus} from "@element-plus/icons-vue";
const props = defineProps(['title'])
</script>

<template>
  <el-button round color="#0F3B53" @click="$emit('onClick')">
    <div class="flex justify-items-center p-2">
      <el-icon><Plus /></el-icon>
      <span>{{props.title}}</span>
    </div>
  </el-button>
</template>

<style scoped lang="scss">

</style>