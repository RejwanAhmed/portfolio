<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="props?.breadcrumbs">
        <!-- Add Project Button -->
        <div class = "text-end mb-3">
            <Link :href="route('blogs.create')" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <svg class="inline-flex w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
                Add Blog
            </Link>
        </div>

        <!-- Content Section -->
        <DataTable :items="blogs" :columns="columns" :search-keys="searchableKeys" class="mt-5">
            <template #row="{ item }">
                <!-- <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"><img height="100px" width="100px" :src="item?.cover_image_url" alt="Preview" class="w-12 h-12 object-cover rounded-md" /> </td> -->
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ item?.title }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 dark:text-white">{{ item?.excerpt?.substring(0, 50) }} {{ item?.excerpt?.length > 50 ? '...' : '' }}</td>
                <!-- <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ item?.is_featured }}</td>
                <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ item?.is_visible }}</td> -->
                <!-- Featured Toggle -->
                <td class="px-4 py-3 whitespace-nowrap">
                    <button
                        type="button"
                        @click="handleToggle(item, 'is_featured')"
                        :class="item.is_featured ? 'bg-indigo-600' : 'bg-gray-200'"
                        class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none"
                    >
                        <span
                            :class="item.is_featured ? 'translate-x-6' : 'translate-x-1'"
                            class="inline-block h-4 w-4 transform rounded-full bg-white shadow transition-transform duration-200"
                        />
                    </button>
                </td>
 
                <!-- Visible Toggle -->
                <td class="px-4 py-3 whitespace-nowrap">
                    <button
                        type="button"
                        @click="handleToggle(item, 'is_visible')"
                        :class="item.is_visible ? 'bg-indigo-600' : 'bg-gray-200'"
                        class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none"
                    >
                        <span
                            :class="item.is_visible ? 'translate-x-6' : 'translate-x-1'"
                            class="inline-block h-4 w-4 transform rounded-full bg-white shadow transition-transform duration-200"
                        />
                    </button>
                </td>
                <td class="px-4 py-3 space-x-2 whitespace-nowrap">
                    <EditButton :obj="item" redirectionRoute="blogs.edit"/>
                    <DeleteConfirmationButton :obj="item" confirmRoute="blogs.destroy"/>
                </td>
            </template>
        </DataTable>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Blog, BreadcrumbInterface } from '@/types/index';
import { Link, router } from '@inertiajs/vue3';
import DeleteConfirmationButton from '@/Components/Button/DeleteConfirmationButton.vue';
import EditButton from '@/Components/Button/EditButton.vue';
import DataTable from '@/Components/Table/DataTable.vue';

const props = defineProps<{
    blogs: Blog[],
    breadcrumbs: BreadcrumbInterface[],
    pageTitle: string,
}>();

const columns = [
    // { key: 'cover_image_url', label: 'Cover Image', sortable: false },
    { key: 'title', label: 'Title', sortable: true },
    { key: 'excerpt', label: 'Excerpt', sortable: true },
    { key: 'is_featured', label: 'Featured', sortable: true },
    { key: 'is_visible', label: 'Visible', sortable: true },
    { key: 'actions', label: 'Actions', sortable: false },
]

const searchableKeys = ['title', 'excerpt'];

const handleToggle = (item: Blog, field: 'is_featured' | 'is_visible') => {
    router.visit(route('blogs.toggle', item.id), {
        method: 'post',
        data: {field},
        replace: true,
        preserveScroll: true
    });
};
</script>