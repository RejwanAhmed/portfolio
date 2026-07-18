<template></template>

<script setup lang="ts">
import toastr from 'toastr';
import 'toastr/toastr.scss';
import { usePage, router } from '@inertiajs/vue3';
import { watch, onMounted } from 'vue';

toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: 'toast-top-right',
    preventDuplicates: true,
    showDuration: 300,
    hideDuration: 1000,
    timeOut: 5000,
    extendedTimeOut: 1000,
    showEasing: 'swing',
    hideEasing: 'linear',
    showMethod: 'fadeIn',
    hideMethod: 'fadeOut',
};

const page = usePage();

const showFlash = () => {
    const flash = page.props.flash as { success?: string; error?: string } | null;
    if (!flash) return;

    if (flash.success) {
        toastr.success(flash.success);
    } else if (flash.error) {
        toastr.error(flash.error);
    }
};

// fire on initial load
onMounted(() => {
    showFlash();
});

// fire on every Inertia navigation (including back/forward)
router.on('finish', () => {
    // only show if it came from a real server response, not a cache restore
    if (page.props.flash) {
        showFlash();
    }
});
</script>