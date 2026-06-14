<template>
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 p-5 px-6 shadow-lg">
        <!-- Toolbar: search + per-page selector -->
        <div class="flex flex-col gap-3 mb-4 sm:flex-row sm:items-center sm:justify-between">
            <!-- Search -->
            <div class="relative w-full sm:w-64">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35M11 19a8 8 0 1 1 0-16 8 8 0 0 1 0 16Z" />
                    </svg>
                </div>
                <input v-model="searchQuery" type="text" placeholder="Search..."
                    class="block w-full rounded-lg border border-gray-300 bg-white py-1.5 pl-9 pr-3 text-sm text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400" />
            </div>

            <!-- Show entries -->
            <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                <span>Show</span>
                <select v-model="perPage"
                    class="rounded-lg border border-gray-300 bg-white py-1.5 px-2 text-sm text-gray-900 focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                    <option v-for="opt in perPageOptions" :key="opt" :value="opt">{{ opt }}</option>
                </select>
                <span>entries</span>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-200 dark:border-gray-700">
            <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50 text-xs uppercase text-gray-400 dark:bg-gray-700 dark:text-gray-300">
                    <tr>
                        <th v-for="column in columns" :key="column.key" scope="col" class="px-4 py-3"
                            :class="column.sortable ? 'cursor-pointer select-none' : ''"
                            @click="column.sortable && toggleSort(column.key)">
                            <div class="flex items-center gap-1">
                                {{ column.label }}
                                <span v-if="column.sortable" class="inline-flex flex-col leading-none">
                                    <svg class="h-2.5 w-2.5"
                                        :class="sortKey === column.key && sortDir === 'asc' ? 'text-gray-900 dark:text-white' : 'text-gray-400'"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 4l5 6H5l5-6z" />
                                    </svg>
                                    <svg class="h-2.5 w-2.5 -mt-1"
                                        :class="sortKey === column.key && sortDir === 'desc' ? 'text-gray-900 dark:text-white' : 'text-gray-400'"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 16l-5-6h10l-5 6z" />
                                    </svg>
                                </span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white dark:divide-gray-700 dark:bg-gray-800">
                    <tr v-for="item in paginatedItems" :key="item.id"
                        class="hover:bg-gray-50 dark:hover:bg-gray-700/50">
                        <slot name="row" :item="item" />
                    </tr>

                    <!-- Empty state -->
                    <tr v-if="paginatedItems.length === 0">
                        <td :colspan="columns.length" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                            <slot name="empty">No matching records found.</slot>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination footer -->
        <div class="flex flex-col gap-3 mt-4 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Showing
                <span class="font-medium text-gray-900 dark:text-white">{{ rangeStart }}</span>
                to
                <span class="font-medium text-gray-900 dark:text-white">{{ rangeEnd }}</span>
                of
                <span class="font-medium text-gray-900 dark:text-white">{{ filteredItems.length }}</span>
                entries
            </p>

            <nav v-if="totalPages > 1" class="inline-flex items-center -space-x-px rounded-lg shadow-sm"
                aria-label="Pagination">
                <button @click="goToPage(currentPage - 1)" :disabled="currentPage === 1"
                    class="rounded-l-lg border border-gray-300 bg-white px-2.5 py-1.5 text-sm text-gray-500 hover:bg-gray-100 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                    <span class="sr-only">Previous</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                <button v-for="page in visiblePages" :key="page" @click="goToPage(page)"
                    class="border px-3 py-1.5 text-sm"
                    :class="page === currentPage
                        ? 'border-indigo-500 bg-indigo-50 text-indigo-600 dark:border-indigo-400 dark:bg-gray-700 dark:text-indigo-300'
                        : 'border-gray-300 bg-white text-gray-500 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600'">
                    {{ page }}
                </button>

                <button @click="goToPage(currentPage + 1)" :disabled="currentPage === totalPages"
                    class="rounded-r-lg border border-gray-300 bg-white px-2.5 py-1.5 text-sm text-gray-500 hover:bg-gray-100 disabled:cursor-not-allowed disabled:opacity-50 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                    <span class="sr-only">Next</span>
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </nav>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, computed, watch } from 'vue';

interface Column {
    key: string;
    label: string;
    sortable?: boolean;
}

const props = defineProps<{
    items: any[] | undefined;
    columns: Column[];
    searchKeys?: string[];
    perPageOptions?: number[];
    defaultPerPage?: number;
}>();

const perPageOptions = props.perPageOptions ?? [10, 20, 50, 100];
const perPage = ref(props.defaultPerPage ?? perPageOptions[0]);

const searchQuery = ref('');
const sortKey = ref<string | null>(null);
const sortDir = ref<'asc' | 'desc'>('asc');
const currentPage = ref(1);

// Reset to page 1 whenever search, sort, or page size changes
watch([searchQuery, perPage, sortKey, sortDir], () => {
    currentPage.value = 1;
});

const toggleSort = (key: string) => {
    if (sortKey.value === key) {
        sortDir.value = sortDir.value === 'asc' ? 'desc' : 'asc';
    } else {
        sortKey.value = key;
        sortDir.value = 'asc';
    }
};

const getValue = (item: any, key: string) => {
    return key.split('.').reduce((obj, k) => (obj == null ? undefined : obj[k]), item);
};

const filteredItems = computed(() => {
    const list = props.items ?? [];
    if (!searchQuery.value.trim()) return list;

    const query = searchQuery.value.toLowerCase();
    const keys = props.searchKeys ?? props.columns.map(c => c.key);

    return list.filter(item =>
        keys.some(key => {
            const value = getValue(item, key);
            return value != null && String(value).toLowerCase().includes(query);
        })
    );
});

const sortedItems = computed(() => {
    if (!sortKey.value) return filteredItems.value;

    return [...filteredItems.value].sort((a, b) => {
        const aVal = getValue(a, sortKey.value as string);
        const bVal = getValue(b, sortKey.value as string);

        if (aVal == null) return 1;
        if (bVal == null) return -1;

        let comparison = 0;
        if (typeof aVal === 'number' && typeof bVal === 'number') {
            comparison = aVal - bVal;
        } else {
            comparison = String(aVal).localeCompare(String(bVal));
        }

        return sortDir.value === 'asc' ? comparison : -comparison;
    });
});

const totalPages = computed(() => Math.max(1, Math.ceil(sortedItems.value.length / perPage.value)));

const paginatedItems = computed(() => {
    const start = (currentPage.value - 1) * perPage.value;
    return sortedItems.value.slice(start, start + perPage.value);
});

const rangeStart = computed(() => {
    if (filteredItems.value.length === 0) return 0;
    return (currentPage.value - 1) * perPage.value + 1;
});

const rangeEnd = computed(() => {
    return Math.min(currentPage.value * perPage.value, filteredItems.value.length);
});

const goToPage = (page: number) => {
    if (page < 1 || page > totalPages.value) return;
    currentPage.value = page;
};

// Show up to 5 page buttons, centered around current page
const visiblePages = computed(() => {
    const total = totalPages.value;
    const current = currentPage.value;
    const maxVisible = 5;

    if (total <= maxVisible) {
        return Array.from({ length: total }, (_, i) => i + 1);
    }

    let start = Math.max(1, current - Math.floor(maxVisible / 2));
    let end = start + maxVisible - 1;

    if (end > total) {
        end = total;
        start = end - maxVisible + 1;
    }

    return Array.from({ length: end - start + 1 }, (_, i) => start + i);
});
</script>