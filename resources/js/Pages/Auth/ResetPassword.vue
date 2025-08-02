<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import ErrorMessage from '@/Components/Message/ErrorMessage.vue';
import { Field, Form as VForm } from "vee-validate";
import { ref } from 'vue';

const props = defineProps({
    email: {
        type: String,
        required: true,
    },
    token: {
        type: String,
        required: true,
    },
});

const isPasswordVisible = ref(false);
const isConfirmPasswordVisible = ref(false);

const togglePasswordVisibility = () => {
    isPasswordVisible.value = !isPasswordVisible.value;
}

const toggleConfirmPasswordVisibility = () => {
    isConfirmPasswordVisible.value = !isConfirmPasswordVisible.value;
}

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('password.store'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Reset Password" />
        <VForm @submit="submit">
            <div class="mb-4">
                <div class="flex items-center border rounded-md p-2 bg-gray-50">
                    <span class="text-gray-500">
                        <i class="bi bi-envelope-fill"></i>
                    </span>
                    <Field type="email" class="flex-1 ml-2 p-2 border-none focus:outline-none" placeholder="Enter your email" name="email" v-model="form.email" required autocomplete="username"/>
                </div>
                <ErrorMessage :errorMessage="form.errors.email"/>
            </div>
            <div class="mb-4">
                <div class="flex items-center border rounded-md p-2 bg-gray-50">
                    <span class="text-gray-500">
                        <i :class="isPasswordVisible ? 'bi bi-eye-slash' : 'bi bi-eye'" @click="togglePasswordVisibility" style="cursor: pointer;"></i>
                    </span>
                    <Field :type ="isPasswordVisible ? 'text' : 'password'" class="flex-1 ml-2 p-2 border-none focus:outline-none" placeholder="Enter your password" name="password" v-model="form.password" required autocomplete="new-password"/>
                </div>
                <ErrorMessage :errorMessage="form.errors.password"/>
            </div>

            <div class="mb-4">
                <div class="flex items-center border rounded-md p-2 bg-gray-50">
                    <span class="text-gray-500">
                        <i :class="isConfirmPasswordVisible ? 'bi bi-eye-slash' : 'bi bi-eye'" @click="toggleConfirmPasswordVisibility" style="cursor: pointer;"></i>
                    </span>
                    <Field :type ="isConfirmPasswordVisible ? 'text' : 'password'" class="flex-1 ml-2 p-2 border-none focus:outline-none" placeholder="Enter your password" name="password_confirmation" v-model="form.password_confirmation" required autocomplete="new-password"/>
                </div>
                <ErrorMessage :errorMessage="form.errors.password_confirmation"/>
            </div>

            <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-lg focus:outline-none focus:ring focus:ring-blue-300" type="submit">Reset Password</button>
        </VForm>
    </GuestLayout>
</template>
