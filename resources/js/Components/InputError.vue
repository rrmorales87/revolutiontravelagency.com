<script setup>
defineProps({
    errors: Array,
});
</script>

<template>
    <div v-if="errors && errors.length>0" v-for="error in errors" :key="error.$uid">
        <p class="text-sm text-red-600">
            {{ error.$message }}
        </p>
    </div>
</template>
