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
        <div class="overflow-hidden bg-white shadow-md sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <table id="default-table">
                    <thead>
                        <tr>
                            <ColumnName :columnNames="columnNames"/>
                            <th>
                                <span class="flex items-center">
                                    Action
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cv in cvs" :key="cv.id">
                            <td>{{ cv?.created_at?.substring(0, 10) }}</td>
                            <td>
                                <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer" :checked="cv?.status">
                                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                                </label>
                            </td>
                            <td class = "flex items-center space-x-2">
                                <button class="text-green-700 hover:text-green-300 transition duration-200 ease-in-out text-[16px]" title="View CV">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <button class="text-blue-700 hover:text-blue-300 transition duration-200 ease-in-out text-[16px]" title="Download CV">
                                    <i class="bi bi-download"></i>
                                </button>
                                <DeleteConfirmationButton :obj="cv" confirmRoute="cvs.destroy"/>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <AddCvModal v-if="isOpenModal" @close="isOpenModal = false"/>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { onMounted, ref } from 'vue';
import { DataTable } from 'simple-datatables';
import DeleteConfirmationButton from '@/Components/Button/DeleteConfirmationButton.vue';
import ColumnName from '@/Components/Table/ColumnName.vue';
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';
import AddCvModal from '@/Pages/Cv/Modal/AddCvModal.vue';

const props = defineProps({
    cvs: Object as() => ICv[] | undefined,
    breadcrumbs: Array as () => BreadcrumbInterface[],
    pageTitle: String,
})

const isOpenModal = ref(false);

onMounted(() => {
    // Initialize the DataTable when the component is mounted
    new DataTable("#default-table", {
        searchable: true,
        sortable: true,
        header: true,
    });
});

const columnNames = [
    'Upload Date',
    'Status'
]

interface ICv {
    id: number,
    created_at: string,
    status: boolean
}
</script>
