<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="breadcrumbs">
        <!-- Content Section -->
        <div class=" mx-auto p-6 bg-white shadow-md rounded-lg space-y-6">
            <VForm @submit="submit" class="space-y-6">
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name<span class="text-red-500">*</span>
                    </label>
                    <Field type="text"  class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Enter your project name" name = "name" v-model="formData.name"/>
                    <ErrorMessage :errorMessage="formData.errors.name"/>
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description <span class="text-red-500">*</span></label>
                    <textarea id="description" v-model="formData.description" rows="4" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Describe your project">
                    </textarea>
                    <ErrorMessage :errorMessage="formData.errors.description"/>
                </div>

                <div class="md:flex md:space-x-4">
                    <!-- Start Date Field with Tooltip -->
                    <div class="relative md:w-1/2 w-full">
                        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date <span class="text-red-500">*</span></label>
                        <Field type="date" name="start_date" v-model="formData.start_date" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.start_date"/>
                    </div>

                    <!-- End Date -->
                    <div class="relative md:w-1/2 w-full mt-4 md:mt-0">
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date <span class="text-red-500">*</span></label>
                        <Field type="date" name="end_date" v-model="formData.end_date" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.end_date"/>
                    </div>
                </div>
                <div class="md:flex md:space-x-4">
                    <!-- GitHub URL -->
                    <div class="md:w-1/2 w-full">
                        <label for="github_url" class="block text-sm font-medium text-gray-700">GitHub URL</label>
                        <Field type="url" name="github_url" v-model="formData.github_url" placeholder="https://github.com/..." class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.github_url"/>
                    </div>

                    <!-- Live Link URL -->
                    <div class="relative md:w-1/2 w-full mt-4 md:mt-0">
                        <label for="live_link_url" class="block text-sm font-medium text-gray-700">Live Link URL</label>
                        <Field type="url" name="live_link_url" v-model="formData.live_link_url" placeholder="https://example.com" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.live_link_url"/>
                    </div>
                </div>
                <SubmitButton />
            </VForm>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Field, Form as VForm } from "vee-validate";
import SubmitButton from '@/Components/Button/SubmitButton.vue';
import ErrorMessage from '@/Components/Message/ErrorMessage.vue';
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';
const props = defineProps({
    project: Object,
    pageTitle: String,
    breadcrumbs: Array as () => BreadcrumbInterface[]
})

const formData = useForm({
    name: props.project?.name || '',
    description: props.project?.description || '',
    start_date: props.project?.start_date || '',
    end_date: props.project?.end_date || '',
    github_url: props.project?.github_url || '',
    live_link_url: props.project?.live_link_url || ''
})

const submit = () => {
    if (props.project?.id) {
        formData.put(route('projects.update', props.project?.id), {
            preserveScroll: true,
        });
    } else {
        formData.post(route('projects.store'), {
            preserveScroll: true,
        });
    }
    
}
</script>
