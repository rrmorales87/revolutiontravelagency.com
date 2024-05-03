<script setup>
import {UploadFilled} from "@element-plus/icons-vue";
import {computed, ref} from "vue";
import { helpers, required} from "@vuelidate/validators";
import {wTrans} from "laravel-vue-i18n";
import {useVuelidate} from "@vuelidate/core";
const image = ref('');
const props = defineProps(['data']);
const rules = computed(() => {
  return {
    name:{ required: helpers.withMessage(wTrans("requiredField"), required)},
    likes:{required: helpers.withMessage(wTrans("requiredField"), required)},
    price:{required: helpers.withMessage(wTrans("requiredField"), required)}
  }
});
const $v = useVuelidate(rules, props.data);
</script>

<template>

<div class="card  flex justify-center  w-full">

    <form @submit.prevent="" class="form border rounded-2xl shadow-md m-5 p-5 gap-4 w-full">
      <div class="flex  lg:flex-nowrap sm:flex-wrap xs:flex-wrap gap-4 ">
        <div class="w-full">
          <label for="id-name">{{$t('Name')}}</label>
          <el-input id="id-name" name="name" v-model="props.data.name"/>
        </div>
        <div class="w-3/6  grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 xs:grid-cols-2">
          <div class=" flex flex-col">
            <label for="id-price">{{$t('Price')}}</label>
            <el-input-number
                id="id-price"
                name="price"
                controls-position="right"
                :precision="2"
                :step="0.1"
                v-model="props.data.price" />
          </div>
          <div class=" flex flex-col">
            <label for="id-likes">Likes</label>
            <el-input-number
                id="id-likes"
                name="likes"
                controls-position="right"
                :min="0"
                v-model="props.data.likes"
            />
          </div>
        </div>

      </div>

      <div class="w-full mt-5">
        <el-upload
            v-model="props.data.photo"
            class="upload-demo"
            drag
            :action="route('image.store')"
            method="POST"


        >
          <el-icon class="el-icon--upload"><UploadFilled /></el-icon>
          <div class="el-upload__text">
            Drop file here or <em>click to upload</em>
          </div>
          <template #tip>
            <div class="el-upload__tip">
              {{$t('limitImage')}}
            </div>
          </template>
        </el-upload>
      </div>
      <div class="float-right">
        <el-button round color="#0F3B53">
          {{$t('send')}}
        </el-button>
      </div>




    </form>


</div>
</template>

<style scoped lang="scss">

</style>