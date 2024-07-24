<script setup>
import AdminLayout from "../../../Layouts/AdminLayout.vue";
import AdminHeaderContent from "../../../Components/AdminHeaderContent.vue";
import {HomeIcon, MapPinIcon, MinusCircleIcon, PlusCircleIcon} from "@heroicons/vue/24/outline";
import InputError from "../../../Components/InputError.vue";
import {usePage} from "@inertiajs/vue3";
import {computed, ref} from "vue";
import moment from "moment/moment";
const props = defineProps(['origin','destiny','origins','destinations','reservations']);
const page = usePage();
const locale = computed(()=>page.props.locale);
const user = computed(()=>page.props.auth.user);
const formTravel = ref({
  origin: props.origin ? props.origin.data.name : '',
  destiny: props.destiny ? props.destiny.data.name : '',
  date:moment().format("YYYY-MM-DD"),
  time:moment().format("HH:mm:ss"),
  travellers:1,
  name:user.value.name,
  contact:user.value.email,
  status:""
})
</script>

<template>
  <AdminLayout>
    <div class="w-full overflow-x-auto">
      <AdminHeaderContent :title="$t('Reservations')"/>
      <div
          class="card-form-travel  shadow-md p-5 flex flex-col flex-nowrap min-w-min  rounded-xl bg-[#EDF2F8] @appply font-Musticapro"
      >
        <h1 class="text-[#0F3B53] text-2xl text-center">{{$t('requestTitle')}}</h1>
        <div class="form flex flex-col justify-center mt-5 gap-4">

          <div class="w-auto flex-col">
            <el-autocomplete :placeholder="$t('originRequest')"
                             name="origin"
                             size="large"
                             v-model="formTravel.origin"
                             :fetch-suggestions="querySearchAsyncOrigins"
            >
              <template #suffix>
                <el-icon class="el-input__icon" >
                  <HomeIcon/>
                </el-icon>
              </template>
            </el-autocomplete>
            <InputError :errors="$v.origin.$errors"/>
          </div>


          <div class="w-auto flex-col">
            <el-autocomplete :placeholder="$t('destinyRequest')"
                             name="destiny"
                             size="large"
                             v-model="formTravel.destiny"
                             :fetch-suggestions="querySearchAsyncDestinations"
            >
              <template #suffix>
                <el-icon class="el-input__icon" >
                  <MapPinIcon/>
                </el-icon>
              </template>

            </el-autocomplete>
            <InputError :errors="$v.destiny.$errors"/>
          </div>
          <div class="row gap-4">
            <div class="w-auto flex-col">
              <el-date-picker
                  v-model="formTravel.date"
                  name="date"
                  type="date"
                  :placeholder="$t('date')"
                  size="large"
                  format="DD/MM/YYYY"
                  value-format='YYYY-MM-DD'

              />
              <InputError :errors="$v.date.$errors"/>
            </div>

            <div class="w-auto flex-col">
              <el-time-picker
                  v-model="formTravel.time"
                  arrow-control
                  :placeholder="$t('hours')"
                  size="large"
                  name="time"
                  format="HH:mm:ss"
                  value-format="HH:mm:ss"

              />
              <InputError :errors="$v.time.$errors"/>
            </div>

          </div>

          <div class="w-auto flex-col">
            <el-input-number name="travellers"  v-model="formTravel.travellers" :min="1" size="large" :placeholder="$t('totalTravelers')" class="w-fit">
              <template #decrease-icon>

                <MinusCircleIcon class=" text-[#265873] rounded-l w-8" />



              </template>
              <template #increase-icon >

                <PlusCircleIcon class=" text-[#265873] rounded-r w-8"/>



              </template>
            </el-input-number>
            <InputError :errors="$v.travellers.$errors"/>
          </div>
          <div class="py-3 flex items-center text-sm text-gray-800 before:flex-1 before:border-t before:border-gray-400 before:me-6 after:flex-1 after:border-t after:border-gray-400 after:ms-6 dark:text-white dark:before:border-neutral-600 dark:after:border-neutral-600">Datos de contacto</div>
          <div class="w-auto flex-col">
            <el-input :placeholder="$t('whoIs')" name="name" v-model="formTravel.name" />
            <InputError :errors="$v.name.$errors"/>
          </div>
          <div class="w-auto flex-col">
            <el-input :placeholder="$t('contactTravel')" name="contact" v-model="formTravel.contact"/>
            <InputError class="mt-0" :errors="$v.contact.$errors"/>
          </div>
          <el-button v-if="formTravel.status ===''" round color="#0F3B53" @click="submit">{{  $t('request')   }}</el-button>
          <el-button v-if="formTravel.status ==='approve'" round color="#0F3B53" @click="confirmReservations">{{  $t('Confirm')   }}</el-button>
          <el-button v-if="formTravel.status !==''" round color="#0F3B53" @click="resetForm">{{  $t('newRequest')   }}</el-button>
          <p class="@apply font-Lato text-xs text-center mx-6 w-80">
            {{$t('formTravelTerm')}}
          </p>


        </div>

      </div>
    </div>
  </AdminLayout>
</template>

<style scoped lang="scss">

</style>