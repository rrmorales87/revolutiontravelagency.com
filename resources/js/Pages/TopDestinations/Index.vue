<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../Components/AdminHeaderContent.vue";
import AdminAddButton from "../../Components/AdminAddButton.vue";
import { PencilSquareIcon,HandThumbUpIcon,TrashIcon} from '@heroicons/vue/24/outline'
import {router} from "@inertiajs/vue3";
const add = ()=> router.visit(route('createTopDestinations'));
const props = defineProps(['tableData'])
</script>

<template>
  <AdminLayout>
    <div class="w-full overflow-x-auto">
      <AdminHeaderContent :title="$t('TopDestinations')">
        <div>
          <AdminAddButton :title="$t('New')" @onClick="add"/>
        </div>
      </AdminHeaderContent>
      <div class="table lg:table-auto   lg:w-full md:w-96 mt-5 overflow-auto">
        <el-table :data="props.tableData.data" lazy style="width: 100%" size="small">
          <el-table-column prop="name" label="Name"/>
          <el-table-column prop="likes" label="Likes" style="width:10% " >
            <template #default="scope">
              <div class="flex justify-items-center gap-1">

                  <HandThumbUpIcon class="w-4 text-gray-950" />


                <span class="text-lg font-bold">{{scope.row.likes}}</span>
              </div>


            </template>

          </el-table-column>
          <el-table-column prop="price" label="Price" style="width:10% " >
            <template #default="scope">
              ${{scope.row.price}}
            </template>
          </el-table-column>
          <el-table-column prop="photo" label="Photo" >
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
          <el-table-column fixed="right" label="Operations" width="120">
            <template #default>
              <el-button link type="primary" size="small" @click="handleClick">
                <PencilSquareIcon class="w-8 text-blue-600" />

              </el-button>
              <el-button link type="primary" size="small">
                <TrashIcon class="w-8 text-red-600" />
              </el-button>
            </template>
          </el-table-column>
        </el-table>
      </div>
    </div>

    </AdminLayout>



</template>

<style scoped lang="scss">

</style>