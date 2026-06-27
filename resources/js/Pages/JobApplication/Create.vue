<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="breadcrumbs">
        <!-- Content Section -->
        <div class=" mx-auto p-6 bg-white shadow-md rounded-lg space-y-6">
            <VForm @submit="submit" class="space-y-6">
                <div class="md:flex md:space-x-4">
                    <!-- Company Name Field -->
                    <div class="relative md:w-1/2 w-full">
                        <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name<span class="text-red-500">*</span></label>
                        <Field type="text" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Enter company name" name = "company_name" v-model="formData.company_name"/>
                        <ErrorMessage :errorMessage="formData.errors.company_name"/>
                    </div>

                    <!-- Job Title -->
                    <div class="relative md:w-1/2 w-full mt-4 md:mt-0">
                        <label for="title" class="block text-sm font-medium text-gray-700">Job Title <span class="text-red-500">*</span></label>
                        <Field type="text" name="title" v-model="formData.title" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Ex. Software Engineer"/>
                        <ErrorMessage :errorMessage="formData.errors.title"/>
                    </div>
                </div>

                <div class="md:flex md:space-x-4">
                    <!-- Job URL -->
                    <div class="relative md:w-1/2 w-full">
                        <label for="job_url" class="block text-sm font-medium text-gray-700">Job URL</label>
                        <Field type="url" name="job_url" v-model="formData.job_url" placeholder="https://linkedin.com/..." class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200"/>
                        <ErrorMessage :errorMessage="formData.errors.job_url"/>
                    </div>

                    <!-- Job Source -->
                    <div class="relative md:w-1/2 w-full mt-4 md:mt-0">
                        <label for="source" class="block text-sm font-medium text-gray-700">Job Source</label>
                        <Field type="text" name="source" v-model="formData.source" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Ex. LinkedIn"/>
                        <ErrorMessage :errorMessage="formData.errors.source"/>
                    </div>
                </div>

                <div class="md:flex md:space-x-4">
                    <!-- Location -->
                    <div class="relative md:w-1/2 w-full mt-4 md:mt-0">
                        <label for="location" class="block text-sm font-medium text-gray-700">Company Location</label>
                        <Field type="text" name="location" v-model="formData.location" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.location"/>
                    </div>

                    <!-- Application Date -->
                    <div class="relative md:w-1/2 w-full">
                        <label for="application_date" class="block text-sm font-medium text-gray-700">Application Date</label>
                        <Field type="date" name="application_date" v-model="formData.application_date" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.application_date"/>
                    </div>
                </div>
               
                <div class="md:flex md:space-x-4">
                    <!-- Minimum Salary -->
                    <div class="relative md:w-1/2 w-full">
                        <label for="salary_min" class="block text-sm font-medium text-gray-700">Minimum Salary</label>
                        <Field type="number" name="salary_min" v-model="formData.salary_min" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.salary_min"/>
                    </div>

                    <!-- Maximum Salary> -->
                    <div class="relative md:w-1/2 w-full">
                        <label for="salary_max" class="block text-sm font-medium text-gray-700">Maximum Salary</label>
                        <Field type="number" name="salary_max" v-model="formData.salary_max" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.salary_max"/>
                    </div>
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <QuillEditor  v-model:content="formData.description" contentType="html" theme="snow" :options="quillOptions" />
                    <ErrorMessage :errorMessage="formData.errors.description"/>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status <span class="text-red-500">*</span></label>
                    <Field as="select" name="status" v-model="formData.status" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200">
                        <option value="">Select Status</option>
                        <option v-for="status in statuses" :key="status.value" :value="status.value">{{ status.label }}</option>
                    </Field>
                    <ErrorMessage :errorMessage="formData.errors.status"/>
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
import { JobApplication, BreadcrumbInterface } from '@/types/index';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css';
import { quillOptions } from '@/Core/constants/useQuillOptions';

const props = defineProps<{
    jobApplication?: JobApplication,
    breadcrumbs: BreadcrumbInterface[]
    pageTitle: string,
}>();

const formData = useForm({
    company_name: props.jobApplication?.company_name || '',
    title: props.jobApplication?.title || '',
    source: props.jobApplication?.source || '',
    job_url: props.jobApplication?.job_url || '',
    location: props.jobApplication?.location || '',
    application_date: props.jobApplication?.application_date || '',
    salary_min: props.jobApplication?.salary_min || '',
    salary_max: props.jobApplication?.salary_max || '',
    description: props.jobApplication?.description || '',
    status: props.jobApplication?.status || '',
})

const statuses = [
    { value: 'saved', label: 'Saved' },
    { value: 'applied', label: 'Applied' },
    { value: 'offer', label: 'Offer' },
    { value: 'accepted', label: 'Accepted' },
    { value: 'rejected', label: 'Rejected' },
    { value: 'withdrawn', label: 'Withdrawn' }
]

const submit = () => {
    if (props.jobApplication?.id) {
        formData.put(route('job-applications.update', props.jobApplication?.id), {
            preserveScroll: true,
        });
    } else {
        formData.post(route('job-applications.store'), {
            preserveScroll: true,
        });
    }
}
</script>