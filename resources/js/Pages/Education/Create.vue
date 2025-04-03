<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="breadcrumbs">
        <div class=" mx-auto p-6 bg-white shadow-md rounded-lg space-y-6">
            <VForm @submit="submit" class="space-y-6">
                <!-- Image Upload with Preview -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Institute Logo</label>
                    <input type="file" id="image" @change="previewImage"
                        class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100" />
                    <div v-if="imagePreview" class="mt-2">
                        <img height="100px" width="100px" :src="imagePreview" alt="Preview" class="w-15 h-15 object-cover rounded-md" />
                    </div>
                    <ErrorMessage :errorMessage="formData.errors.logo" />
                </div>
                
                <div class="md:flex md:space-x-4">
                    <!-- Seial No Field -->
                    <div class="relative md:w-1/2 w-full md:mt-0">
                        <label for="serial_no" class="block text-sm font-medium text-gray-700">Serial No<span class="text-red-500">*</span>
                        </label>
                        <Field type="text" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Enter serial no" name = "serial_no" v-model="formData.serial_no"/>
                        <ErrorMessage :errorMessage="formData.errors.serial_no"/>
                    </div>

                    <!-- Title Field -->
                    <div class="relative md:w-1/2 w-full  md:mt-0">
                        <label for="title" class="block text-sm font-medium text-gray-700">Title<span class="text-red-500">*</span>
                        </label>
                        <Field type="text"  class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Enter exam title" name = "title" v-model="formData.title"/>
                        <ErrorMessage :errorMessage="formData.errors.title"/>
                    </div>
                </div>
            
                <!-- Institution Field -->
                <div>
                    <label for="institution" class="block text-sm font-medium text-gray-700">Institution <span class="text-red-500">*</span></label>
                    <Field type="text" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Enter institution name" name="institution"  v-model="formData.institution">
                    </Field>
                    <ErrorMessage :errorMessage="formData.errors.institution"/>
                </div>

                <div class="md:flex md:space-x-4">
                    <!-- Board Field -->
                    <div class="relative md:w-1/2 w-full  md:mt-0">
                        <label for="board" class="block text-sm font-medium text-gray-700">Board</label>
                        <Field type="text" class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Enter board" name = "board" v-model="formData.board"/>
                        <ErrorMessage :errorMessage="formData.errors.board"/>
                    </div>

                    <!-- Result Field -->
                    <div class="relative md:w-1/2 w-full  md:mt-0">
                        <label for="result" class="block text-sm font-medium text-gray-700">Result<span class="text-red-500">*</span>
                        </label>
                        <Field type="text"  class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Enter result" name = "result" v-model="formData.result"/>
                        <ErrorMessage :errorMessage="formData.errors.result"/>
                    </div>
                </div>

                <div class="md:flex md:space-x-4">
                    <!-- Start Year Field -->
                    <div class="relative md:w-1/3 w-full">
                        <label for="start_year" class="block text-sm font-medium text-gray-700">Start Year <span class="text-red-500">*</span></label>
                        <Field type="text" placeholder="Enter start year" name="start_year" v-model="formData.start_year" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.start_year"/>
                    </div>

                    <!-- End Year Field -->
                    <div class="relative md:w-1/3 w-full  md:mt-0">
                        <label for="end_year" class="block text-sm font-medium text-gray-700">End Year <span class="text-red-500">*</span></label>
                        <Field type="text" placeholder="Enter end year" name="end_year" v-model="formData.end_year" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.end_year"/>
                    </div>
                    
                    <!-- Held On Year Field -->
                    <div class="relative md:w-1/3 w-full md:mt-0">
                        <label for="held_on_year" class="block text-sm font-medium text-gray-700">Held On Year</label>
                        <Field type="text" placeholder="Enter held year" name="held_on_year" v-model="formData.held_on_year" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                        <ErrorMessage :errorMessage="formData.errors.held_on_year"/>
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
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';
import { defineProps, ref, onMounted } from 'vue';
import { useForm, router } from '@inertiajs/vue3';
import { Field, Form, Form as VForm } from "vee-validate";

const props = defineProps({
    education: Object,
    pageTitle: String,
    breadcrumbs: Array as () => BreadcrumbInterface[]
});

const formData = useForm({
    title: props.education?.title || '',
    serial_no: props.education?.serial_no || '',
    institution: props.education?.institution || '',
    board: props.education?.board || '',
    result: props.education?.result || '',
    start_year: props.education?.start_year || '',
    end_year: props.education?.end_year || '',
    held_on_year: props.education?.held_on_year || '',
    logo: props.education?.logo || '',
})

const imagePreview = ref<string | null>(null); // Store the preview URL

onMounted(() => {
    if(props.education?.logo) {
        imagePreview.value = `/${props.education.logo}`;
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
        formData.logo = file; // Update formData with the file for submission
    }
};

const submit = () => {
    if (props.education?.id) {
        const form = new FormData();
        form.append('_method', 'patch');
        form.append('title', formData.title);
        form.append('serial_no', formData.serial_no);
        form.append('institution', formData.institution);
        form.append('board', formData.board);
        form.append('result', formData.result);
        form.append('start_year', formData.start_year);
        form.append('end_year', formData.end_year);
        form.append('held_on_year', formData.held_on_year);
        if (formData.logo instanceof File) {
            form.append('logo', formData.logo); // New image selected
        } else  {
            form.append('logo', props.education?.logo); // Keep existing image URL
        }

        router.post(`/educations/${props.education?.id}`,form, {
            forceFormData: true,
            onError: (errors) => {
                formData.errors = errors;
            },
        })
    } else {
        formData.post(route('educations.store'), {
            preserveScroll: true,
        });
    }
}
</script>
