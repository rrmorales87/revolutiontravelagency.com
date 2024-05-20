<script setup>
import HomeLayout from "../../Layouts/HomeLayout.vue";
import { HomeIcon, MapPinIcon, PlusCircleIcon, MinusCircleIcon } from '@heroicons/vue/24/outline';
</script>

<template>
  <HomeLayout>
   <div class="content py-5">
    <div
        class="card-form-travel shadow-md p-5 flex flex-col flex-nowrap min-w-fit justify-center rounded-xl bg-[#EDF2F8] @appply font-Musticapro"
    >
        <h1 class="text-[#0F3B53] text-2xl text-center">Solicitud de viaje</h1>
      <div class="form flex flex-col justify-center mt-5 gap-4">
        <el-autocomplete placeholder="Donde te recogemos"  size="large">
          <template #suffix>
            <el-icon class="el-input__icon" >
              <HomeIcon/>
            </el-icon>
          </template>
        </el-autocomplete>
        <el-autocomplete placeholder="Hacia donde te llevamos"  size="large">
          <template #suffix>
            <el-icon class="el-input__icon" >
              <MapPinIcon/>
            </el-icon>
          </template>

        </el-autocomplete>
        <div class="row gap-4">
          <el-date-picker
              v-model="value1"
              type="date"
              placeholder="Pick a day"
              size="large"

          />


          <el-time-picker
              v-model="value2"
              arrow-control
              placeholder="Arbitrary time"
              size="large"

          />
        </div>
        <el-input-number  v-model="num1" min="1" size="large" placeholder="Cantidad de personas" class="w-fit">
          <template #decrease-icon>

              <MinusCircleIcon class=" text-[#265873] rounded-l w-8"/>



          </template>
          <template #increase-icon >

                <PlusCircleIcon class=" text-[#265873] rounded-r w-8"/>



          </template>
        </el-input-number>
        <div class="py-3 flex items-center text-sm text-gray-800 before:flex-1 before:border-t before:border-gray-400 before:me-6 after:flex-1 after:border-t after:border-gray-400 after:ms-6 dark:text-white dark:before:border-neutral-600 dark:after:border-neutral-600">Datos de contacto</div>
        <el-input placeholder="Para quien es la solicitud"/>
        <el-input placeholder="Numero o correo electronico"/>
        <el-button round color="#0F3B53">Solicitar</el-button>

      </div>

    </div>
     <div class="detail">
     DEtalle
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
  width: 100vw;
  .card-form-travel {
    width: calc(100vw / 4);
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
}
</style>