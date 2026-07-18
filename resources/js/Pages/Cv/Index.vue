<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="props?.breadcrumbs">
        <!-- Add CV Button -->
        <div class = "text-end mb-3">
            <button @click="isOpenModal = true" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <svg class="inline-flex w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
                Add CV
            </button>
        </div>
        <!-- Content Section -->
        <div class="container mx-auto py-6" v-if="props?.cvs.length > 0">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="(cv, index) in props?.cvs" :key="cv.id"
                    class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:scale-105">

                    <!-- Title + Badge + Buttons -->
                    <div class="flex justify-between items-center mb-4">
                        <div class="flex items-center gap-2">
                            <h2 class="text-xl font-semibold">CV #{{ index + 1 }}</h2>
                            <span class="text-xs px-2 py-1 rounded-full font-medium"
                                :class="cv.status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'">
                                {{ cv.status ? 'Active' : 'Inactive' }}
                            </span>
                        </div>
                        <div class="flex gap-2">
                            <button class="text-green-700 hover:text-green-400 transition duration-200 ease-in-out text-[20px]"
                                title="View CV" @click="openPdfPreview(cv.path)">
                                <i class="bi bi-eye"></i>
                            </button>
                            <DeleteConfirmationButton :obj="cv" confirmRoute="cvs.destroy" />
                        </div>
                    </div>

                    <!-- Upload Date -->
                    <p class="text-gray-500 text-sm mb-4">
                        Upload Date: <span class="font-medium text-gray-700">{{ cv?.created_at?.substring(0, 10) }}</span>
                    </p>

                    <!-- Toggle Status -->
                    <div class="flex items-center gap-3">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" class="sr-only peer" :checked="cv?.status" @change="toggleStatus(cv.id)">
                            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </label>
                        <span class="text-sm text-gray-500">{{ cv.status ? 'Deactivate' : 'Activate' }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 text-gray-500" v-else>
            <p>No Data Found...</p>
        </div>

        <!-- Modal -->
        <AddCvModal v-if="isOpenModal" @submitSuccess="submitSuccess" />
        <PdfPreviewModal v-if="showPdfPreview" :pdfUrl="selectedCvPath" @close="showPdfPreview=false"></PdfPreviewModal>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';
import DeleteConfirmationButton from '@/Components/Button/DeleteConfirmationButton.vue';
import { Cv, BreadcrumbInterface, Flash } from '@/types/index';
import AddCvModal from '@/Pages/Cv/Modal/AddCvModal.vue';
import { router } from '@inertiajs/vue3';
import PdfPreviewModal from '@/Pages/Cv/Modal/PdfPreviewModal.vue';
import { showToast } from '@/Core/helpers/toast';
import type { Page } from '@inertiajs/core';

const props = defineProps<{
    cvs: Cv[],
    breadcrumbs: BreadcrumbInterface[],
    pageTitle: string,
}>();

const isOpenModal = ref<boolean>(false);
const showPdfPreview = ref<boolean>(false);
const selectedCvPath = ref<string>('');

const openPdfPreview = (path: string) => {
    showPdfPreview.value = true;
    selectedCvPath.value = path;
}

const toggleStatus = (id: number) => {
    router.patch(route('cvs.changeStatus', id), {}, {
        preserveScroll: true,
        onSuccess: (page: Page) => {
            const flash = page.props.flash as Flash;
            if (flash.success) {
                showToast('success', flash.success);
                flash.success = null;
            }
            router.reload({ only: ['cvs'] });
        },
    });
}

const submitSuccess = () => {
    isOpenModal.value = false;
    router.reload({ only: ['cvs'] });
}
</script>
