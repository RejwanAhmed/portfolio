<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="breadcrumbs">
        <!-- Content Section -->
        <div class=" mx-auto p-6 bg-white shadow-md rounded-lg space-y-6">
            <VForm @submit="submit" class="space-y-6">
                <!-- Image Upload with Preview -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Skill Image<span v-if="!props.skill?.id" class="text-red-500">*</span></label>
                    <input type="file" id="image" @change="previewImage"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100" />
                    <div v-if="imagePreview" class="mt-4">
                        <img height="100px" width="100px" :src="imagePreview" alt="Preview" class="w-32 h-32 object-cover rounded-md" />
                    </div>
                    <ErrorMessage :errorMessage="formData.errors.image_url" />
                </div>

                <div class="md:flex md:space-x-4">
                    <!-- Name -->
                    <div class="md:w-1/2 w-full">
                        <label for="github_url" class="block text-sm font-medium text-gray-700">Name<span class="text-red-500">*</span></label>
                        <Field type="text" name="github_url" v-model="formData.name" placeholder="Skill Name" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.name"/>
                    </div>

                    <!-- Proficiency Level -->
                    <div class="relative md:w-1/2 w-full mt-4 md:mt-0">
                        <label for="live_link_url" class="block text-sm font-medium text-gray-700">Proficiency Level<span class="text-red-500">*</span></label>
                        <Field type="text" name="live_link_url" v-model="formData.proficiency_level" placeholder="Enter proficiency level in percentage" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.proficiency_level"/>
                    </div>
                </div>
                <SubmitButton />
            </VForm>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, router  } from '@inertiajs/vue3';
import { Field, Form as VForm } from "vee-validate";
import SubmitButton from '@/Components/Button/SubmitButton.vue';
import ErrorMessage from '@/Components/Message/ErrorMessage.vue';
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';
import { ref, onMounted } from 'vue';

const props = defineProps({
    skill: Object,
    pageTitle: String,
    breadcrumbs: Array as () => BreadcrumbInterface[]
})

const formData = useForm({
    name: props.skill?.name || '',
    image_url: props.skill?.image_url || '',
    proficiency_level: props.skill?.proficiency_level || '',
})

const imagePreview = ref<string | null>(null); // Store the preview URL

onMounted(() => {
    if(props.skill?.image_url) {
        imagePreview.value = `/${props.skill.image_url}`;
    }
}); 

const previewImage = (event: Event) => {
    const file = (event.target as HTMLInputElement)?.files?.[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target?.result as string;
        };
        reader.readAsDataURL(file);
        formData.image_url = file; // Update formData with the file for submission
    }
};

// 

const submit = () => {
    if (props.skill?.id) {
        const form = new FormData();
        form.append('_method', 'patch');
        form.append('name', formData.name);
        form.append('proficiency_level', formData.proficiency_level);
        if (formData.image_url instanceof File) {
            form.append('image_url', formData.image_url); // New image selected
        } else  {
            form.append('image_url', props.skill?.image_url); // Keep existing image URL
        }

        router.post(`/skills/${props.skill?.id}`,form, {
            forceFormData: true,
            onError: (errors) => {
                formData.errors = errors;
            },
        })
        
    } else {
        formData.post(route('skills.store'), {
            preserveScroll: true,
        });
    }
    
}
</script>
