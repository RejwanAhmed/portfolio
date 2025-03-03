<template>
    <!-- Modal for Image Upload -->
    <button @click="openUploadModal(props?.projectId, props?.projectName)" class="text-green-700 hover:text-green-300 transition duration-200 ease-in-out text-[16px]" title="Upload Image">
        <i class="bi bi-image"></i>
    </button>


    <div v-if="openModal" class="fixed inset-0 flex justify-center items-center bg-black bg-opacity-50 z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-h-[80vh] overflow-y-auto" style="width: 70%;">
            <h3 class="text-lg font-semibold mb-4">Upload Images for {{projectName}}</h3>

            <!-- Image Upload -->
            <input type="file" @change="handleFileChange" class = "mb-2">
            <button @click="uploadImage()" class="bg-blue-500 text-white px-4 py-2 rounded">Upload</button>
            <ErrorMessage :errorMessage="errorMessages"/>
            <!-- Show Existing Images -->
            <div v-if="existingImage.length" class="mt-4">
                <h4 class="text-lg font-semibold mb-4 text-gray-700">Existing Images</h4>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    <div v-for="image in existingImage" :key="image.id" class="relative group bg-white p-2 rounded-lg shadow-md transition hover:shadow-lg">
                        <!-- Delete Button -->
                        <button @click="deleteImage(image.id)" class="absolute top-2 right-2 bg-red-600 text-white w-6 h-6 flex items-center justify-center rounded-full opacity-80 transition hover:opacity-100 hover:scale-110" >
                            ✕
                        </button>

                        <img :src="image.image_url" alt="Project Image" class="w-full h-24 sm:h-32 object-cover rounded-md">
                    </div>
                </div>
            </div>
            <div v-else class="mt-4">
                <h4 class="text-lg font-semibold mb-4 text-gray-700">No Images Found</h4>
            </div>

            <div class="mt-4 text-right">
                <button
                    @click="openModal = false"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800"
                >
                    Close
                </button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import ErrorMessage from '@/Components/Message/ErrorMessage.vue';
import axios from 'axios';

const props = defineProps({
    projectId: Number,
    projectName: String
});

const openModal = ref(false);
const projectId = ref<number | null>(null);
const projectName = ref<string | null>(null);
const existingImage = ref([]);
const selectedFile = ref(null);
const errorMessages = ref<string | null>(null);

const deleteImage = async (imageId) => {
    try {
        const response = await axios.delete(route('project.images.destroy', imageId));
        if (response.data.status == 'success') {
            getImages(projectId.value);
        }
    } catch (error) {
        console.log("Something went wrong. Please try again.");
    }
}

const uploadImage = async () => {
    try {
        const id = String(projectId.value)
        let formData = new FormData();
        formData.append("image_url", selectedFile.value);
        formData.append("project_id", id);
        const response = await axios.post(route('project.images.store', id), formData);
        if (response.data.status == 'success') {
            selectedFile.value = '';
            const fileInput = document.querySelector('input[type="file"]') as HTMLInputElement;
            fileInput.value = ''; // Clear the file input field
            getImages(projectId.value);
        }
    } catch(error: any) {
        if (error.response && error.response.data.errors) {
            errorMessages.value = error.response.data.errors.image_url[0];
        } else {
            errorMessages.value = "Something went wrong. Please try again.";
        }
    }
};

const handleFileChange = (event) => {
    selectedFile.value = event.target.files[0];
};

const getImages = async (projectId: number) => {
    try {
        const response = await axios.get(route('project.images.index', projectId));
        existingImage.value = response.data.images;
    } catch (error) {
        console.error("Error fetching images:", error);
    }
};

// Show modal and fetch images for the selected project
const openUploadModal = (id: number, name: string) => {
    projectId.value = id;
    projectName.value = name;
    getImages(id);
    openModal.value = true;
}
</script>