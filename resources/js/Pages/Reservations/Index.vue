<script setup>
import HomeLayout from "../../Layouts/HomeLayout.vue";
import { HomeIcon, MapPinIcon, PlusCircleIcon, MinusCircleIcon,BookmarkSquareIcon } from '@heroicons/vue/24/outline';
import {computed, ref, onMounted} from "vue";
import {helpers, required} from "@vuelidate/validators";
import {wTrans} from "laravel-vue-i18n";
import {useVuelidate} from "@vuelidate/core";
import Notifications from "../../Components/Notifications";
import InputError from "../../Components/InputError.vue";
import {router, usePage} from '@inertiajs/vue3'
const props = defineProps(['origin','destiny','origins','destinations']);
const page = usePage();
const user = computed(()=>page.props.auth.user);
const formTravel = ref({
  origin: props.origin ? props.origin.data.name : '',
  destiny: props.destiny ? props.destiny.data.name : '',
  date:new Date().toISOString(),
  time:new Date().getTime(),
  travellers:1,
  name:user.value.name,
  contact:user.value.email,
  status:"draft"
})
let timeout;
const querySearchAsyncOrigins = (queryString, cb) => {
  const results = queryString
      ? props.origins.data.filter(v=>v.name.toLowerCase().includes(queryString.toLowerCase())).map(v=>{
        return {value:v.name};})
      : props.origins.data.map(v=>{
            return {value:v.name};
          }

      );
  clearTimeout(timeout)
  timeout = setTimeout(() => {
    cb(results)
  }, 900 * Math.random())
}
const querySearchAsyncDestinations = (queryString, cb) => {
  const results = queryString
      ? props.destinations.data.filter(v=>v.name.toLowerCase().includes(queryString.toLowerCase())).map(v=>{
        return {value:v.name};})
      : props.destinations.data.map(v=>{
            return {value:v.name};
          }

      );

  clearTimeout(timeout)
  timeout = setTimeout(() => {
    cb(results)
  }, 900 * Math.random())
}
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
    router.post(route('reservations.store'),formTravel.value);
  }else {
    Notifications.open(wTrans("errorField").value,'error');
  }
}

//MAP
const initMap = async () => {
 return await  L.map('map').setView([22.004, -76.707], 6);
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map.value);
  
}
onMounted(async()=>{
  await initMap();
})

</script>
<template>
  <HomeLayout>
   <div class="content py-5">
    <div
        class=" card-form-travel shadow-md p-5 flex flex-col flex-nowrap min-w-fit justify-center rounded-xl bg-[#EDF2F8] @appply font-Musticapro"
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
                value-format="YYYY-MM-DD"

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

            />
            <InputError :errors="$v.time.$errors"/>
          </div>

        </div>

        <div class="w-auto flex-col">
          <el-input-number name="travellers"  v-model="formTravel.travellers" :min="1" size="large" :placeholder="$t('totalTravelers')" class="w-fit">
            <template #decrease-icon>

              <MinusCircleIcon class=" text-[#265873] rounded-l w-8"/>



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
        <el-button round color="#0F3B53" @click="submit">{{$t('request')}}</el-button>

           <p class="@apply font-Lato text-xs text-center mx-6 w-80">
              {{$t('formTravelTerm')}}
           </p>


      </div>

    </div>
     <div class="detail">
       <h1 class="text-3xl font-Musticapro mb-5">{{ $t('yourTravel') }}</h1>
       <div class="detail-content">
          <div class="map w-1/4">
            <div class="w-full  border-2" id="map" style="height:300px"></div>
          </div>
          <div class="detail-ticket w-full font-Musticapro">
              <div class="flex item-center border-b-2 py-2">
                <img class="w-8" src="/storage/icon/location.svg" alt="location" >
                <div class="text-3xl text-[#265873] ">La Habana-Varadero</div>
              </div>
              <div class="flex item-center border-b-2 py-4">
                  <div class="columns-3 w-full">
                      <div class="flex-col">
                         <div class="text-xs uppercase font-Lato">{{ $t("totalAmount") }}</div>
                         <div class="text-3xl">$1000</div>
                      </div>
                      <div class="flex-col">
                        <div class="text-xs uppercase font-Lato">{{ $t("feeTrip") }}</div>
                         <div class="text-md">$1000</div>
                      </div>
                      <div class="flex-col">
                        <div class="text-xs uppercase font-Lato">{{ $t("taxes") }}</div>
                         <div class="text-md">$1000</div>
                      </div>
                  </div>
                  
              </div>
              <div class="flex item-center border-b-2 py-4">
                  <div class="columns-3 w-full">
                      <div class="flex-col">
                         <div class="text-xs uppercase font-Lato">{{ $t("accredited") }}</div>
                         <div class="text-md">$1000</div>
                      </div>
                      <div class="flex-col">
                        <div class="text-xs uppercase font-Lato">{{ $t("numbersPeople") }}</div>
                         <div class="text-md">$1000</div>
                      </div>
                      <div class="flex-col">
                        <div class="text-xs uppercase font-Lato">{{ $t("sendProof") }}</div>
                         <div class="text-md">$1000</div>
                      </div>
                  </div>
                  
              </div>
              <div class="flex item-center border-b-2 py-4">
                  <div class="columns-3 w-full">
                      <div class="flex-col">
                         <div class="text-xs uppercase font-Lato">{{ $t("travelTime") }}</div>
                         <div class="text-md">$1000</div>
                      </div>
                      <div class="flex-col">
                        <div class="text-xs uppercase font-Lato">{{ $t("checkin") }}</div>
                         <div class="text-md">$1000</div>
                      </div>
                      <div class="flex-col">
                        <div class="text-xs uppercase font-Lato">{{ $t("checkin") }}</div>
                         <div class="text-md">$1000</div>
                      </div>
                  </div>
                  
              </div>
          </div>
       </div>
       <div class="records">
          <h1 class="text-3xl font-Musticapro mb-5">{{ $t('history') }}</h1>
          <div class="table-responsive">
            <el-table :data="tableData" style="width: 100%">
              <el-table-column prop="date" :label="$t('date')"  />
              <el-table-column prop="name" label="ID"  />
              <el-table-column prop="address" :label="$t('route')" />
              <el-table-column prop="address" :label="$t('Price')" />
            </el-table>
          </div>
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