<script setup>
import Form from "./Form.vue";
import AdminLayout from "../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../Components/AdminHeaderContent.vue";
import {useForm} from "@inertiajs/vue3";
const form = useForm({
  name:'',
  likes:0,
  price:0.0,
  photo:''
})
</script>

<template>
  <AdminLayout>
    <AdminHeaderContent :title="$t('TopDestinations')">
     </AdminHeaderContent>
    <Form :data="form"></Form>
  </AdminLayout>

</template>

<style scoped lang="scss">

</style>