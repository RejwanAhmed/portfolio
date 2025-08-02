<script setup>
import ErrorMessage from '@/Components/Message/ErrorMessage.vue';
import { Field, Form as VForm } from "vee-validate";
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
});

const isPasswordVisible = ref(false);

const togglePasswordVisibility = () => {
    isPasswordVisible.value = !isPasswordVisible.value;
}
const formData = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    formData.post(route('login'), {
        onFinish: () => formData.reset('password'),
    });
};
</script>

<template>
    <section class="h-screen bg-gray-100">
        <div class="container mx-auto flex h-full justify-center items-center">
            <div class="w-full max-w-md">
                <!-- Card for login form -->
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <h3 class="text-center mb-4 text-2xl font-bold">Welcome Back <b><i>Rejwan</i></b></h3>
                    <hr class="mb-4">
                    <p class="text-center mb-4 text-gray-600">Please sign in to your account</p>

                    <VForm @submit="submit">
                        <!-- Email input -->
                        <div class="mb-4">
                            <div class="flex items-center border rounded-md p-2 bg-gray-50">
                                <span class="text-gray-500">
                                    <i class="bi bi-envelope-fill"></i>
                                </span>
                                <Field type="email" class="flex-1 ml-2 p-2 border-none focus:outline-none" placeholder="Enter your email" name="email" v-model="formData.email" required />
                            </div>
                            <ErrorMessage :errorMessage="formData.errors.email"/>
                        </div>

                        <!-- Password input -->
                        <div class="mb-4">
                            <div class="flex items-center border rounded-md p-2 bg-gray-50">
                                <span class="text-gray-500">
                                    <i :class="isPasswordVisible ? 'bi bi-eye-slash' : 'bi bi-eye'" @click="togglePasswordVisibility" style="cursor: pointer;"></i>
                                </span>
                                <Field :type ="isPasswordVisible ? 'text' : 'password'" class="flex-1 ml-2 p-2 border-none focus:outline-none" placeholder="Enter your password" name="password" v-model="formData.password" required />
                            </div>
                            <ErrorMessage :errorMessage="formData.errors.password"/>
                        </div>

                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <Field type="checkbox" name="remember" v-model="formData.remember" />
                                <label class="ml-2 text-gray-600">Remember me</label>
                            </div>
                            <a :href="route('password.request')" class="text-blue-500 hover:underline">Forgot password?</a>
                        </div>

                        <!-- Submit Button -->
                        <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-lg focus:outline-none focus:ring focus:ring-blue-300" type="submit">Login</button>
                    </VForm>
                </div>
            </div>
        </div>
    </section>

</template>