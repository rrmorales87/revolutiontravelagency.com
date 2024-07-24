<script setup>
import AdminLayout from "../../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../../Components/AdminHeaderContent.vue";
</script>

<template>
  <AdminLayout>
    <div class="w-full overflow-x-auto">
      <AdminHeaderContent :title="$t('Reservations')"/>

    </div>
  </AdminLayout>
</template>

<style scoped lang="scss">

</style>