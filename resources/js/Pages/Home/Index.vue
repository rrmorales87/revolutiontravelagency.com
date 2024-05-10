<script setup>
import HomeLayout from "../../Layouts/HomeLayout.vue";
import ItemBanner from "../../Components/ItemBanner.vue";
import TrustPilot from "../../Components/TrustPilot.vue";
import TopDestinations from "../../Components/TopDestinations.vue";
const props = defineProps(['destinations']);
</script>

<template>
    <HomeLayout>
       <item-banner/>
      <TopDestinations :destinations="props.destinations.data"/>
      <TrustPilot/>
    </HomeLayout>

</template>

<style scoped>

</style>
