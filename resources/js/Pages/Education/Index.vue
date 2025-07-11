<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="props?.breadcrumbs">
        <!-- Add Education Button -->
        <div class = "text-end mb-3">
            <Link :href="route('educations.create')" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <svg class="inline-flex w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
                Add Education
            </Link>
        </div>

        <!-- Content Section -->
        <div  class="container mx-auto py-6" v-if="props?.educations.length > 0">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="education in props?.educations" class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:scale-105">
                    <div class="flex justify-between items-center mb-2">
                        <h2 class="text-xl font-semibold">{{ education.title }}</h2>
                        <div class="flex gap-2">
                            <EditButton :obj="education" redirectionRoute="educations.edit"/>
                            <DeleteConfirmationButton :obj="education" confirmRoute="educations.destroy"/>
                        </div>
                    </div>
                    <p class="text-gray-700 font-medium">{{ education.institution }}</p>
                    <p v-if="education.board" class="text-gray-500">Board: {{ education.board }}</p>
                    <p class="text-gray-600">Result: <span class="font-semibold">{{ education.result }}</span></p>
                    <p class="text-gray-600">
                    Duration: {{ education.start_year }} - {{ education.end_year }}
                    </p>
                    <p v-if="education.held_on_year" class="text-gray-500">Held On: {{ education.held_on_year }}</p>
                    <img v-if="education.logo" :src="education.logo" alt="Institution Logo" class="mt-4 w-16 h-16 ">
                </div>
            </div>
        </div>
        <div class="mt-5 text-gray-500" v-else>
            <p>No Data Found...</p>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';
import { Link } from '@inertiajs/vue3';
import DeleteConfirmationButton from '@/Components/Button/DeleteConfirmationButton.vue';
import EditButton from '@/Components/Button/EditButton.vue';

const props = defineProps({
    educations: Object as() => IEducation[] | undefined,
    breadcrumbs: Array as () => BreadcrumbInterface[],
    'pageTitle': String,
});

interface IEducation {
    id: number,
    serial_no: number,
    title: string,
    institution: string,
    logo: string,
    board: string,
    result: string,
    start_year: string,
    end_year: string,
    held_on_year: string,
}
</script>