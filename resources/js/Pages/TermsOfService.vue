<script setup>
import HomeLayout from "../Layouts/HomeLayout.vue";

const props = defineProps(['term']);
</script>

<template>
   <HomeLayout>
    <div class="mx-20  my-8 @apply font-Lato text-justify" v-html="props.term">

    </div>
   </HomeLayout>
  
</template>
