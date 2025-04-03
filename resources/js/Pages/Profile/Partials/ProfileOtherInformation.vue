<template>
    <!-- Content Section -->
    <div class=" mx-auto p-6 bg-white shadow-md rounded-lg space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                Other Information
            </h2>
        </header>
        <VForm @submit="submit" class="space-y-6">
            <div class="md:flex md:space-x-4">
                <!-- Phone -->
                <div class="relative md:w-1/2 w-full">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <Field type="text"  class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Enter Phone number" name = "phone" v-model="formData.phone"/>
                    <ErrorMessage :errorMessage="formData.errors.phone"/>
                </div>

                <!-- Address -->
                <div class="relative md:w-1/2 w-full mt-4 md:mt-0">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address </label>
                    <Field type="text" name="address" v-model="formData.address" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                    <ErrorMessage :errorMessage="formData.errors.address"/>
                </div>
            </div>

            <div class="md:flex md:space-x-4">
                <!-- Linked In Url -->
                <div class="relative md:w-1/2 w-full">
                    <label for="linked_in_url" class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                    <Field type="text"  class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" placeholder="Enter LinkedIn URL" name = "linked_in_url" v-model="formData.linked_in_url"/>
                    <ErrorMessage :errorMessage="formData.errors.linked_in_url"/>
                </div>

                <!-- Github URL -->
                <div class="relative md:w-1/2 w-full mt-4 md:mt-0">
                    <label for="github_url" class="block text-sm font-medium text-gray-700">Github URL </label>
                    <Field type="text" name="github_url" placeholder="Enter Github URL" v-model="formData.github_url" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md focus:ring focus:ring-indigo-200 transition ease-in-out duration-200" />
                    <ErrorMessage :errorMessage="formData.errors.github_url"/>
                </div>
            </div>
        
            <!-- Short Description Field -->
            <div>
                <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description </label>
                <QuillEditor  v-model:content="formData.short_description" contentType="html" theme="snow" toolbar="essential" />
                <ErrorMessage :errorMessage="formData.errors.short_description"/>
            </div>

            <!-- Long Description Field -->
            <div>
                <label for="long_description" class="block text-sm font-medium text-gray-700">Long Description </label>
                <QuillEditor  v-model:content="formData.long_description" contentType="html" theme="snow" toolbar="essential" />
                <ErrorMessage :errorMessage="formData.errors.long_description"/>
            </div>

            <!-- About me image with Preview -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">About Me Image</label>
                <input type="file" @change="previewImage($event, 'about')"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100" />
                <div v-if="imagePreview.about" class="mt-2">
                    <img height="100px" width="100px" :src="imagePreview.about" alt="Preview" class="w-15 h-15 object-cover rounded-md" />
                </div>
                <ErrorMessage :errorMessage="formData.errors.about_me_image_url" />
            </div>
            
            <!-- Landing image with Preview -->
            <div>
                <label for="landing_image" class="block text-sm font-medium text-gray-700">Landing Image</label>
                <input type="file" @change="previewImage($event, 'landing')"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100" />
                <div v-if="imagePreview.landing" class="mt-2">
                    <img height="100px" width="100px" :src="imagePreview.landing" alt="Preview" class="w-15 h-15 object-cover rounded-md" />
                </div>
                <ErrorMessage :errorMessage="formData.errors.landing_image_url" />
            </div>
            <SubmitButton />
        </VForm>
    </div>
</template>

<script setup lang="ts">
import { useForm, router } from '@inertiajs/vue3';
import { Field, Form as VForm } from "vee-validate";
import SubmitButton from '@/Components/Button/SubmitButton.vue';
import ErrorMessage from '@/Components/Message/ErrorMessage.vue';
import { ref, onMounted } from 'vue';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css';
import toastr from 'toastr';
import 'toastr/toastr.scss';

const props = defineProps({
    user: Object,
})

const formData = useForm({
    phone: props.user?.phone || '',
    address: props.user?.address || '',
    short_description: props.user?.short_description || '',
    long_description: props.user?.long_description || '',
    linked_in_url: props.user?.linked_in_url || '',
    github_url: props.user?.github_url || '',
    landing_image_url: props.user?.landing_image_url || null,
    about_me_image_url: props.user?.about_me_image_url || null,
})

const imagePreview = ref({ landing: null, about: null });

onMounted(() => {
    if(props.user?.about_me_image_url) {
        imagePreview.value['about'] = `/${props.user?.about_me_image_url}`;
    }

    if(props.user?.landing_image_url) {
        imagePreview.value['landing'] = `/${props.user?.landing_image_url}`;
    }
}); 

const previewImage = (event: Event, type) => {
    const file = (event.target as HTMLInputElement)?.files?.[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value[type] = e.target?.result as string;
        };
        reader.readAsDataURL(file);

        if (type == 'about') {
            formData.about_me_image_url = file;
        } 
        if (type == 'landing') {
            formData.landing_image_url = file;
        }
    }
};

const submit = () => {
    const form = new FormData();
    form.append('_method', 'patch');
    form.append('phone', formData.phone);
    form.append('address', formData.address);
    form.append('linked_in_url', formData.linked_in_url);
    form.append('github_url', formData.github_url);
    form.append('short_description', formData.short_description);
    form.append('long_description', formData.long_description);

    if (formData.about_me_image_url instanceof File) {
        form.append('about_me_image_url', formData.about_me_image_url); // New image selected
    } else if (!props.user?.about_me_image_url) {
        form.append('about_me_image_url', '');
    } else  {
        form.append('about_me_image_url', props.user?.about_me_image_url); // Keep existing image URL
    }

    if (formData.landing_image_url instanceof File) {
        form.append('landing_image_url', formData.landing_image_url); // New image selected
    } else if (!props.user?.landing_image_url) {
        form.append('landing_image_url', '');
    } else  {
        form.append('landing_image_url', props.user?.landing_image_url); // Keep existing image URL
    }

    router.post(`/profile/other-information/${props.user?.id}`,form, {
        forceFormData: true,
        preserveScroll: true,
        onError: (errors) => {
            formData.errors = errors;
        },
        onSuccess: (success) => {
            const flashMessage = success.props.flash as { success?: string };

            if (flashMessage.success) {
                toastr.success(flashMessage.success);
                flashMessage.success = null;
            }
        }
    })
}
</script>