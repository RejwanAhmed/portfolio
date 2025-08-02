<script setup lang="ts">
import { ref } from 'vue';
import Sidebar from '@/Layouts/Components/Sidebar.vue';
import FlashMessage from '@/Components/Message/FlashMessage.vue';
import { Head } from '@inertiajs/vue3';
import Breadcrumb from '@/Components/Breadcrumb.vue';
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';

const showingNavigationDropdown = ref(false);
const props = defineProps({
    pageTitle: String,
    breadcrumbs: Array as () => BreadcrumbInterface[]
});
</script>

<template>
    <Head :title="props?.pageTitle" />
    <div>
        <Sidebar/>
        
        <div class="sm:ml-64">
            <FlashMessage v-if="$page.props.flash" :flash="$page.props.flash"/>
            <div class="py-10">
                <div class="mx-auto px-4 sm:px-6 lg:px-8">
                    <main >
                        <h1 class="text-2xl font-semibold text-gray-500 mb-4">{{ props?.pageTitle }}</h1>
                        <Breadcrumb :breadcrumbs="props?.breadcrumbs"/>
                        <slot />
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>
