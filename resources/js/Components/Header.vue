<script setup>
import {computed, ref} from "vue";
import {router, usePage} from '@inertiajs/vue3';
import SelectorLanguage from "./SelectorLanguage.vue";
import {Avatar, CloseBold} from "@element-plus/icons-vue"
const search = ref();
const gotToLogin = ()=> router.get('login');
const page = usePage();
const isLogin = computed(()=>page.props.isLogin);
const logout = ()=> router.post(route("logout"));
const profile = ()=> router.get(route("profile.show"));
</script>

<template>
<div class="flex flex-col">
  <div class="w-full flex flex-row justify-between items-center gap-4 py-4 lg:px-24 md:px-14 sm:px-5">
    <div class="hidden-sm flex flex-row flex-nowrap cursor-pointer " v-if="!isLogin" >
      <img class="icon-view" src="/storage/icon/subscripcion-icon.svg" alt="subscription logo">
      <span class="menu-text px-2">{{$t("subscription")}}</span>
    </div>
    <div class="flex flex-row flex-nowrap cursor-pointer " v-if="isLogin" >
      <el-dropdown >
        <el-image fit="cover" class="rounded-full  border-8"></el-image>
        <template #dropdown>
          <el-dropdown-menu class="my-2 ">
            <el-dropdown-item @click="profile" >
                <span class="float-left mr-4">
                  <el-icon >
                        <Avatar/>
                  </el-icon>

                </span>
              <span class="float-right">{{ $t("Profile") }}</span>
            </el-dropdown-item>
            <el-dropdown-item @click="logout" >
                <span class="float-left mr-4">
                  <el-icon>
                    <CloseBold/>
                  </el-icon>
                </span>
              <span class="float-right">{{ $t("exit") }}</span>
            </el-dropdown-item>

          </el-dropdown-menu>
        </template>
      </el-dropdown>

    </div>
    <div>
      <a href="/"><img class="icon-logo" src="/storage/icon/rtravel-Logo.svg" alt="main logo"></a>
    </div>
    <div class="flex flex-row gap-8 items-center ">
      <div class="hidden-sm  menu-text flex flex-row gap-8 cursor-pointer">
        <nav>{{$t('support')}}</nav>
        <nav>{{$t('community')}}</nav>

      </div>
      <selector-language/>
      <button v-if="!isLogin" class="btn-circuit flex flex-row justify-center items-center px-4 py-2 rounded-full">
         <img class="btn-circuit_icon" src="/storage/icon/circuit-icon.svg" alt="circuit-icon">
         <span class="btn-circuit_text" @click="gotToLogin">{{$t('Sign in')}}</span>
      </button>
    </div>

  </div>
<!--  <div class="flex flex-row justify-center items-center">-->
<!--    <h1 class="title-search">{{$t("title-search1")}} <span class="title-cuba"> Cuba </span>{{$t("title-search2")}}</h1>-->
<!--  </div>-->
</div>


</template>

<style  lang="scss">
@import "../../css/mixin";
.hidden-sm {
  @include media(sm) {
    display: none;
  }

}
.title-search {
  font-size: 2.5rem;
  font-weight: 600;
  line-height: 3.4375rem;
  letter-spacing: 0;
  text-align: left;
  color: #0F3B53;
  @include media(md) {
    padding-right: 2rem;
    padding-left: 2rem;
    font-size: 1.5rem;
    line-height: 2rem;
  }

  .title-cuba {
    color:#0084BD;
  }


}
.icon-view {
  width: 27px;
  height: 18.81px;
}
.icon-logo {
  width: 135px;
  height: 45px;

}
.menu-text {
  font-size: 18px;
  font-weight: 600;
  line-height: 25px;
  letter-spacing: 0;
  text-align: left;
  color: #0F3B53;


}
.btn-circuit {

  background: #EEF2F7;
  width: auto;

  &_icon {
    height: 1.68rem;
    width: 1.68rem;
  }

  &_text {

    font-size: 18px;
    font-weight: 600;
    line-height: 25px;
    letter-spacing: 0;
    text-align: left;

  }
}

</style>