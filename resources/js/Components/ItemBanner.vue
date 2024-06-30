<script setup>
import PrimaryButton from "./PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";
const props = defineProps(["origins","destinations"]);
const emit = defineEmits(["request"]);
const form = useForm({
  origin:'',
  destiny:''
});
let timeout;
const querySearchAsyncDestinations = (queryString, cb) => {
  const results = queryString
      ? props.destinations.filter(v=>v.name.toLowerCase().includes(queryString.toLowerCase())).map(v=>{
        return {value:v.name};})
      : props.destinations.map(v=>{
            return {value:v.name};
      }

      );

  clearTimeout(timeout)
  timeout = setTimeout(() => {
    cb(results)
  }, 900 * Math.random())
}
const querySearchAsyncOrigins = (queryString, cb) => {
   const results = queryString
      ? props.origins.filter(v=>v.name.toLowerCase().includes(queryString.toLowerCase())).map(v=>{
        return {value:v.name};})
      : props.origins.map(v=>{
            return {value:v.name};
      }

      );

  clearTimeout(timeout)
  timeout = setTimeout(() => {
    cb(results)
  }, 900 * Math.random())
}

</script>
<template>
<div class="main ">
<div class="title">
  <div>{{ $t("title-banner") }}</div>
  <div class="subtitle">
    <div>{{ $t("title-banner-description")}}</div>
  </div>
  <div class=" flex flex-col p-2 ">
    <div class="form flex flex-col w-80">
      <el-autocomplete
          v-model="form.origin"
          :fetch-suggestions="querySearchAsyncOrigins"
          :placeholder="$t('inputOrigin')">
        <template #loading>
          <svg class="circular" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" />
          </svg>
        </template>
      </el-autocomplete>
      <el-autocomplete
          v-model="form.destiny"
          :fetch-suggestions="querySearchAsyncDestinations"
          :placeholder="$t('inputDestiny')"


      >
        <template #loading>
          <svg class="circular" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" />
          </svg>
        </template>
      </el-autocomplete>
      <div class=" mt-2 sm:self-center md:self-end">
        <primary-button @click="emit('request',{origin:form.origin,destiny:form.destiny})">
          <span class="link">{{$t("requestTravel")}}</span>
        </primary-button>
      </div>





    </div>

  </div>

</div>
</div>
</template>

<style lang="scss" scoped>
@import "../../css/mixin";
.main {
  height:500px;
  margin: 2rem 5rem;
  background-image: url("/storage/bg/Fondon.svg") ;
  background-repeat: no-repeat;
  background-size: cover;
  display: flex;

  justify-content: flex-start;
  align-items: center;
  padding-left: 10rem;
  border-radius: 50px;
  @include media(sm) {
    background-image: url("/storage/bg/banner-mobile.svg") ;
    flex-flow: column;
    justify-content: start;
    justify-items: center;
    align-items: center;
    text-align: center;
    padding-left: 0;
    margin: 0.5rem 0.5rem;
    height:40rem;
    width: 96%;
    background-position: 50% 50%;

  }
  .title{
    @apply font-Musticapro;
    width: 36rem;
    font-size: 2.8125rem;
    font-weight: 600;
    line-height: 3.875rem;
    letter-spacing: 0;
    text-align: left;
    color: #EEF2F7;

    @include media(sm)  {
      font-size: 1rem;
      width: auto;
      padding: 0.5rem;
      line-height: 3rem;
      text-align: center;
    }


    .subtitle{
      @apply font-Lato;
      padding: 15px 15px;
      font-size: 1.5625rem;
      font-weight: 400;
      line-height: 2.125rem;
      letter-spacing: 0;
      text-align: left;
      @include media(sm)  {
        width: auto;
        padding: 0.5rem;
        line-height: 1.875rem;
        text-align: center;
        font-size: 0.8rem;
      }

    }
  }
  .btn-more {
    margin-top: 1rem;

    @include media(sm) {
       margin-top: 0;
        display: flex;
       justify-items: center;
      justify-content: center;
    }
  }

}

</style>