<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="breadcrumbs">
        <!-- Content Section -->
        <div class=" mx-auto p-6 bg-white shadow-md rounded-lg space-y-6">
            <VForm @submit="submit" class="space-y-6">
                <div class="md:flex md:space-x-4">
                    <!-- Company Name Field -->
                    <div class="relative md:w-1/2 w-full">
                        <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name<span class="text-red-500">*</span></label>
                        <Field type="text"  class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Enter company name" name = "company_name" v-model="formData.company_name"/>
                        <ErrorMessage :errorMessage="formData.errors.company_name"/>
                    </div>

                    <!-- Job Title -->
                    <div class="relative md:w-1/2 w-full mt-4 md:mt-0">
                        <label for="job_title" class="block text-sm font-medium text-gray-700">Job Title <span class="text-red-500">*</span></label>
                        <Field type="text" name="job_title" v-model="formData.job_title" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.job_title"/>
                    </div>
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
                        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                        <Field type="date" name="end_date" v-model="formData.end_date" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.end_date"/>
                    </div>
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description <span class="text-red-500">*</span></label>
                    <QuillEditor  v-model:content="formData.description" contentType="html" theme="snow" toolbar="essential" />
                    <ErrorMessage :errorMessage="formData.errors.description"/>
                </div>
                <SubmitButton />
            </VForm>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { Field, Form as VForm } from "vee-validate";
import SubmitButton from '@/Components/Button/SubmitButton.vue';
import ErrorMessage from '@/Components/Message/ErrorMessage.vue';
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css';

const props = defineProps({
    experience: Object,
    pageTitle: String,
    breadcrumbs: Array as () => BreadcrumbInterface[]
})

const formData = useForm({
    company_name: props.experience?.company_name || '',
    job_title: props.experience?.job_title || '',
    start_date: props.experience?.start_date || '',
    end_date: props.experience?.end_date || '',
    description: props.experience?.description || '',
})

const submit = () => {
    if (props.experience?.id) {
        formData.put(route('experiences.update', props.experience?.id), {
            preserveScroll: true,
        });
    } else {
        formData.post(route('experiences.store'), {
            preserveScroll: true,
        });
    }
}
</script>