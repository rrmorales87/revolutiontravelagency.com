<script setup>
import HomeLayout from "../../Layouts/HomeLayout.vue";
import TermsUse from "../../Components/TermsUse.vue";
import { View, Hide } from '@element-plus/icons-vue'
import {ref} from "vue";
const view = ref(false);
const user = ref({
  email:'',
  name:'',
  lastName:"",
  password:''
})

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
              <span>{{$t('Join right now')}}</span>
            </div>

            <div class="form-login mt-8 w-3/4 gap-4">
              <el-row :gutter="10">
                <el-col :md="12">
                  <label for="name">{{$t('Name')}}</label>
                  <el-input size="large"  id="name" :placeholder="$t('Name')" type="text" v-model="user.name" input-style="border-radius:150px;"></el-input>
                </el-col>
                <el-col :md="12">
                  <label for="last_name">{{$t('Last name')}}</label>
                  <el-input size="large" id="last_name" :placeholder="$t('Last name')" type="text" v-model="user.lastName"></el-input>
                </el-col>
              </el-row>
              <div class="w-full">
                <label for="email">{{$t('Email address')}}</label>
                <el-input size="large" id="email" :placeholder="$t('Email')" type="text" v-model="user.email"></el-input>
              </div>
              <div class="w-full">
                <label for="password" class="mt-5">{{$t('Password')}}</label>
                <el-input  size="large" id="password" :placeholder="$t('Password')"
                          :type="view ? 'text':'password'" v-model="user.password">
                  <template #append>
                    <el-button v-if="!view" :icon="View" @click="setViewPassword()" />
                    <el-button v-if="view" :icon="Hide" @click="setViewPassword()" />
                  </template>
                </el-input>
              </div>
              <el-button round size="large" color="#0F3B53" class="w-full mt-5">{{$t('Sign up')}}</el-button>
              <div class="mt-2 w-full">
                <el-divider>
                  <p class="no-account">{{$t('Already registered?')}}</p>
                </el-divider>
              </div>
              <div class="no-account mt-2 w-full text-center">

                  <span><a href="/login" class="underline font-bold">{{$t('Sign in')}}</a></span>
                  <span>{{$t('with your RTravel account')}}</span>

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
