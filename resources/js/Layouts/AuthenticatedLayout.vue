<script setup>
import { ref } from 'vue';
import Sidebar from '@/Layouts/Components/Sidebar.vue';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <Sidebar/>
        <div class="sm:ml-64">
            <main >
                <slot />
            </main>
        </div>
    </div>
</template>
