<script setup>
import Form from "./Form.vue";
import {ref, watch} from "vue";
import useFormReservation from "../common/useFormReservation";
import AdminLayout from "../../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../../Components/AdminHeaderContent.vue";
import {router} from "@inertiajs/vue3";
import Notifications from "../../../Components/Notifications";
import {wTrans} from "laravel-vue-i18n";
const  props = defineProps(['origins','destinations','errors']);
const { form, resetForm,querySearchAsyncAutoCompleteDestinations, querySearchAsyncAutoCompleteOrigin } = useFormReservation(props.origins.data,props.destinations.data);
const formTravel = ref(form);
const onSubmit = (form) => {
  router.post(route('reservations.admin.store'),form);
}
const onCancel = () => {
  resetForm();
  router.visit(route('reservations.admin.index'))
}
watch(()=>props.errors,(newVal)=>{
  if(newVal && newVal.msg)
    Notifications.open(newVal.msg,'error');
})
</script>

<template>
  <AdminLayout>
    <AdminHeaderContent :title="$t('Reservations')">
    </AdminHeaderContent>
    <div class="card mt-5">
      <Form
          :reservation="formTravel"
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