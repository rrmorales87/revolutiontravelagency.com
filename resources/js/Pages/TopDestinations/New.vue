<script setup>
import Form from "./Form.vue";
import AdminLayout from "../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../Components/AdminHeaderContent.vue";
</script>

<template>
  <AdminLayout>
    <AdminHeaderContent :title="$t('TopDestinations')">
     </AdminHeaderContent>
    <Form></Form>
  </AdminLayout>

</template>

<style scoped lang="scss">

</style>