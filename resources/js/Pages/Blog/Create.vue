<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="breadcrumbs">
        <div class="mx-auto p-6 bg-white shadow-md rounded-lg space-y-6">
            <VForm @submit="submit" class="space-y-6">

                <!-- Title & URL -->
                <div class="md:flex md:space-x-4">
                    <div class="relative md:w-1/2 w-full md:mt-0">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title <span class="text-red-500">*</span>
                        </label>
                        <Field type="text" name="title" v-model="formData.title" placeholder="Enter blog title" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200"/>
                        <ErrorMessage :errorMessage="formData.errors.title" />
                    </div>

                    <div class="relative md:w-1/2 w-full md:mt-0">
                        <label for="url" class="block text-sm font-medium text-gray-700">
                            URL <span class="text-red-500">*</span>
                        </label>
                        <Field type="url" name="url" v-model="formData.url" placeholder="https://medium.com/..." class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200"
                        />
                        <ErrorMessage :errorMessage="formData.errors.url" />
                    </div>
                </div>

                <!-- Excerpt -->
                <div>
                    <label for="excerpt" class="block text-sm font-medium text-gray-700">Excerpt</label>
                    <textarea name="excerpt" v-model="formData.excerpt" placeholder="Write a short summary of the blog post..." rows="3" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200 resize-none"/>
                    <p class="text-xs text-gray-400 mt-1">{{ formData.excerpt?.length ?? 0 }} / 500</p>
                    <ErrorMessage :errorMessage="formData.errors.excerpt" />
                </div>

                <!-- Published At -->
                <div class="md:w-1/2 w-full">
                    <label for="published_at" class="block text-sm font-medium text-gray-700">Published Date <span class="text-red-500">*</span>
                    </label>
                    <Field type="date" name="published_at" v-model="formData.published_at" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200"
                    />
                    <ErrorMessage :errorMessage="formData.errors.published_at" />
                </div>

                <!-- Toggles -->
                <div class="flex flex-col sm:flex-row sm:space-x-8 space-y-4 sm:space-y-0">

                    <!-- Is Featured -->
                    <div class="flex items-center space-x-3">
                        <span class="text-sm font-medium text-gray-700">Featured</span>
                        <button type="button" @click="formData.is_featured = !formData.is_featured" :class="formData.is_featured ? 'bg-indigo-600' : 'bg-gray-200'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none">
                            <span :class="formData.is_featured ? 'translate-x-6' : 'translate-x-1'" class="inline-block h-4 w-4 transform rounded-full bg-white shadow transition-transform duration-200"/>
                        </button>
                        <span class="text-sm text-gray-500">{{ formData.is_featured ? 'Yes' : 'No' }}</span>
                    </div>

                    <!-- Is Visible -->
                    <div class="flex items-center space-x-3">
                        <span class="text-sm font-medium text-gray-700">Visible</span>
                        <button type="button" @click="formData.is_visible = !formData.is_visible" :class="formData.is_visible ? 'bg-indigo-600' : 'bg-gray-200'" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none">
                            <span :class="formData.is_visible ? 'translate-x-6' : 'translate-x-1'" class="inline-block h-4 w-4 transform rounded-full bg-white shadow transition-transform duration-200"/>
                        </button>
                        <span class="text-sm text-gray-500">{{ formData.is_visible ? 'Yes' : 'No' }}</span>
                    </div>
                </div>
                <SubmitButton />
            </VForm>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ErrorMessage from '@/Components/Message/ErrorMessage.vue';
import SubmitButton from '@/Components/Button/SubmitButton.vue';
import { Blog, BreadcrumbInterface } from '@/types/index';
import { useForm } from '@inertiajs/vue3';
import { Field, Form as VForm } from 'vee-validate';

const props = defineProps<{
    blog?: Blog;
    breadcrumbs: BreadcrumbInterface[];
    pageTitle: string;
}>();

const formData = useForm({
    title:        props.blog?.title        ?? '',
    url:          props.blog?.url          ?? '',
    excerpt:      props.blog?.excerpt      ?? '',
    published_at: props.blog?.published_at ?? '',
    is_featured:  props.blog?.is_featured  ?? false,
    is_visible:   props.blog?.is_visible   ?? true,
});

const submit = () => {
    if (props.blog?.id) {
        formData.patch(route('blogs.update', props.blog.id), {
            preserveScroll: true,
            onError: (errors: any) => {
                formData.errors = errors;
            },
        });
    } else {
        formData.post(route('blogs.store'), {
            preserveScroll: true,
            onError: (errors: any) => {
                formData.errors = errors;
            },
        });
    }
};
</script>