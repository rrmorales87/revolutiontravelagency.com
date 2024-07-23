<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../Components/AdminHeaderContent.vue";
import AdminAddButton from "../../Components/AdminAddButton.vue";
import { PencilSquareIcon,TrashIcon} from '@heroicons/vue/24/outline';
import { InfoFilled } from '@element-plus/icons-vue';
import {router,Link} from "@inertiajs/vue3";
const add = ()=> router.visit(route('create.origins'));
const props = defineProps(['tableData']);
const confirmEvent = async (id) => {
   router.delete(route('origins.delete',id));
}

</script>

<template>
  <AdminLayout>
    <div class="w-full overflow-x-auto">
      <AdminHeaderContent :title="$t('origins')">
        <div>
          <AdminAddButton :title="$t('New')" @onClick="add"/>
        </div>
      </AdminHeaderContent>
      <div class="container mt-5 overflow-auto">
        <el-table :data="props.tableData.data" lazy style="width: 100%" size="small">
          <el-table-column prop="name" :label="$t('Name')"/>
          <el-table-column prop="photo" :label="$t('Photo')" >
            <template #default="scope">
              <el-image
                  style="width:100px; height: 100px"
                  :src="scope.row.photo"
                  :zoom-rate="1.2"
                  :max-scale="7"
                  :min-scale="0.2"
                  loading="lazy"
                  :lazy="true"
                  fit="cover"
              />
            </template>
          </el-table-column>
          <el-table-column fixed="right" :label="$t('Operations')" width="120">
            <template #default="scope">
              <div class="flex">
                <Link :href="route('origins.edit',scope.row.id)" type="button">
                  <PencilSquareIcon class="w-8 text-blue-600" />
                </Link>
                <el-popconfirm
                    confirm-button-text="Yes"
                    cancel-button-text="No"
                    :icon="InfoFilled"
                    icon-color="#626AEF"
                    title="Are you sure to delete this?"
                    @confirm="confirmEvent(scope.row.id)"
                >
                  <template #reference>
                      <TrashIcon class="w-8 text-red-600 cursor-pointer" />
                  </template>
                </el-popconfirm>

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