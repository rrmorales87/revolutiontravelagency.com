<script setup>
import Form from "./Form.vue";
import AdminLayout from "../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../Components/AdminHeaderContent.vue";
import {useForm} from "@inertiajs/vue3";
const form = useForm({
  name:'',
  images:[],
  photo:'',
  location:''
})
const submit = async (data) => {
  console.log("Datos",data);
  if(data && data.images && data.images.length > 0){
    data.photo = data.images[0].response;
  }else data.photo = '';
  if(data && data.location){
    data.location = JSON.stringify(data.location);
  }

 await data.post(route('origins.store'));
}
</script>

<template>
  <AdminLayout>
    <AdminHeaderContent :title="$t('origins')">
     </AdminHeaderContent>
    <Form :data="form" :update="false" @submit="submit"></Form>
  </AdminLayout>

</template>

<style scoped lang="scss">

</style>