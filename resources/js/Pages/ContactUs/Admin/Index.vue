<script setup>

import AdminLayout from "../../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../../Components/AdminHeaderContent.vue";
import moment from "moment/moment";
const props = defineProps(['tableData']);
console.log("Props",props.tableData);
</script>

<template>
  <AdminLayout>
    <div class="w-full overflow-x-auto">
      <AdminHeaderContent :title="$t('support')"></AdminHeaderContent>
      <div class="container mt-5 overflow-auto">
        <el-table stripe
                  :data="props.tableData.data"
                  lazy style="width: 100%"
                  size="small"
                  :default-sort="{ prop: 'date', order: 'descending' }"
        >
          <el-table-column  :label="$t('Name')">
            <template #default="scope">
              <div class="uppercase font-bold  text-xl">
                <span>{{scope.row.name}}</span>
              </div>
            </template>
          </el-table-column>
          <el-table-column  :label="$t('email')">
            <template #default="scope">
              <span>{{scope.row.email}}</span>
            </template>
          </el-table-column>
          <el-table-column sortable :label="$t('date')">
            <template #default="scope">
              <span>{{moment(scope.row.date).format('LL')}}</span>
            </template>
          </el-table-column>
          <el-table-column  :label="$t('message')">
            <template #default="scope">
              <span>{{scope.row.message}}</span>
            </template>
          </el-table-column>



        </el-table>
      </div>
    </div>
  </AdminLayout>
</template>

<style scoped lang="scss">

</style>