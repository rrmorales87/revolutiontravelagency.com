<script setup>
import {computed} from "vue";
import {router, usePage} from '@inertiajs/vue3';
import SelectorLanguage from "./SelectorLanguage.vue";
import {Avatar, CloseBold, UserFilled, Message} from "@element-plus/icons-vue"
const gotToLogin = ()=> router.get('login');
const page = usePage();
const user = computed(()=>page.props.auth.user);
const isLogin = computed(()=>page.props.isLogin);
const logout = ()=> router.post(route("logout"));
const profile = ()=> router.get(route("profile.show"));
</script>

<template>
<div class="flex flex-col border-b-2 fixed left-0 right-0 top-0 z-50 bg-white shadow-2xl px-2">
  <div class="w-full flex flex-row justify-between items-center gap-4 py-4 lg:px-24 md:px-14 sm:px-5">
    <div class="hidden-sm flex flex-row flex-nowrap cursor-pointer " v-if="!isLogin" >
      <img class="icon-view" src="/storage/icon/subscripcion-icon.svg" alt="subscription logo">
      <span class="menu-text px-2">{{$t("subscription")}}</span>
    </div>
    <div class="flex flex-row flex-nowrap cursor-pointer " v-if="isLogin" >

        <div class="flex items-center gap-4">
          <el-dropdown >
          <el-avatar  class="border-4" :size="50" :icon="Avatar" :src="user.profile_photo_url"> </el-avatar>
            <template #dropdown>
              <el-dropdown-menu class="my-2 ">
                <el-dropdown-item @click="profile" >
                <span class="float-left mr-4">
                  <el-icon >
                        <UserFilled/>
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
          <div class="flex flex-col hidden-sm">
            <div class="name">{{user.name}}</div>
            <div class="email flex items-center gap-1">
              <el-icon >
                <Message/>
              </el-icon>
              {{user.email}}
            </div>
          </div>
        </div>





    </div>
    <div>
      <a :href="route('index')"><img class="icon-logo" src="/storage/icon/rtravel-Logo.svg" alt="main logo"></a>
    </div>
    <div class="flex flex-row gap-8 items-center ">
      <div class="hidden-sm  menu-text flex flex-row gap-8 cursor-pointer">
        <nav>
          <a :href="route('support')">{{$t('support')}}</a>
        </nav>
        <nav>
          <a :href="route('reservations')">{{$t('Reservations')}}</a>
        </nav>

      </div>
      <selector-language/>
      <button v-if="!isLogin" class="btn-circuit flex flex-row justify-center items-center px-4 py-2 rounded-full gap-2">
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
.name {
  @apply font-Musticapro;
  font-size: 18px;
  font-weight: 700;
  color: #0F3B53;


}
.email {
 @apply font-Lato;
  color: #265873;

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
    height: 1.4rem;
    width: 1.4rem;
  }

  &_text {

    font-size: 18px;
    font-weight: 600;
    line-height: 25px;
    letter-spacing: 0;
    text-align: left;
    @include media(sm) {
      font-size: 12px;
    }

  }
}

</style>