<template>
    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="props?.breadcrumbs">
        <div class="mx-auto p-6 bg-white shadow-md rounded-lg space-y-6">
            <VForm @submit="submit" class="space-y-6">

                <!-- Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <Field type="text" name="name" v-model="formData.name"
                        placeholder="e.g. Classic Dark"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                    <ErrorMessage :errorMessage="formData.errors.name" />
                </div>

                <!-- Slug -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        Slug <span class="text-red-500">*</span>
                    </label>
                    <Field type="text" name="slug" v-model="formData.slug" placeholder="e.g. classic"
                        class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                    <p class="text-xs text-gray-400 mt-1">
                        Must match the folder name under <code>Pages/Templates/</code>. Lowercase only.
                    </p>
                    <ErrorMessage :errorMessage="formData.errors.slug" />
                </div>

                <SubmitButton />
            </VForm>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { Field, Form as VForm } from 'vee-validate';
import SubmitButton from '@/Components/Button/SubmitButton.vue';
import ErrorMessage from '@/Components/Message/ErrorMessage.vue';
import { BreadcrumbInterface, Template } from '@/types/index';

const props = defineProps<{
    template?: Template,
    pageTitle: string,
    breadcrumbs: BreadcrumbInterface[],
}>();

const formData = useForm({
    name:          props.template?.name  || '',
    slug:          props.template?.slug  || '',
});

const submit = () => {
    if (props.template?.id) {
        formData.post(route('templates.update', props.template.id), {
            preserveScroll: true,
            // _method spoofing for file upload with PUT
            forceFormData: true,
            headers: { 'X-HTTP-Method-Override': 'PUT' },
        });
    } else {
        formData.post(route('templates.store'), {
            preserveScroll: true,
        });
    }
};
</script>