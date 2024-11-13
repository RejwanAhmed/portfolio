<template>
    <Link class = "text-blue-700 hover:text-blue-300 transition duration-200 ease-in-out text-[16px]" :href="route(props?.redirectionRoute, props.obj?.id)" title="Edit">
        <i class="bi bi-pencil-square"></i>
    </Link>
</template>

<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    obj: Object,
    redirectionRoute: String
});
</script>