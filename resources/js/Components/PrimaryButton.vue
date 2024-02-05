<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>
    <button :type="type" class="flex items-center justify-center justify-items-center gap-2 px-4 py-2 bg-white border
    border-transparent rounded-full font-semibold text-lg text-[#265873] tracking-widest hover:bg-gray-200 focus:bg-gray-700
    active:bg-gray-900
    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        <slot />
    </button>
</template>
