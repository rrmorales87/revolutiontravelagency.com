<script setup>
import HomeLayout from "../../Layouts/HomeLayout.vue";
import TermsUse from "../../Components/TermsUse.vue";
import { View, Hide } from '@element-plus/icons-vue'
import {ref} from "vue";
const view = ref(false);
const email = ref('');
const password = ref('');
const setViewPassword = () => {
  view.value = !view.value;
 }
</script>

<template>

      <HomeLayout>
        <div class="min-h-screen  flex flex-col justify-center items-center bg-gray-100">
          <div class="card-form flex flex-col  justify-center items-center bg-white rounded-2xl p-4">
            <img class="w-28" src="/storage/icon/rtravel-Logo.svg" alt="">
            <div class="text-title mt-5 lg:w-3/4  md:w-3/4 sm:w-3/6">
              <span>{{$t('Welcome back')}}</span>
            </div>

            <div class="form-login mt-8 w-3/4 ">
              <label for="email">{{$t('Email address')}}</label>
              <el-input id="email" :placeholder="$t('Email')" type="text" v-model="email"></el-input>
              <label for="password" class="mt-5">{{$t('Password')}}</label>
              <el-input id="password" :placeholder="$t('Password')"
                        :type="view ? 'text':'password'" v-model="password">
                <template #append>
                  <el-button v-if="!view" :icon="View" @click="setViewPassword()" />
                  <el-button v-if="view" :icon="Hide" @click="setViewPassword()" />
                </template>
              </el-input>
              <div class="forgot mt-5 underline">
                <a href="#">{{$t('Forgot your password?')}}</a>
              </div>


              <el-button round size="large" color="#0F3B53" class="w-full mt-5">{{$t('Sign in')}}</el-button>
              <div class="no-account mt-5 w-full text-center">

                  <span><a class="underline font-bold">{{$t('join')}}</a></span>
                  <span>{{$t('and unlock the full experience')}}</span>

              </div>
              <div class="mt-5">
                <terms-use />
              </div>

            </div>

          </div>

        </div>
      </HomeLayout>



</template>

<style scoped lang="scss">
.card-form {
  margin: 10px;
  @media screen and (max-width: 568px){
    padding: 20px;
  }
  .text-title {
    font-weight: 700;
    line-height: 55px;
    letter-spacing: 0;
    text-align: center;
    font-size: 1.8rem;

  }
  .subtitle {
    @apply font-Lato;
    font-size: 17px;
    font-weight: 400;
    line-height: 20px;
    letter-spacing: 0;
    text-align: center;
    color: #0F3B53;

  }
  .form-login {
    display:flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    font-size: 0.8rem;
    .forgot {
      align-self: start;
      @apply font-Lato;

    }
    label {
      align-self: start;
      font-weight: 700;
      @apply font-Lato;
      font-size: 0.95rem;
    }
    .el-button {
      :deep(span) {
        font-size: 0.7rem;
      }
    }
    .no-account {
      align-self: center;
      @apply font-Lato;
      font-size: 0.8rem;

    }

  }
}


</style>
