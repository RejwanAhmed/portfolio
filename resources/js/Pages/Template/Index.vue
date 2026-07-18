<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="props?.breadcrumbs">
        <!-- Add Education Button -->
        <div class = "text-end mb-3">
            <Link :href="route('templates.create')" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            <svg class="inline-flex w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
                Add Template
            </Link>
        </div>

        <!-- Content Section -->
        <div class="container mx-auto py-6" v-if="props?.templates.length > 0">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <div v-for="template in props?.templates" :key="template.id"
            class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 transform hover:scale-105">

            <!-- Title + Badge + Edit/Delete -->
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center gap-2">
                    <h2 class="text-xl font-semibold">{{ template.name }}</h2>
                    <span v-if="template.is_active"
                        class="text-xs px-2 py-1 rounded-full font-medium bg-green-100 text-green-700">
                        Active
                    </span>
                </div>
                <div class="flex gap-2">
                    <EditButton :obj="template" redirectionRoute="templates.edit" />
                    <DeleteConfirmationButton :obj="template" confirmRoute="templates.destroy" />
                </div>
            </div>

            <!-- Slug -->
            <p class="text-gray-500 text-sm mb-6">
                Slug: <span class="font-medium text-gray-700">{{ template.slug }}</span>
            </p>

            <!-- Buttons -->
            <div class="flex gap-2">
                <button @click="openPreview(template.slug)"
                    class="flex-1 py-2 rounded-lg border border-blue-600 text-blue-600 hover:bg-blue-50 transition font-medium">
                    View
                </button>

                <button v-if="!template.is_active" @click="activate(template.id)"
                    class="flex-1 py-2 rounded-lg text-white bg-blue-600 hover:bg-blue-700 transition font-medium">
                    Activate
                </button>
                <div v-else
                    class="flex-1 py-2 rounded-lg text-center bg-green-50 text-green-700 font-medium border border-green-200">
                    Currently Active
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-5 text-gray-500" v-else>
    <p>No Data Found...</p>
</div>

        <!-- Preview Modal -->
        <Teleport to="body">
            <div v-if="previewOpen" class="fixed inset-0 z-50 bg-black bg-opacity-70 flex items-center justify-center p-4">
                <div class="bg-white rounded-xl shadow-2xl w-full max-w-6xl h-[90vh] flex flex-col">

                    <!-- Modal Header -->
                    <div class="flex items-center justify-between px-5 py-3 border-b">
                        <h3 class="font-semibold text-gray-700">Template Preview</h3>
                        <button @click="closePreview" class="text-gray-400 hover:text-red-500 text-3xl leading-none">&times;</button>
                    </div>

                    <!-- Iframe -->
                    <div class="flex-1 overflow-hidden rounded-b-xl">
                        <iframe v-if="previewUrl" :src="previewUrl" class="w-full h-full border-0" title="Template Preview">
                        </iframe>
                    </div>
                </div>
            </div>
        </Teleport>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Template, BreadcrumbInterface, Flash } from '@/types/index';
import { Link } from '@inertiajs/vue3';
import DeleteConfirmationButton from '@/Components/Button/DeleteConfirmationButton.vue';
import EditButton from '@/Components/Button/EditButton.vue';
import { router } from '@inertiajs/vue3';
import { showToast } from '@/Core/helpers/toast';
import type { Page } from '@inertiajs/core';
import { ref } from 'vue';

const props = defineProps<{
    templates: Template[],
    breadcrumbs: BreadcrumbInterface[],
    pageTitle: string,
}>();

const activate = (id: number) => {
    router.patch(route('templates.activate', id), {}, {
        preserveScroll: true,
        onSuccess: (page: Page) => {
            const flash = page.props.flash as Flash;
            if (flash.success) {
                showToast('success', flash.success);
                flash.success = null;
            }
            router.reload({ only: ['templates'] });
        },
    });
};

// preview modal
const previewOpen = ref(false);
const previewUrl  = ref('');

const openPreview = (slug: string) => {
    previewUrl.value = route('template.preview', { slug });
    previewOpen.value = true;
};

const closePreview = () => {
    previewOpen.value = false;
    previewUrl.value  = ''; // clear so iframe stops loading when closed
};
</script>