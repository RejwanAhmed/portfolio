<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="props?.breadcrumbs">
        <!-- Add Project Button -->
        <div class = "text-end mb-3">
            <Link :href="route('projects.create')" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <svg class="inline-flex w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
                Add Project
            </Link>
        </div>
        <!-- Content Section -->
        <DataTable :items="projects" :columns="columns" :search-keys="searchableKeys" class="mt-5">
            <template #row="{ item }">
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ item?.name }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ item?.description?.substring(0, 15) }}{{ item?.description?.length > 15 ? '...' : '' }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ item?.start_date }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ item?.end_date }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a v-if="item?.github_url" :href="item.github_url" target="_blank" class="text-indigo-600 hover:underline">
                            {{ item.github_url.substring(0, 20) }}...
                        </a>
                        <span v-else class="text-gray-400">—</span>
                    </td>

                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a v-if="item?.live_link_url" :href="item.live_link_url" target="_blank" class="text-indigo-600 hover:underline">
                            {{ item.live_link_url.substring(0, 20) }}...
                        </a>
                        <span v-else class="text-gray-400">—</span>
                    </td>
                    <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                        <EditButton :obj="item" redirectionRoute="projects.edit"/>
                        <DeleteConfirmationButton :obj="item" confirmRoute="projects.destroy"/>
                        <ImageUploadModal :projectId = "item.id" :projectName = "item.name"/>
                    </td>
            </template>
        </DataTable>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import DeleteConfirmationButton from '@/Components/Button/DeleteConfirmationButton.vue';
import EditButton from '@/Components/Button/EditButton.vue';
import ImageUploadModal  from '@/Pages/Project/ImageUploadModal.vue';
import DataTable from '@/Components/Table/DataTable.vue';
import { Project, BreadcrumbInterface } from '@/types/index';

const props = defineProps<{
    projects: Project[],
    breadcrumbs: BreadcrumbInterface[],
    pageTitle: string,
}>()

const columns = [
    { key: 'name', label: 'Name', sortable: true },
    { key: 'description', label: 'Description', sortable: true },
    { key: 'start_date', label: 'Start Date', sortable: true },
    { key: 'end_date', label: 'End Date', sortable: true },
    { key: 'github_url', label: 'Github', sortable: true },
    { key: 'live_link_url', label: 'Live Link', sortable: true },
    { key: 'actions', label: 'Actions', sortable: false },
]

const searchableKeys = ['name', 'description', 'start_date', 'end_date'];

</script>
