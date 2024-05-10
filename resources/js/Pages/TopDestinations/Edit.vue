<script setup>
import Form from "./Form.vue";
import AdminLayout from "../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../Components/AdminHeaderContent.vue";
import {useForm} from "@inertiajs/vue3";
const props = defineProps(["destination"]);
const form = useForm(props.destination.data);
const submit = async (data) => {
  console.log("Datos",data);
  if(data && data.images && data.images.length > 0){
    if(data.images[0].response)
      data.photo = data.images[0].response;
    else data.photo = data.images[0].name;
  }else data.photo = '';
  if(data && data.location){
    if ( typeof data.location === "object" )
      data.location = JSON.stringify(data.location);
  }

  await data.put(route('destination.update'));
}
</script>

<template>
  <AdminLayout>
    <AdminHeaderContent :title="$t('TopDestinations')">
    </AdminHeaderContent>
    <Form :data="form" :update="true" @submit="submit"></Form>
  </AdminLayout>
</template>

<style scoped lang="scss">

</style>