<template>
    <!-- Breadcrumb -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4 space-y-2 sm:space-y-0">
        <!-- Breadcrumb -->
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 text-sm">
                <li v-for="(breadcrumb, index) in breadcrumbs" :key="index" class="inline-flex items-center">
                    <!-- If it's the last breadcrumb, render as plain text -->
                    <template v-if="index === breadcrumbs.length - 1">
                    <span class="text-gray-500">{{ breadcrumb.title }}</span>
                    </template>
                    <!-- Otherwise, render as a link -->
                    <template v-else>
                    <Link :href="breadcrumb.url" class="text-gray-700 hover:text-blue-600">
                        {{ breadcrumb.title }}
                    </Link>
                    </template>
                    <!-- Add separator except for the last item -->
                    <span v-if="index < breadcrumbs.length - 1" class="mx-1 text-gray-500">
                    -
                    </span>
                </li>
            </ol>
        </nav>
    </div>
</template>

<script setup lang="ts">
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    breadcrumbs: Array as () => BreadcrumbInterface[]
});
</script>