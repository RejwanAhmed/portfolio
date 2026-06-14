<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="props?.breadcrumbs">
        <!-- Add Project Button -->
        <div class = "text-end mb-3">
            <Link :href="route('job-applications.create')" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <svg class="inline-flex w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
                Add Job Application
            </Link>
        </div>

        <!-- Content Section -->
        <DataTable :items="jobApplications" :columns="columns" :search-keys="searchableKeys" class="mt-5">
            <template #row="{ item }">
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ item?.company_name }}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ item?.title }}
                </td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ item?.application_date }}
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                    <span v-if="item?.status" :class="useStatusClass(item.status)" class="text-xs font-medium px-3 py-1 rounded-full capitalize">
                        {{ item.status }}
                    </span>
                </td>
                <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                    <ViewButton :obj="item" redirectionRoute="job-applications.show" />
                    <EditButton :obj="item" redirectionRoute="job-applications.edit" />
                    <DeleteConfirmationButton :obj="item" confirmRoute="job-applications.destroy" />
                </td>
            </template>
        </DataTable>

    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';
import { Link } from '@inertiajs/vue3';
import DeleteConfirmationButton from '@/Components/Button/DeleteConfirmationButton.vue';
import EditButton from '@/Components/Button/EditButton.vue';
import ViewButton from '@/Components/Button/ViewButton.vue';
import DataTable from '@/Components/Table/DataTable.vue';
import { useStatusClass } from '@/composables/useStatusClass'

const props = defineProps({
    jobApplications: Object as() => IJobApplication[] | undefined,
    breadcrumbs: Array as () => BreadcrumbInterface[],
    'pageTitle': String,
});

interface IJobApplication {
    id: number,
    company_name: string,
    title: string,
    application_date: string,
    status: string,
}

const columns = [
    { key: 'company_name', label: 'Company Name', sortable: true },
    { key: 'title', label: 'Job Title', sortable: true },
    { key: 'application_date', label: 'Application Date', sortable: true },
    { key: 'status', label: 'Status', sortable: true },
    { key: 'actions', label: 'Actions', sortable: false },
]

const searchableKeys = ['company_name', 'title', 'application_date', 'status'];
</script>