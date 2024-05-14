<script setup>
import PrimaryButton from "./PrimaryButton.vue";
import {useForm} from "@inertiajs/vue3";
const props = defineProps(["origins","destinations"]);

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
  <div class="hidden-sm">{{ $t("title-banner") }}</div>
  <div class="hidden-md">{{ $t("title-banner-mobile") }}</div>
  <div class="subtitle">
    <div class="hidden-sm">{{ $t("title-banner-description")}}</div>
    <div class="hidden-md">{{ $t("title-banner-description-mobile")}}</div>

  </div>
  <div class="btn-more ">
    <div class="form flex flex-col w-56 mb-4">
      <el-autocomplete
          v-model="form.origin"
          :fetch-suggestions="querySearchAsyncOrigins"
          :placeholder="$t('inputOrigin')"


      >
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
    </div>
    <primary-button>
      <span class="link">{{$t("more")}}</span>
      <span><i><img class="w-3" src="/storage/icon/arrow-right.svg" alt="arrow"></i></span>
    </primary-button>
  </div>

</div>
</div>
</template>

<style lang="scss" scoped>
.circular {
  display: inline;
  height: 30px;
  width: 30px;
  animation: loading-rotate 2s linear infinite;
}
.path {
  animation: loading-dash 1.5s ease-in-out infinite;
  stroke-dasharray: 90, 150;
  stroke-dashoffset: 0;
  stroke-width: 2;
  stroke: var(--el-color-primary);
  stroke-linecap: round;
}
.loading-path .dot1 {
  transform: translate(3.75px, 3.75px);
  fill: var(--el-color-primary);
  animation: custom-spin-move 1s infinite linear alternate;
  opacity: 0.3;
}
.loading-path .dot2 {
  transform: translate(calc(100% - 3.75px), 3.75px);
  fill: var(--el-color-primary);
  animation: custom-spin-move 1s infinite linear alternate;
  opacity: 0.3;
  animation-delay: 0.4s;
}
.loading-path .dot3 {
  transform: translate(3.75px, calc(100% - 3.75px));
  fill: var(--el-color-primary);
  animation: custom-spin-move 1s infinite linear alternate;
  opacity: 0.3;
  animation-delay: 1.2s;
}
.loading-path .dot4 {
  transform: translate(calc(100% - 3.75px), calc(100% - 3.75px));
  fill: var(--el-color-primary);
  animation: custom-spin-move 1s infinite linear alternate;
  opacity: 0.3;
  animation-delay: 0.8s;
}
@keyframes loading-rotate {
  to {
    transform: rotate(360deg);
  }
}
@keyframes loading-dash {
  0% {
    stroke-dasharray: 1, 200;
    stroke-dashoffset: 0;
  }
  50% {
    stroke-dasharray: 90, 150;
    stroke-dashoffset: -40px;
  }
  100% {
    stroke-dasharray: 90, 150;
    stroke-dashoffset: -120px;
  }
}
@keyframes custom-spin-move {
  to {
    opacity: 1;
  }
}
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
  @media screen and (max-width: 768px) {
    background-image: url("/storage/bg/banner-mobile.svg") ;
    flex-flow: column;
    justify-content: start;
    justify-items: center;
    align-items: center;
    text-align: center;
    padding-left: 0;
    margin: 2rem 2rem;
    height:68rem;
    background-position: 50%;

  }
  .title{
    width: 36rem;
    font-size: 2.8125rem;
    font-weight: 600;
    line-height: 3.875rem;
    letter-spacing: 0;
    text-align: left;
    color: #EEF2F7;

    @media screen and (max-width: 768px) {
      font-size: 3rem;

      width: auto;
      padding: 2rem;
      line-height: 3rem;
      text-align: center;
    }


    .subtitle{
      margin-top: 1rem;
      font-size: 1.5625rem;
      font-weight: 400;
      line-height: 2.125rem;
      letter-spacing: 0;
      text-align: left;
      @media screen and (max-width: 768px) {
        width: auto;
        padding: 0.5rem;
        line-height: 1.875rem;
        text-align: center;
      }

    }
  }
  .btn-more {
    margin-top: 1rem;
    @media screen and (max-width: 768px) {
        display: flex;
       justify-items: center;
      justify-content: center;
    }
  }

}

</style>