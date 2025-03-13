<script setup>
import HomeLayout from "../../Layouts/HomeLayout.vue";
import { HomeIcon, MapPinIcon, PlusCircleIcon, MinusCircleIcon } from '@heroicons/vue/24/outline';
import { CheckCircleIcon, XCircleIcon } from '@heroicons/vue/24/solid';
import {computed, ref, onMounted} from "vue";
import {helpers, required} from "@vuelidate/validators";
import {wTrans} from "laravel-vue-i18n";
import {useVuelidate} from "@vuelidate/core";
import Notifications from "../../Components/Notifications";
import InputError from "../../Components/InputError.vue";
import {router, usePage} from '@inertiajs/vue3';
import moment from 'moment';
import 'moment/locale/es';

import FormatCurrency from "../../Components/FormatCurrency.vue";
import useFilterStatus from "./common/useFilterStatus";
import useFormReservation from "./common/useFormReservation";
const props = defineProps(['origin','destiny','origins','destinations','reservations']);
const page = usePage();
const locale = computed(()=>page.props.locale);
const user = computed(()=>page.props.auth.user);
const tableData = computed(()=> props.reservations.data);
const { form, resetForm,querySearchAsyncAutoCompleteOrigin, querySearchAsyncAutoCompleteDestinations } = useFormReservation(props.origins.data,props.destinations.data);
const formTravel = ref(form);

let timeout;

const rules = computed(() => {
  return {
    origin:{required: helpers.withMessage(wTrans("requiredField"), required)},
    destiny:{required: helpers.withMessage(wTrans("requiredField"), required)},
    date:{required: helpers.withMessage(wTrans("requiredField"), required)},
    time:{required: helpers.withMessage(wTrans("requiredField"), required)},
    travellers:{required: helpers.withMessage(wTrans("requiredField"), required)},
    name:{required: helpers.withMessage(wTrans("requiredField"), required)},
    contact:{required: helpers.withMessage(wTrans("requiredField"), required)}
  }

});
const $v = useVuelidate(rules, formTravel.value,{ $lazy: true });
const submit = async () => {
  const valid = await $v.value.$validate();
  if(valid){
    formTravel.value.status = 'draft';
    //formTravel.value.time = moment(formTravel.value.time,"HH:mm:ss").format('HH:mm:ss');
    router.post(route('reservations.store'),formTravel.value);
  }else {
    Notifications.open(wTrans("errorField").value,'error');
  }
}

const confirmReservations = async () => {
 
     router.post(route('reservations.confirm'),{id:formTravel.value.id},{
      onSuccess:(page)=> {
       
        Notifications.open(wTrans('success_confirm').value,'success');
        resetForm();
      },
      onError:(page)=> Notifications.open(wTrans('error_confirm').value,'error')
    });
  
}

//MAP
/*const initMap = async () => {
 return await  L.map('map').setView([22.004, -76.707], 6);
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map.value);
  
}*/
onMounted(async()=>{
  //await initMap();
  moment().locale(locale.value);
  console.log("Reservations",props.reservations)
  if(props.origin) formTravel.value.origin = props.origin.data.name;
  if(props.destiny) formTravel.value.destiny = props.destiny.data.name;

})
const selectReservations = (row,column,event) => {
  console.log("Slelect table row",row);
  formTravel.value = {
    origin: row.origin.name,
    destiny: row.destiny.name,
    date: moment(row.date,"YYYY-MM-DD").format('YYYY-MM-DD'),
    time: moment(row.time,"HH:mm:ss").format('HH:mm:ss'),
    travellers:row.travellers,
    name:row.client.name,
    contact:row.client.contact,
    status:row.status,
    totalAmount:row.totalAmount,
    tax: row.tax,
    time_end:moment(row.time_end,"HH:mm:ss").toISOString(),
    id:row.id


  }
}
const {filterStatus,filterStatusHandler} = useFilterStatus();
</script>
<template>
  <HomeLayout>
   <div class="content py-5">
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
                             :fetch-suggestions="querySearchAsyncAutoCompleteOrigin"
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
                           :fetch-suggestions="querySearchAsyncAutoCompleteDestinations"
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
            <label for="time">{{$t('date') }}:</label>
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
            <label for="time">{{$t('hours') }}:</label>
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
          <label for="travellers">{{ $t('totalTravelers') }}:</label>
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
        <div class="py-3 flex items-center text-sm  before:flex-1 before:border-t before:border-gray-400 before:me-6 after:flex-1 after:border-t after:border-gray-400 after:ms-6 dark:text-[#0F3B53] dark:before:border-neutral-600 dark:after:border-neutral-600">Datos de contacto</div>
        <div class="w-auto flex-col">
          <label for="name">{{$t('whoIs') }}:</label>
          <el-input :placeholder="$t('whoIs')" name="name" v-model="formTravel.name" />
          <InputError :errors="$v.name.$errors"/>
        </div>
        <div class="w-auto flex-col">
          <label for="contact">{{$t('contactTravel') }}:</label>
          <el-input :placeholder="$t('contactTravel')" name="contact" v-model="formTravel.contact"/>
          <InputError class="mt-0" :errors="$v.contact.$errors"/>
        </div>
        <el-button v-if="formTravel.status ===''" round color="#0F3B53" @click="submit">{{  $t('request')   }}</el-button>
        <el-button v-if="formTravel.status ==='approved'" round color="#0F3B53" @click="confirmReservations">{{  $t('Confirm')   }}</el-button>
        <el-button v-if="formTravel.status !==''" round color="#0F3B53" @click="resetForm">{{  $t('newRequest')   }}</el-button>
           <p class="@apply font-Lato text-xs text-center mx-6 w-80">
              {{$t('formTravelTerm')}}
           </p>


      </div>

    </div>
     <div class="detail">
       <h1 class="text-3xl font-Musticapro mb-5">{{ $t('yourTravel') }}</h1>
       <div class="detail-content">
<!--          <div class="map w-1/4">
            <div class="w-full  border-2" id="map" style="height:300px"></div>
          </div>-->
          <div class="detail-ticket w-full font-Musticapro" v-if="formTravel">
              <div class="flex item-center border-b-2 py-2" >
                <img class="w-8" src="/storage/icon/location.svg" alt="location" >
                <div class="text-3xl text-[#265873] "
                 >
                 {{ formTravel.origin }}-{{ formTravel.destiny }}
                </div>
              </div>
              <div class="flex item-center border-b-2 py-4">
                  <div class="columns-3 w-full">
                      <div class="flex-col" v-if="formTravel.totalAmount">
                         <div class="text-xs uppercase font-Lato">{{ $t("totalAmount") }}</div>
                         <div class="text-3xl"  >
                          <FormatCurrency  :balance="formTravel.totalAmount" :locale="locale"/>
                          
                        </div>
                      </div>
                      <div class="flex-col" >
                        <div class="text-xs uppercase font-Lato">{{ $t("feeTrip") }}</div>
                         <div class="text-md">---</div>
                      </div>
                      <div class="flex-col" v-if="formTravel.tax">
                        <div class="text-xs uppercase font-Lato">{{ $t("taxes") }}</div>
                         <div class="text-md">
                          <FormatCurrency  :balance="formTravel.tax" :locale="locale"/>
                         </div>
                      </div>
                  </div>
                  
              </div>
              <div class="flex item-center border-b-2 py-4">
                  <div class="columns-3 w-full">
                      <div class="flex-col" v-if="formTravel.name">
                         <div class="text-xs uppercase font-Lato">{{ $t("accredited") }}</div>
                         <div class="text-md">{{ formTravel.name }}</div>
                      </div>                     
                      <div class="flex-col" v-if="formTravel.travellers">
                        <div class="text-xs uppercase font-Lato">{{ $t("numbersPeople") }}</div>
                         <div class="text-md">{{ formTravel.travellers }}</div>
                      </div>
                      <div class="flex-col" v-if="formTravel.contact">
                        <div class="text-xs uppercase font-Lato">{{ $t("sendProof") }}</div>
                         <div class="text-md">{{ formTravel.contact }}</div>
                      </div>
                  </div>
                  
              </div>
              <div class="flex item-center border-b-2 py-4">
                  <div class="columns-3 w-full">
                      <div class="flex-col" v-if="formTravel.date">
                         <div class="text-xs uppercase font-Lato">{{ $t("date") }}</div>
                         <div class="text-md">
                          {{ moment().locale(locale.value) &&  moment(formTravel.date,"YYYY-MM-DD").format('LL') }}
                         </div>
                      </div>
                      <div class="flex-col" v-if="formTravel.time">
                        <div class="text-xs uppercase font-Lato">{{ $t("travelTime") }}</div>
                         <div class="text-md">{{ moment(formTravel.time,"HH:mm:ss").format('LT') }}</div>
                      </div>
                      <div class="flex-col" v-if="formTravel.time_end">
                        <div class="text-xs uppercase font-Lato">{{ $t("checkin") }}</div>
                         <div class="text-md">{{ moment(formTravel.time_end,"HH:mm:ss").format('LT') }}</div>
                      </div>
                      
                  </div>
                  
              </div>
              <div class="flex item-center border-b-2 py-4">
                  <div class="columns-1 w-full">
                    
                      <div class="flex-col" v-if="formTravel.status">
                        <div class="text-xs uppercase font-Lato">{{ $t("Status") }}</div>
                         <div class="text-md">{{$t(`${formTravel.status.charAt(0).toLocaleUpperCase() + formTravel.status.slice(1) }`) }}</div>
                      </div>
                  </div>
                  
              </div>
          </div>
       </div>
       <div class="records">
          <h1 class="text-3xl font-Musticapro mb-5">{{ $t('history') }}</h1>
          
            <el-table :data="tableData" :default-sort="{ prop: 'date', order: 'descending' }" stripe style="width: 100%" table-layout="fixed" @row-click="selectReservations">
              <el-table-column  prop="date" sortable :label="$t('date')" min-width="40" >
                <template #default="scope">
                  {{ !scope.row.date? '':  moment(scope.row.date,"YYYY-MM-DD").format('LL') }}
                </template>
              </el-table-column>
              <el-table-column prop="client.name" :label="$t('Name')" />
              <el-table-column prop="slug" label="ID"   min-width="30">
                <template #default="scope">
                  <div class="uppercase">
                    {{ scope.row.slug }}         
                  </div>
                          
                </template>
              </el-table-column>
              <el-table-column  :label="$t('route')" min-width="180">
                <template #default="scope">
                  <div>
                    {{ scope.row.origin.name+"-"+scope.row.destiny.name}}         
                  </div>
                          
                </template>
              </el-table-column>
              <el-table-column prop="price" :label="$t('Price')"  min-width="30">
                <template #default="scope">
                   <FormatCurrency :balance="scope.row.totalAmount" :locale="locale"/>                        
                </template>
              </el-table-column>
              <el-table-column   min-width="20"  fixed="right"
                                 :label="$t('Status')"
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
            </el-table>
         
      </div>
    </div>
   
   </div>
  </HomeLayout>
</template>

<style scoped lang="scss">
@import "../../../css/mixin";
.el-input-number--large {
  width: 100% !important;
}

.content {
  display: flex;
  flex-direction: row;
  flex-flow: nowrap;
  padding: 10px;
  margin: 10px;
  width: 98vw;
  gap: 40px;
  .card-form-travel {
    width: calc(96%/6);
    @include media(sm) {
      width: 100vw;
    }
    .form {

      .row {
        display: flex;


        @include media(sm) {
          flex-flow: column;
        }
      }
    }

  }
  @include media(sm) {
    flex-flow: wrap;
  }

  .detail {
    width: 100%;
    
      &-content {
      display: flex;
      flex-flow: nowrap;
      flex-direction: row;
      gap:1.2rem;
      @include media(sm) {
        flex-flow: wrap;
        gap: 0;
      }
    }
    &-ticket {
      display: flex;
      flex-direction: column;
    }
  }
  .records {
    margin-top: 2rem;
  }
   
}
</style>