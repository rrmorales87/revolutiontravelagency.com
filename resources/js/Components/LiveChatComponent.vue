<script setup>
import {getActiveLanguage} from "laravel-vue-i18n";
import {ref, onMounted, watch, computed} from "vue";
const src_en = 'https://tawk.to/chat/65e5ce3b9131ed19d974c793/1ho4qr6tt';
const src_es = 'https://tawk.to/chat/65e5ce3b9131ed19d974c793/1hq43401q';
const ulr_tawk = ref(getActiveLanguage())
let s1 = document.createElement("script");
let s0 = document.getElementsByTagName("script")[0];
const widget = (locale) => {
  console.log("Chnange locale",locale);
  s1.async=true;
  if(locale ==='es')
    s1.src=src_es;
  else s1.src=src_en;
  //m run devs1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);

}
onMounted(()=>{
  widget(ulr_tawk.value);
})

</script>

<template>

</template>

<style scoped lang="scss">

</style>