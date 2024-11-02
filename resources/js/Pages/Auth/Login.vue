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
    <section class="vh-100" style="background-color: #f0f2f5;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <!-- Card for login form -->
                    <div class="card shadow-lg" style="border-radius: 1rem;">
                        <div class="card-body p-5">
                            <h3 class="text-center mb-4 font-weight-bold">Welcome Back <b><i>Rejwan</i></b></h3>
                            <hr>
                            <p class="text-center mb-4">Please sign in to your account</p>

                            <VForm @submit="submit">
                                <!-- Email input -->
                                 <div class="form-outlint mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="bi bi-envelope-fill"></i>
                                        </span>
                                        <Field type="email" class="form-control form-control-lg" placeholder="Enter your email" name="email" v-model="formData.email" required />
                                    </div>
                                    <ErrorMessage :errorMessage="formData.errors.email"/>
                                 </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <div class="input-group">
                                        <span class="input-group-text" id="password-addon">
                                            <i :class="isPasswordVisible ? 'bi bi-eye-slash' : 'bi bi-eye'" @click="togglePasswordVisibility" style="cursor: pointer;"></i>
                                        </span>
                                        <Field :type ="isPasswordVisible ? 'text' : 'password'" class="form-control form-control-lg" placeholder="Enter your password" name="password" v-model="formData.password" required />
                                    </div>
                                    
                                    <ErrorMessage :errorMessage="formData.errors.password"/>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <Field type="checkbox" name="remember" v-model="formData.remember" />
                                        <label class="form-check-label ms-2">Remember me</label>
                                    </div>
                                    <a href="#!" class="text-primary">Forgot password?</a>
                                </div>

                                <!-- Submit Button -->
                                <button class="form-control btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </VForm>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>