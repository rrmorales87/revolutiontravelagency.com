<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import {LockClosedIcon, LockOpenIcon} from '@heroicons/vue/24/outline';
import {router} from "@inertiajs/vue3";
import AdminHeaderContent from "../../Components/AdminHeaderContent.vue";
const props = defineProps(['tableData']);
const changeRole = (id,roles)=>{
  router.post(route('user.change.roles'),{id,roles})
}
</script>

<template>
  <AdminLayout>
    <div class="w-full overflow-x-auto">
      <AdminHeaderContent :title="$t('Users')">

      </AdminHeaderContent>
      <div class="container mt-5 overflow-auto">
        <el-table stripe  :data="props.tableData.data" lazy style="width: 100%" size="small" >
          <el-table-column prop="name" :label="$t('Name')"/>
          <el-table-column prop="email" :label="$t('email')"/>
          <el-table-column prop="lastName" :label="$t('lastName')"/>
          <el-table-column prop="roles" :label="$t('role')"/>
          <el-table-column fixed="right" :label="$t('Operations')" width="120">
            <template #default="scope">
              <div class="flex">
                <el-tooltip
                    class="box-item"

                    :content="$t('tooltipChangeRole')"
                    placement="top-start"
                >
                  <LockOpenIcon v-if="scope.row.roles ==='admin'" class="w-8 text-blue-600 cursor-pointer"
                                @click="changeRole(scope.row.id,'user')" />
                </el-tooltip>
                <el-tooltip
                    class="box-item"

                    :content="$t('tooltipChangeRole')"
                    placement="top-start"
                >
                  <LockClosedIcon v-if="scope.row.roles ==='user'" class="w-8 text-blue-600 cursor-pointer"
                                  @click="changeRole(scope.row.id,'admin')"/>
                </el-tooltip>



              </div>

            </template>
          </el-table-column>
        </el-table>
      </div>
    </div>
  </AdminLayout>
</template>

<style scoped lang="scss">

</style>