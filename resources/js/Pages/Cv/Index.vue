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
                <div v-for="(cv, index) in props?.cvs" :key="cv.id" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:scale-105 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-center mb-2">
                        
                            <h2 class="text-xl font-semibold">CV #{{ index + 1 }}</h2>
                            <div class="flex gap-2">
                                <!-- View Button -->
                                <button class="text-green-700 hover:text-green-300 transition duration-200 ease-in-out text-[20px]" title="View CV">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <!-- Download Button -->
                                <button class="text-blue-700 hover:text-blue-300 transition duration-200 ease-in-out text-[20px]" title="Download CV">
                                    <i class="bi bi-download"></i>
                                </button>

                                <!-- Delete Button -->
                                <DeleteConfirmationButton :obj="cv" confirmRoute="cvs.destroy" />
                            </div>
                        </div>

                        <p class="text-gray-700 font-medium mb-1">
                            Upload Date: {{ cv?.created_at?.substring(0, 10) }}
                        </p>

                        <p :class="cv.status ? 'text-green-600' : 'text-red-600'">
                            Status: {{ cv.status ? 'Active' : 'Inactive' }}
                        </p>
                    </div>

                    <!-- Toggle Status Button -->
                    <label class="inline-flex items-center cursor-pointer mt-4">
                        <input type="checkbox" class="sr-only peer" :checked="cv?.status">
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                    </label>
                </div>
            </div>
        </div>
        <div class="mt-5 text-gray-500" v-else>
            <p>No Data Found...</p>
        </div>

        <!-- Modal -->
        <AddCvModal v-if="isOpenModal" @submitSuccess="submitSuccess" />
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { ref } from 'vue';
import DeleteConfirmationButton from '@/Components/Button/DeleteConfirmationButton.vue';
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';
import AddCvModal from '@/Pages/Cv/Modal/AddCvModal.vue';
import { router } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    cvs: Object as () => ICv[] | undefined,
    breadcrumbs: Array as () => BreadcrumbInterface[],
    pageTitle: String,
})

const isOpenModal = ref(false);

interface ICv {
    id: number,
    created_at: string,
    status: boolean
    path: string,
}

const submitSuccess = () => {
    isOpenModal.value = false;
    router.reload({ only: ['cvs'] });
}
</script>
