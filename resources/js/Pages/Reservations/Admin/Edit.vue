<script setup>

import AdminLayout from "../../../Layouts/AdminLayout.vue";
import Form from "./Form.vue";
import AdminHeaderContent from "../../../Components/AdminHeaderContent.vue";
import useFormReservation from "../common/useFormReservation";
import {onBeforeMount} from "vue";
import {router} from "@inertiajs/vue3";
const  props = defineProps(['origins','destinations','reservation']);
const {form, resetForm, querySearchAsyncAutoCompleteDestinations, querySearchAsyncAutoCompleteOrigin } = useFormReservation(props.origins.data,props.destinations.data);
onBeforeMount(()=>{
  form.value = props.reservation.data;
  form.value.origin = props.reservation.data.origin.name;
  form.value.destiny = props.reservation.data.destiny.name;
  form.value.contact = props.reservation.data.client.contact;
  form.value.name = props.reservation.data.client.name;
  })
const onCancel = () => {
  resetForm();
  router.visit(route('reservations.admin.index'));
}
const onSubmit = (form) => {
 router.post(route('reservations.admin.update'),form)
}
</script>

<template>
  <AdminLayout>
    <AdminHeaderContent :title="$t('Reservations')">
    </AdminHeaderContent>
    <div class="card mt-5">
      <Form
          :reservation="form"
          @fetch-destinations="querySearchAsyncAutoCompleteDestinations"
          @fetch-origins="querySearchAsyncAutoCompleteOrigin"
          @cancel="onCancel"
          @submit="onSubmit"
      ></Form>
    </div>
  </AdminLayout>
</template>

<style scoped lang="scss">

</style>