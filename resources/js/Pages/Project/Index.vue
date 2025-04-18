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
                        <tr v-for="project in projects" :key="project.id">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ project?.name }}</td>
                            <td>{{ project?.description?.substring(0, 15) }}{{ project?.description?.length > 15 ? '...' : '' }}</td>
                            <td>{{ project?.start_date }}</td>
                            <td>{{ project?.end_date }}</td>
                            <td>{{ project?.github_url }}</td>
                            <td>{{ project?.live_link_url }}</td>
                            <td class = "flex items-center space-x-2">
                                <EditButton :obj="project" redirectionRoute="projects.edit"/>
                                
                                <DeleteConfirmationButton :obj="project" confirmRoute="projects.destroy"/>
                                
                                <ImageUploadModal 
                                    :projectId = "project.id"
                                    :projectName = "project.name"
                                />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import { DataTable } from 'simple-datatables';
import DeleteConfirmationButton from '@/Components/Button/DeleteConfirmationButton.vue';
import EditButton from '@/Components/Button/EditButton.vue';
import ColumnName from '@/Components/Table/ColumnName.vue';
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';
import ImageUploadModal  from '@/Pages/Project/ImageUploadModal.vue';

const props = defineProps({
    projects: Object as() => IProject[] | undefined,
    breadcrumbs: Array as () => BreadcrumbInterface[],
    pageTitle: String,
})

onMounted(() => {
    // Initialize the DataTable when the component is mounted
    new DataTable("#default-table", {
        searchable: true,
        sortable: true,
        header: true,
    });
});

const columnNames = [
    'name',
    'description',
    'start_date',
    'end_date',
    'Github',
    'Live Link'
]

interface IProject {
    id: number,
    name: string,
    description: string,
    start_date: string,
    end_date: string,
    github_url?: string,
    live_link_url?: string
}
</script>
