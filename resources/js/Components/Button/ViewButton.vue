<template>
    <Link class = "text-blue-700 hover:text-blue-300 transition duration-200 ease-in-out text-[16px]" :href="route(props?.redirectionRoute, props.obj?.id)" title="View">
        <i class="bi bi-eye"></i>
    </Link>
</template>

<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { Identifiable } from '@/types/index';
const props = defineProps<{
    obj?: Identifiable,
    redirectionRoute: string
}>();
</script>