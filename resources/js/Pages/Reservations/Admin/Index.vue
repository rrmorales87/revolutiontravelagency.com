<script setup>
import { CheckCircleIcon as CheckCircleIconOut} from "@heroicons/vue/24/outline";
import AdminLayout from "../../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../../Components/AdminHeaderContent.vue";
import moment from "moment";
import 'moment/locale/es';
import {computed, onMounted} from "vue";
import {router, usePage} from "@inertiajs/vue3";
import FormatCurrency from "../../../Components/FormatCurrency.vue";
import {CheckCircleIcon, XCircleIcon} from "@heroicons/vue/24/solid";
import {wTrans} from "laravel-vue-i18n";
import useFilterStatus from "../common/useFilterStatus";
const props = defineProps(['tableData']);
const page = usePage();
const locale = computed(()=>page.props.locale);
onMounted(()=>{
  moment().locale(locale.value);
})
const {filterStatus,filterStatusHandler} = useFilterStatus();

const approve = id=>{
  router.visit(route('reservations.admin.confirm',id))
}
</script>

<template>
  <AdminLayout>
    <div class="w-full overflow-x-auto">
      <AdminHeaderContent :title="$t('Reservations')"/>
      <div class="container mt-5 overflow-auto">
        <el-table stripe
                  :data="props.tableData.data"
                  lazy style="width: 100%"
                  size="small"
                  :default-sort="{ prop: 'date', order: 'descending' }"
        >
          <el-table-column  label="ID">
            <template #default="scope">
                <div class="uppercase font-bold  text-xl">
                  <span>{{scope.row.slug}}</span>
                </div>
            </template>
          </el-table-column>
          <el-table-column  :label="$t('origins')">
            <template #default="scope">
              <span>{{scope.row.origin.name}}</span>
            </template>
          </el-table-column>
          <el-table-column  :label="$t('destiny')">
            <template #default="scope">
              <span>{{scope.row.destiny.name}}</span>
            </template>
          </el-table-column>
          <el-table-column  :label="$t('User')">
            <template #default="scope">
              <span>{{scope.row.user.name}}-{{scope.row.user.email}}</span>
            </template>
          </el-table-column>
          <el-table-column  :label="$t('Client')">
            <template #default="scope">
              <span>{{scope.row.client.name}}-{{scope.row.client.contact}}</span>
            </template>
          </el-table-column>
          <el-table-column sortable :label="$t('date')">
            <template #default="scope">
              <span>{{moment(scope.row.date,"YYYY-mm-dd").format('LL')}}</span>
            </template>
          </el-table-column>
          <el-table-column  :label="$t('travelTime')">
            <template #default="scope">
              <span>{{ moment(scope.row.time,"HH:mm:ss").format('LT') }}</span>
            </template>
          </el-table-column>
          <el-table-column  :label="$t('checkin')">
            <template #default="scope">
              <span>{{ moment(scope.row.time_end,"HH:mm:ss").format('LT') }}</span>
            </template>
          </el-table-column>
          <el-table-column prop="price" :label="$t('Price')" >
            <template #default="scope">
              <FormatCurrency :balance="scope.row.totalAmount" :locale="locale"/>
            </template>
          </el-table-column>
          <el-table-column    :label="$t('Status')"
                              :filters="filterStatus()"
                              :filter-method="filterStatusHandler"
          >
            <template #default="scope">
              <CheckCircleIcon v-if="scope.row.status!=='canceled'" class="  rounded-l w-8"
                               :class="[
                    {'text-[#265873]':scope.row.status === 'approved'},
                    {'text-green-700':scope.row.status === 'confirmed'},
                    {'text-gray-200':scope.row.status === 'draft'}
                    ]" />
              <XCircleIcon v-if="scope.row.status==='canceled'" class="text-red-700  rounded-l w-8"
              />

            </template>
          </el-table-column>
          <el-table-column fixed="right" :label="$t('Operations')" width="120">
            <template #default="scope">
              <div class="flex">
                <el-tooltip
                    v-if="scope.row.status === 'draft'"
                    class="box-item"

                    :content="$t('tooltipCheckConfirm')"
                    placement="top-start"
                >
                  <CheckCircleIconOut v-if="scope.row.status === 'draft'" class="w-8 text-green-600 cursor-pointer"
                                @click="approve(scope.row.id)" />
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