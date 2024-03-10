<script setup>
import HomeLayout from "../../Layouts/HomeLayout.vue";
import TermsUse from "../../Components/TermsUse.vue";
import {router} from "@inertiajs/vue3";

</script>

<template>

      <HomeLayout>
        <div class="min-h-screen  flex flex-col justify-center items-center bg-gray-100">
          <div class="card-form flex flex-col  justify-center items-center bg-white rounded-2xl p-4">
            <img class="w-28" src="/storage/icon/rtravel-Logo.svg" alt="">
            <div class="text-title mt-5 lg:w-3/4  md:w-3/4 sm:w-3/6">
              <span class="text-[#0084BD]">{{$t('Sign in')}}</span>
              <span>{{$t('and enjoy the full experience')}}</span>
            </div>
            <div  class="subtitle mt-8 w-2/4">
               {{$t('Keep track of your subscriptions and organize your trips faster')}}
            </div>
            <div class="form-login mt-8 w-3/4 ">
              <a href="/login/google" class="border rounded-full w-full flex flex-row justify-center items-center  p-2 gap-4">
                <img class="basis-2" src="/storage/icon/google_icon.webp" alt="google">
                <p class="btn-text">{{$t('Continue with Google')}}</p>
              </a>
              <a href="/signUp" class="border rounded-full w-full flex flex-row justify-center items-center  p-2 gap-4">
                <img src="/storage/icon/email.svg" alt="google">
                <p class="btn-text"> {{$t('Continue with email')}}</p>
              </a>

              <div class="mt-5 w-full">
                <el-divider>
                 <p class="no-account">{{$t('No account')}}</p>
                </el-divider>
              </div>
              <el-button round size="large" color="#0F3B53" class="w-full" @click="router.get('/signUp')">{{$t('join')}}</el-button>
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
    line-height: 20.4px;
    letter-spacing: 0;
    text-align: center;
    color: #0F3B53;

  }
  .form-login {
    display:flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 1rem;
    font-size: 0.6rem;
    .btn-text {
      @apply font-Lato;
      font-size: 0.7rem;
      font-weight: 600;
      line-height: 20px;
      letter-spacing: 0;
      text-align: center;
      color: #0F3B53;;
    }
    .el-button {
      :deep(span) {
        font-size: 0.7rem;
      }
    }
    .no-account {
      @apply font-Lato;
      font-size: 0.8rem;

    }

  }
}


</style>
