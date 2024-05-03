<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../Components/AdminHeaderContent.vue";
import {ref} from "vue";
import AdminAddButton from "../../Components/AdminAddButton.vue";
import {router} from "@inertiajs/vue3";
const tableData = ref([]);
const add = ()=> router.visit(route('createTopDestinations'));
</script>artisan

<template>
<AdminLayout>
  <AdminHeaderContent :title="$t('TopDestinations')">
    <div>
       <AdminAddButton :title="$t('New')" @onClick="add"/>
    </div>
  </AdminHeaderContent>
  <div class="w-full mt-5">
    <el-table :data="tableData" stripe style="width: 100%">
      <el-table-column prop="name" label="Name"/>
      <el-table-column prop="likes" label="Likes"  />
      <el-table-column prop="photo" label="Photo" />
    </el-table>
  </div>
</AdminLayout>
</template>

<style scoped lang="scss">

</style>