<template>
    <button @click="showDeleteConfirmation" class = "text-red-700 hover:text-red-300 transition duration-200 ease-in-out text-[16px]" title="Delete">
        <i class="bi bi-trash"></i>
    </button>
</template>

<script setup>
import { defineProps } from 'vue';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    obj: Object,
    confirmRoute: String,
});

const showDeleteConfirmation = async () => {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    const name = props.obj?.name ? props.obj?.name : (props.obj?.company_name ?? props.obj?.title);
    const result = await swalWithBootstrapButtons.fire({
        title: `Are you sure want to delete ${name}?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: `<span class="text-white">Confirm</span>`,
        cancelButtonText: `<span class="text-white">Cancel</span>`,
        reverseButtons: true,
        buttonsStyling: true,
        customClass: {
            confirmButton: 'bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded',
            cancelButton: 'bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded'
        }
    });

    if(result.isConfirmed) {
        Swal.fire({
            title: `Please Wait...`,
            timer: 1000,
                didOpen: () => {
                Swal.showLoading();
            }
        });

        router.visit(route(props.confirmRoute, props.obj?.id), {
            method: 'delete',
            data: {},
            replace: true,
            preserveScroll: true
        });
    }
}
</script>