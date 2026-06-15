<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="props?.breadcrumbs">
        <!-- Add Project Button -->
        <div class = "text-end mb-3">
            <Link :href="route('skills.create')" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <svg class="inline-flex w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
                Add Skill
            </Link>
        </div>

        <!-- Content Section -->
        <DataTable :items="skills" :columns="columns" :search-keys="searchableKeys" class="mt-5">
            <template #row="{ item }">
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ item?.name }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><img height="100px" width="100px" :src="item?.image_url" alt="Preview" class="w-12 h-12 object-cover rounded-md" /> </td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ item?.proficiency_level }}</td>
                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><input type="color" :value="item?.color"></td>
                    <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                        <EditButton :obj="item" redirectionRoute="skills.edit"/>
                        <DeleteConfirmationButton :obj="item" confirmRoute="skills.destroy"/>
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
import DataTable from '@/Components/Table/DataTable.vue';

const props = defineProps({
    skills: Object as() => ISkill[] | undefined,
    breadcrumbs: Array as () => BreadcrumbInterface[],
    'pageTitle': String,
});

const columns = [
    { key: 'name', label: 'Name', sortable: true },
    { key: 'image', label: 'Image', sortable: false },
    { key: 'proficiency_level', label: 'Proficency Level', sortable: true },
    { key: 'color', label: 'color', sortable: false },
    { key: 'actions', label: 'Actions', sortable: false },
]

const searchableKeys = ['name', 'proficiency_level'];

interface ISkill {
    id: number,
    name: string,
    image_url: string,
    proficiency_level: string,
    color: string,
}
</script>