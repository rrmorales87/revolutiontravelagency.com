<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="btn-format">
        <slot />
       <img src="/storage/icon/arrow-white.png" alt="arrow">
      
    </button>
</template>
<style lang="scss" scoped>
.btn-format{
  display: flex;
  justify-items: center;
  justify-content: center;
  align-items: center;
  background: #00B5C2;
  width:auto;
  padding-left: 15px;
  padding-right: 10px;
  height: 40px;
  border-radius:50px;
  color: white;
  font-family: Montserrat;
  font-size: 16px;
  font-weight: 600;
  line-height: 20px;
  letter-spacing: 0em;
  gap:10px;

}
.circle{
  border-radius:100px;
  background: white;
  width:30px;
  height:30px;
  font-size: 16px;
  font-weight: 600;
  line-height: 20px;
  letter-spacing: 0em;
  color: #00B5C2;
}
</style>
