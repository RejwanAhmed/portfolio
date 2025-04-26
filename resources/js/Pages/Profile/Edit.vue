<template>
    <AuthenticatedLayout :pageTitle="pageTitle" :breadcrumbs="breadcrumbs">
        <div class="">
            <div class="mx-auto max-w-7xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                            class="w-full"
                        />
                    </div>

                    <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                        <UpdatePasswordForm class="w-full" />
                    </div>
                </div>
            </div>
        </div>

        <ProfileOtherInformation :user="user"></ProfileOtherInformation>

    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import ProfileOtherInformation from './Partials/ProfileOtherInformation.vue';
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
    user: Object,
    pageTitle: String,
    breadcrumbs: Array as () => BreadcrumbInterface[],
});
</script>
