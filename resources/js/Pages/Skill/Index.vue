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
                        <tr v-for="skill in skills" :key="skill.id">
                            <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ skill?.name }}</td>
                            <td>
                                <img height="100px" width="100px" :src="skill.image_url" alt="Preview" class="w-12 h-12 object-cover rounded-md" />  
                            </td>
                            <td>{{ skill?.proficiency_level }}</td>
                            <td class = "space-x-2">
                                <EditButton :obj="skill" redirectionRoute="skills.edit"/>
                                <DeleteConfirmationButton :obj="skill" confirmRoute="skills.destroy"/>
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
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';
import { Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import { DataTable } from 'simple-datatables';
import DeleteConfirmationButton from '@/Components/Button/DeleteConfirmationButton.vue';
import EditButton from '@/Components/Button/EditButton.vue';
import ColumnName from '@/Components/Table/ColumnName.vue';

const props = defineProps({
    skills: Object as() => ISkill[] | undefined,
    breadcrumbs: Array as () => BreadcrumbInterface[],
    'pageTitle': String,
});

onMounted(() => {
    new DataTable("#default-table", {
        searchable: true,
        sortable: true,
        header: true,
    });
});

const columnNames = [
    'name',
    'image',
    'proficency level',
]

interface ISkill {
    id: number,
    name: string,
    image_url: string,
    proficiency_level: string,
}
</script>