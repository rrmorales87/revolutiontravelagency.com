<script setup>
import {UploadFilled} from "@element-plus/icons-vue";
</script>

<template>
<div class="card  flex justify-center  w-full">
  <div class="form border rounded-2xl shadow-md m-5 p-5 gap-4 w-full">
    <div class="flex  lg:flex-nowrap sm:flex-wrap xs:flex-wrap gap-4 ">
      <div class="w-full">
        <label for="name">{{$t('Name')}}</label>
        <el-input  name="name"/>
      </div>
      <div class="w-3/6">
        <label for="price">{{$t('Price')}}</label>
        <el-input  name="price"/>
      </div>
      <div class="w-3/6">
        <label for="likes">Likes</label>
        <el-input  name="likes"/>
      </div>
    </div>

    <div class="w-full mt-5">
      <el-upload
          class="upload-demo"
          drag
          :action="route('image.store')"
          multiple
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



  </div>

</div>
</template>

<style scoped lang="scss">

</style>