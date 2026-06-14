<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="breadcrumbs">
        <div class="mx-auto p-6 bg-white shadow-md rounded-lg space-y-6">

            <!-- Header -->
            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800">{{ props.jobApplication?.title }}</h2>
                    <p class="text-sm text-gray-500 mt-1">{{ props.jobApplication?.company_name }}</p>
                </div>
                <span :class="useStatusClass(props.jobApplication?.status)" class="text-xs font-medium px-3 py-1 rounded-full capitalize">
                    {{ props.jobApplication?.status }}
                </span>
            </div>

            <hr class="border-gray-200" />

            <!-- Details Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div v-if="props.jobApplication?.location">
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Location</p>
                    <p class="text-sm text-gray-800 mt-1">{{ props.jobApplication?.location }}</p>
                </div>

                <div v-if="props.jobApplication?.application_date">
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Application Date</p>
                    <p class="text-sm text-gray-800 mt-1">{{ formatDate(props.jobApplication?.application_date) }}</p>
                </div>

                <div v-if="props.jobApplication?.source">
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Source</p>
                    <p class="text-sm text-gray-800 mt-1">{{ props.jobApplication?.source }}</p>
                </div>

                <div v-if="props.jobApplication?.job_url">
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Job URL</p>
                    <a :href="props.jobApplication?.job_url" target="_blank"
                        class="text-sm text-indigo-600 hover:underline mt-1 block truncate">
                        {{ props.jobApplication?.job_url }}
                    </a>
                </div>

                <div v-if="props.jobApplication?.salary_min || props.jobApplication?.salary_max">
                    <p class="text-xs text-gray-500 uppercase tracking-wide">Salary Range</p>
                    <p class="text-sm text-gray-800 mt-1">
                        <span v-if="props.jobApplication?.salary_min">{{ formatCurrency(props.jobApplication?.salary_min) }}</span>
                        <span v-if="props.jobApplication?.salary_min && props.jobApplication?.salary_max"> – </span>
                        <span v-if="props.jobApplication?.salary_max">{{ formatCurrency(props.jobApplication?.salary_max) }}</span>
                    </p>
                </div>

            </div>

            <!-- Description -->
            <div v-if="props.jobApplication?.description">
                <hr class="border-gray-200 mb-6" />
                <p class="text-xs text-gray-500 uppercase tracking-wide mb-3">Description</p>
                <div class="prose max-w-none text-gray-800" v-html="props.jobApplication?.description" />
            </div>

            <!-- Actions -->
            <div class="flex gap-3 pt-2">
                <Link :href="route('job-applications.edit', props.jobApplication?.id)"
                    class="px-4 py-2 text-sm bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                    Edit
                </Link>
                <Link :href="route('job-applications.index')"
                    class="px-4 py-2 text-sm border border-gray-300 text-gray-700 rounded-md hover:bg-gray-50 transition">
                    Back
                </Link>
            </div>

        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Link } from '@inertiajs/vue3'
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces'
import { useStatusClass } from '@/composables/useStatusClass';

const props = defineProps({
    jobApplication: Object,
    pageTitle: String,
    breadcrumbs: Array as () => BreadcrumbInterface[]
})

const formatDate = (date: string) => {
    if (!date) return ''
    return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric', month: 'long', day: 'numeric'
    })
}

const formatCurrency = (value: number) => {
    return new Intl.NumberFormat('en-US', {
        style: 'currency', currency: 'BDT', maximumFractionDigits: 0
    }).format(value)
}
</script>