<script setup>
import Form from "./Form.vue";
import AdminLayout from "../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../Components/AdminHeaderContent.vue";
import {router, useForm} from "@inertiajs/vue3";
import {ElLoading} from "element-plus";
import {wTrans} from "laravel-vue-i18n";
const form = useForm({
  name:'',
  likes:0,
  price:0.0,
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

 await data.post(route('destination.store'));
}
</script>

<template>
  <AdminLayout>
    <AdminHeaderContent :title="$t('TopDestinations')">
     </AdminHeaderContent>
    <Form :data="form" @submit="submit"></Form>
  </AdminLayout>

</template>

<style scoped lang="scss">

</style>