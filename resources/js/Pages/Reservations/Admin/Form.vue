<script setup>
import {ref, computed} from "vue";
import { HomeIcon, MapPinIcon } from '@heroicons/vue/24/outline';
import {email, helpers, required} from "@vuelidate/validators";
import {useVuelidate} from "@vuelidate/core";
import Notifications from "../../../Components/Notifications";
import InputError from "../../../Components/InputError.vue";
import FormatCurrency from "../../../Components/FormatCurrency.vue";
const props = defineProps(['reservation']);
const emit = defineEmits(['submit','cancel','fetchDestinations','fetchOrigins']);
import useFilterStatus from "../common/useFilterStatus";
import {wTrans} from "laravel-vue-i18n";
const form = ref(props.reservation);
import {router} from "@inertiajs/vue3";
const { filterStatus } = useFilterStatus();
const status = computed(()=>filterStatus());
const totalAmount = computed(()=>{
  const result = form.value.price * form.value.tax;
  if(isNaN(result)) return 0;
  return  result;
})
const rules = computed(() => {
  return {
    origin:{required: helpers.withMessage(wTrans("requiredField"), required)},
    destiny:{required: helpers.withMessage(wTrans("requiredField"), required)},
    status:{required: helpers.withMessage(wTrans("requiredField"), required)},
    price:{required: helpers.withMessage(wTrans("requiredField"), required)},
    tax:{required: helpers.withMessage(wTrans("requiredField"), required)},
    date:{required: helpers.withMessage(wTrans("requiredField"), required)},
    time:{required: helpers.withMessage(wTrans("requiredField"), required)},
    travellers:{required: helpers.withMessage(wTrans("requiredField"), required)},
    contact:{required: helpers.withMessage(wTrans("requiredField"), required),
      email: helpers.withMessage(wTrans("emailFail"), email)},
    name:{required: helpers.withMessage(wTrans("requiredField"), required)}
  }

});
const $v = useVuelidate(rules, form.value,{ $lazy: true });

const submit = async () => {
  const valid = await $v.value.$validate();
  if(valid){
    emit('submit',form.value);
  }else {
    Notifications.open(wTrans("errorField").value,'error');
  }
}
</script>

<template>
  <form class="w-full ">
    <div class="md:flex md:items-center mb-6 ">
      <div class="md:w-1/6">
        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
          {{$t('inputOrigin')}}
        </label>
      </div>
      <div class=" lg:w-full">
        <el-autocomplete :placeholder="$t('originRequest')"
                         name="origin"
                         size="large"
                         v-model="form.origin"
                         :fetch-suggestions="(q,cb)=>emit('fetchOrigins',q,cb)"
        >
          <template #suffix>
            <el-icon class="el-input__icon" >
              <HomeIcon/>
            </el-icon>
          </template>
        </el-autocomplete>
        <InputError :errors="$v.origin.$errors"/>
      </div>
    </div>
    <div class="md:flex md:items-center mb-6">
      <div class="md:w-1/6">
        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
          {{$t('inputDestiny')}}
        </label>
      </div>
      <div class="  lg:w-full">
        <el-autocomplete :placeholder="$t('destinyRequest')"
                         name="destiny"
                         size="large"
                         v-model="form.destiny"
                         :fetch-suggestions="(q,cb)=>emit('fetchDestinations',q,cb)"
        >
          <template #suffix>
            <el-icon class="el-input__icon" >
              <MapPinIcon/>
            </el-icon>
          </template>

        </el-autocomplete>
        <InputError :errors="$v.destiny.$errors"/>
      </div>
    </div>
    <div class="w-full my-5 grid md:grid-cols-4 sm:grid-cols-1 gap-4">
        <div class="flex items-center">
          <label class="w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="date">
            {{$t('Date')}}
          </label>
          <el-date-picker
              v-model="form.date"
              name="date"
              type="date"
              :placeholder="$t('date')"
              size="large"
              format="DD/MM/YYYY"
              value-format='YYYY-MM-DD'

          />
          <InputError :errors="$v.date.$errors"/>
        </div>
        <div class="flex items-center">
        <label class="w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
          {{$t('travelTime')}}
        </label>
        <el-time-picker
            v-model="form.time"
            arrow-control
            :placeholder="$t('hours')"
            size="large"
            name="time"
            format="HH:mm:ss"
            value-format="HH:mm:ss"

        />
          <InputError :errors="$v.time.$errors"/>
        </div>
        <div class="flex items-center">
        <label class="w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
          {{$t('checkin')}}
        </label>
        <el-time-picker
            v-model="form.time_end"
            arrow-control
            :placeholder="$t('hours')"
            size="large"
            name="time"
            format="HH:mm:ss"
            value-format="HH:mm:ss"

        />
        </div>
        <div class="flex items-center">
        <label class="w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
          {{$t('totalTravelers')}}
        </label>
          <el-input-number name="travellers" v-model="form.travellers"/>
          <InputError :errors="$v.travellers.$errors"/>
        </div>

    </div>
    <div class="w-full my-5 grid md:grid-cols-4 sm:grid-cols-1 gap-4">
      <div class="flex items-center">
        <label class="w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
          {{$t('Status')}}
        </label>
        <el-select  v-model="form.status" name="status">
          <el-option
              v-for="item in status"
              :key="item.value"
              :label="item.text"
              :value="item.value"
          />
        </el-select>
        <InputError :errors="$v.status.$errors"/>
      </div>
        <div class="flex items-center">
          <label class="w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="date">
            {{$t('Price')}}
          </label>
         <el-input-number name="price" v-model="form.price" :min="1"/>
          <InputError :errors="$v.price.$errors"/>
        </div>
        <div class="flex items-center">
        <label class="w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
          {{$t('taxes')}}
        </label>
          <el-input-number name="tax" v-model="form.tax"/>
          <InputError :errors="$v.tax.$errors"/>
        </div>
      <div class="flex items-center">
        <label class="w-1/3 block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
          {{$t('totalAmount')}}
        </label>
          <format-currency :balance="totalAmount" />
      </div>



    </div>
    <div class="md:flex md:items-center mb-6 gap-4">
      <div class="md:w-1/2">
        <label class="block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
          {{$t('Client')}}
        </label>
        <el-input v-model="form.name" name="name"></el-input>
        <InputError :errors="$v.name.$errors"/>
      </div>
      <div class="md:w-1/2">

        <label class=" w-1/3 block text-gray-500 font-bold md:text-left mb-1 md:mb-0 pr-4" for="inline-full-name">
          {{$t('Email')}}
        </label>
        <el-input v-model="form.contact" name="contact"></el-input>
        <InputError :errors="$v.contact.$errors"/>
      </div>
    </div>
    <div class="mx-4 flex ">
        <el-button round color="#0F3B53" @click="submit">{{$t('Save')}}</el-button>
      <el-button round @click="emit('cancel')">{{$t('Cancel')}}</el-button>
    </div>
  </form>

</template>

<style scoped lang="scss">

</style>