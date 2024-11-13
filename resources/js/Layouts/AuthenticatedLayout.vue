<script setup>
import { ref } from 'vue';
import Sidebar from '@/Layouts/Components/Sidebar.vue';
import FlashMessage from '@/Components/Message/FlashMessage.vue';
import { Head } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
const props = defineProps({
    pageTitle: String
});
</script>

<template>
    <Head :title="props?.pageTitle" />
    <div>
        <Sidebar/>
        
        <div class="sm:ml-64">
            <FlashMessage v-if="$page.props.flash" :flash="$page.props.flash"/>
            <div class="py-12">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <main >
                        <h1 class="text-2xl font-semibold text-gray-500 mb-4">{{ props?.pageTitle }}</h1>
                        <slot />
                    </main>
                </div>
            </div>
        </div>
    </div>
</template>
