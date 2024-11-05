<template>
    <div v-if="errorMessage">
        <p class="text-sm text-red-600 mt-1">
            {{ errorMessage }}
        </p>
    </div>
</template>

<script setup>
const props = defineProps({
    errorMessage: String
});
</script>