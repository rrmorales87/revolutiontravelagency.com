<script setup>
import AdminLayout from "../../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../../Components/AdminHeaderContent.vue";
import Form from "./Form.vue";
import {router} from "@inertiajs/vue3";
const props = defineProps(['reservation','origins','destinations'])
console.log("Reservations",props.reservation);
const approve = (reservation) => {
  router.post(route('reservations.admin.approve'),{id:reservation.id,price:reservation.price,time:reservation.time_end})
}
</script>

<template>
  <AdminLayout>
    <div class="w-full overflow-x-auto">
      <AdminHeaderContent :title="$t('Approve reservation')"/>
      <div class="container mt-5 overflow-auto">
        <Form :reservation="props.reservation" :destinations="props.destinations" :origins="props.origins" @submitForm="approve"/>
      </div>
    </div>
  </AdminLayout>
</template>

<style scoped lang="scss">

</style>