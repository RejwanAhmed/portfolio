<template>
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
      <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-xl font-bold mb-4">Upload CV</h2>
  
        <!-- Your form -->
        <form @submit.prevent="submit">
          <input type="file" accept="application/pdf" @change="handleFileChange" class="mb-4" required>
          <ErrorMessage :errorMessage="formData.errors.file"/>
          <div class="text-right">
            <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800">
              Save
            </button>
            <button type="button" @click="closeModal" class="ml-2 text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
</template>
  
<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import ErrorMessage from '@/Components/Message/ErrorMessage.vue';
import { showToast } from '@/Core/helpers/toast';

const emit = defineEmits(['submitSuccess']);

const handleFileChange = (event: Event) => {
  const target = event.target as HTMLInputElement
  const selectedFile = target.files?.[0] ?? null;
  formData.file = selectedFile;
}

const formData = useForm({
  file: null as File | null,
});

const submit = () => {
    formData.post(route('cvs.store'), {
      onSuccess: (page) => {
        formData.reset();
        
        if ((page.props.flash as { success?: string })?.success) {
          showToast('success', (page.props.flash as { success: string }).success);
        }

        emit('submitSuccess');
      },
    })

}

const closeModal = () => {
    formData.reset();
    emit('submitSuccess');
}
</script>
  