<script setup>
import {ref, watch} from "vue";
import {useStore} from "vuex";
const store = useStore();
const showLocale = ref('');

const formatLocale = (locale)=>{
  console.log("LOCALE",locale)
  if (!locale) return "";

  switch (locale){
    case 'en': return "EN-US";
    case 'es': return "ES-ES";
  }
}
watch(()=>store.state.locale,(newVal)=>{
  showLocale.value = newVal;
})
</script>

<template>
<footer class="footer">
  <div class="options">
    <div class="option w-4/12">
      <div class="option-h">
        {{$t('agency-name')}}
      </div>
      <p>
        {{$t("mission")}}
      </p>
    </div>
    <div class="option w-40">
      <div class="option-h">
        {{$t('Sitemap')}}
      </div>

        <ul class="option-ul">
          <li>
            {{$t('home')}}
          </li>
          <li>
            {{$t('circuits')}}
          </li> <li>
            {{$t('subscription')}}
          </li>
        </ul>

    </div>
    <div class="option w-40">
      <div class="option-h">
        {{$t('User')}}
      </div>

        <ul class="option-ul">
          <li>
            {{$t('Travel profile')}}
          </li>
          <li>
            {{$t('support')}}
          </li> <li>
            {{$t('contact')}}
          </li>
        </ul>

    </div>
    <div class="option w-40">
      <div class="option-h">
        {{$t('agency')}}
      </div>

        <ul class="option-ul">
          <li>
            {{$t('about us')}}
          </li>
          <li>
            {{$t('Terms of Use')}}
          </li> <li>
            {{$t('Privacy Policy')}}
          </li>
        </ul>

    </div>
  </div>
  <div class="fallow mt-10 border-b pb-5">
    <div class="icons">
        <h1>{{$t("fallow")}} {{$t("agency-name")}}</h1>
        <img src="/storage/icon/linkedin-icon.svg" alt="linkedin">
        <img src="/storage/icon/facebook.svg" alt="facebook">
        <img src="/storage/icon/instagram.svg" alt="instagram">
    </div>
    <div class="underline underline-offset-1">
        {{formatLocale(showLocale)}}
    </div>
  </div>
  <div class="copyright flex justify-center my-2">
    {{$t("copyright")}}
  </div>
</footer>
</template>

<style scoped lang="scss">
.footer {
  margin-top: 4rem;
  display: flex;
  flex-direction: column;
  padding: 2rem 5rem;
  background: #EEF2F7;
  color: black;
  .options {
    display: flex;
    justify-content: space-between;
    gap: 4rem;
    .option {
      display: flex;
      flex-direction: column;
      font-size: 16px;
      font-weight: 300;
      line-height: 24px;
      &-h {
        margin-bottom: 1rem;
        font-weight: 600;
      }
      &-ul {
        li {
          margin-bottom: 1rem;
        }
      }
    }
  }
  .fallow {
    display: flex;
    justify-content: space-between;
    font-size: 16px;
    font-weight: 300;
    .icons {
      display: flex;
      gap: 1rem;
      justify-content: flex-start;
    }
  }
  .copyright {
    font-size: 14px;
    font-weight: 300;
  }

}
</style>