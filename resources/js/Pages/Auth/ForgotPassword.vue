<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import ErrorMessage from '@/Components/Message/ErrorMessage.vue';
import { Field, Form as VForm } from "vee-validate";

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <GuestLayout>
        <Head title="Forgot Password" />
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center">
                Forgot your password?
            </h2>
            <p class="text-gray-600 dark:text-gray-300 text-center text-sm">
                No problem. Enter your email and we'll send you a link to reset your password.
            </p>

            <div v-if="status" class="text-sm font-medium text-green-600 text-center">
                {{ status }}
            </div>
            
            <VForm @submit="submit">
                <!-- Email input -->
                <div class="mb-4 mt-4">
                    <div class="flex items-center border rounded-md p-2 bg-gray-50">
                        <span class="text-gray-500">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <Field type="email" class="flex-1 ml-2 p-2 border-none focus:outline-none" placeholder="Enter your email" name="email" v-model="form.email" required />
                    </div>
                    <ErrorMessage :errorMessage="form.errors.email"/>
                </div>
                <!-- Submit Button -->
                <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-lg focus:outline-none focus:ring focus:ring-blue-300" type="submit">Email Password Reset Link</button>
            </VForm>
    </GuestLayout>
</template>
