<template>{{format}}</template>
<script setup>
import { computed, defineProps } from "vue";
const props = defineProps(["balance", "locale", "currency"]);
const format = computed(() => {
  if (!props.balance) {
    return props.balance;
  }
 
  let language = props.locale==='es' ? 'es-ES':'en-US';
   
   var formatter = new Intl.NumberFormat(language, {
     
       minimumFractionDigits: 2, 
       style: 'currency',
       currency:'USD',
       maximumFractionDigits: 2,
       roundingIncrement: 5,
   });
  return formatter.format(props.balance);
  //return props.balance;
});
</script>