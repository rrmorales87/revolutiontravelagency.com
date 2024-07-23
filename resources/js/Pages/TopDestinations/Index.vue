<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../Components/AdminHeaderContent.vue";
import AdminAddButton from "../../Components/AdminAddButton.vue";
import { PencilSquareIcon,HandThumbUpIcon,TrashIcon} from '@heroicons/vue/24/outline';
import { InfoFilled } from '@element-plus/icons-vue';
import {router,Link} from "@inertiajs/vue3";
const add = ()=> router.visit(route('createTopDestinations'));
const props = defineProps(['tableData']);
const confirmEvent = async (id) => {
   router.delete(route('destination.delete',id));
}

</script>

<template>
  <AdminLayout>
    <div class="w-full overflow-x-auto">
      <AdminHeaderContent :title="$t('TopDestinations')">
        <div>
          <AdminAddButton :title="$t('New')" @onClick="add"/>
        </div>
      </AdminHeaderContent>
      <div class="container mt-5 overflow-auto">
        <el-table :data="props.tableData.data" lazy style="width: 100%" size="small">
          <el-table-column prop="name" :label="$t('Name')"/>
          <el-table-column prop="likes" label="Likes" style="width:10% " >
            <template #default="scope">
              <div class="flex justify-items-center gap-1">

                  <HandThumbUpIcon class="w-4 text-gray-950" />


                <span class="text-lg font-bold">{{scope.row.likes}}</span>
              </div>


            </template>

          </el-table-column>
          <el-table-column prop="price" :label="$t('Price')" style="width:10% " >
            <template #default="scope">
              ${{scope.row.price}}
            </template>
          </el-table-column>
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
                <Link :href="route('destination.edit',scope.row.id)" type="button">
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