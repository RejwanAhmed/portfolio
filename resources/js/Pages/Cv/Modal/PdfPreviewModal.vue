<template>
    <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg overflow-hidden shadow-xl w-full max-w-4xl h-[90vh] relative">
            <div class="flex justify-between items-center p-4 bg-gray-100 border-b">
                <h3 class="text-lg font-semibold">PDF Preview</h3>
                <button @click="$emit('close')" class="text-gray-700 hover:text-red-500 text-xl">&times;</button>
            </div>
            <iframe :src="props?.pdfUrl" type="application/pdf" class="w-full h-full"></iframe>
        </div>
    </div>
</template>

<script setup lang="ts">
const props = defineProps({
    pdfUrl: String,
});

defineEmits(['close']);
</script>
