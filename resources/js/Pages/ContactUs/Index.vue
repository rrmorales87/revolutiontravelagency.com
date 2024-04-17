<script setup>
import HomeLayout from "../../Layouts/HomeLayout.vue";
import {useForm, usePage} from "@inertiajs/vue3";
import {computed} from "vue";
import { helpers, required} from "@vuelidate/validators";
import {wTrans} from "laravel-vue-i18n";
import {useVuelidate} from "@vuelidate/core";
import {ElLoading} from "element-plus";
import Notifications from "../../Components/Notifications";
import axios from "axios";
import {Message,Cellphone} from "@element-plus/icons-vue";
const page = usePage();
const contact = useForm({
  name:"",
  email:"",
  message:""
})
const rules = computed(() => {
  return {
    email:{ required: helpers.withMessage(wTrans("requiredField"), required)},
    name:{required: helpers.withMessage(wTrans("requiredField"), required)},
    message:{required: helpers.withMessage(wTrans("requiredField"), required)}

  }

});
const $v = useVuelidate(rules, contact);
const sendMenssage = async () => {
  const valid = await $v.value.$validate();

  if(valid){
    const loading = ElLoading.service({
      text:wTrans("loading").value
    })

    axios.post(route('support_create'), contact.data()).then((response) => {
      contact.reset('name', 'email','message');
      loading.close();
      console.log(response);
      if(response.data.error){
        Notifications.open(response.data.message,"error");
      }else Notifications.open(response.data.message,"success");
    });
  }
}


</script>

<template>
<home-layout>
  <div class="contact rounded-2xl m-10 lg:p-8 md:p-8 sm:p-2 flex flex-col @apply font-Musticapro bg-gray-100">
    <div class="lg:ml-10 md:ml-28 sm:ml-2">
      <h1 class=" text-2xl my-6">{{ $t('contactUS') }}</h1>
      <div class="max-w-screen-sm">
        <label for="name" class="font-bold">{{$t("Name")}}</label>
        <el-input name="name" class="my-2" v-model="contact.name"/>

      </div>
      <div class="max-w-xs">
        <label for="email">{{$t("emailNumber")}}</label>
        <el-input name="email" class="my-2" v-model="contact.email"/>

      </div>
      <div class="max-w-screen-sm">
        <label for="message">{{$t("message")}}</label>
        <el-input name="message" class="my-2" :rows="4"    type="textarea" v-model="contact.message"/>

      </div>
      <div class="max-w-screen-sm my-6">
        <el-button class="rounded" color="#0F3B53" @click="sendMenssage">{{$t("send")}}</el-button>
      </div>

    </div>
    <div class="flex flex-row flex-wrap gap-4 text-subtitle">
      <div class="flex flex-row gap-2.5">
        <el-avatar shape="square" :size="80" src="storage/img/yo.png" />
        <div class="flex flex-col gap-2 ">
          <div>CEO Rolando Ramos Morales</div>
          <div class="flex  items-center gap-1">
            <el-icon><Message /></el-icon>
            <a href="mailto:rolandorm.ds@gmail.com">rolandorm.ds@gmail.com</a>
          </div>
          <div class="flex  items-center gap-1">
            <el-icon><Cellphone /></el-icon>
            <a href="mailto:rolandorm.ds@gmail.com">
              +5354185444
            </a>
          </div>
        </div>
      </div>
      <div class="flex flex-row gap-2.5">
        <el-avatar shape="square" :size="80" src="storage/img/maikel.png" />
        <div class="flex flex-col gap-2">
          <div>CEO Maikel Reyes Roche</div>
          <div class="flex  items-center gap-1">
            <el-icon><Message /></el-icon>
            <a href="mailto:revolutiontravel2023@gmail.com">revolutiontravel2023@gmail.com</a>
          </div>
          <div class="flex  items-center gap-1">
            <el-icon><Cellphone /></el-icon>
            <a href="mailto:rolandorm.ds@gmail.com">
              +5352426290
            </a>
          </div>
        </div>
      </div>


    </div>

  </div>
</home-layout>

</template>

<style scoped lang="scss">
@import "../../../css/mixin";
.contact {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 5rem;
  .text-subtitle {
    font-size: small;
    @include media(sm){
      font-size: xx-small;
    }
  }
  @include media(sm){
    padding: 14px 14px 14px 14px;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;

  }
}
</style>