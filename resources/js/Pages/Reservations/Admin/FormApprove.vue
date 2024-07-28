<script setup>
import { usePage} from "@inertiajs/vue3";
import { ref} from "vue";
import moment from "moment/moment";
const props = defineProps(['origins','destinations','reservation']);
const emits = defineEmits(['submitForm'])
const page = usePage();
const formTravel = ref(props?.reservation?.data)
const submitForm = () => emits('submitForm',formTravel.value);
const gotBack = () => window.history.back();
</script>

<template>
<el-form v-if="formTravel" label-position="top" :model="formTravel" label-width="auto" style="width: 100%">
  <div class="flex">
    <div class="uppercase @apply font-Musticapro mr-2">{{formTravel.slug}}</div>
    <div class="uppercase @apply font-Musticapro mr-2">{{moment(formTravel.date,"YYYY-MM-DD").format('LL')}}</div>
    <div class="uppercase @apply font-Musticapro mr-2">{{moment(formTravel.time,"HH:mm:ss").format('LT')}}</div>
  </div>

    <el-col :span="8">
      <el-form-item :label="$t('Price')">
        <el-input v-model="formTravel.price" />
      </el-form-item>
    </el-col>
  <el-col :span="8">
      <el-form-item :label="$t('checkin')">
        <el-time-picker
            v-model="formTravel.time_end"
            arrow-control
            :placeholder="$t('hours')"
            size="large"
            name="time"
            format="HH:mm:ss"
            value-format="HH:mm:ss"

        />
      </el-form-item>
    </el-col>
  <el-form-item>
    <el-button type="primary" color="#0F3B53" @click="submitForm">
      {{$t('Approve')}}
    </el-button>
    <el-button @click="gotBack">{{$t('Cancel')}}</el-button>
  </el-form-item>



</el-form>
</template>

<style scoped lang="scss">

</style>