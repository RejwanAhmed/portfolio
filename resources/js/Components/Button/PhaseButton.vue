<template>
    <button @click="$emit('click')" class="text-indigo-600 hover:text-indigo-300 transition duration-200 ease-in-out text-[16px]" title="Phases">
        <i class="bi bi-clipboard-check"></i>
    </button>
</template>

<script setup>
defineEmits(['click'])
</script>