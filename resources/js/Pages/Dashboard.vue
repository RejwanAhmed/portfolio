<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout :pageTitle="props?.pageTitle" :breadcrumbs="props?.breadcrumbs">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">Dashboard</h2>
        </template>

        <div class="">
            <div class="mx-auto ">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="(card, index) in cards" :key="index" @click="goTo(card.route)"
                        class="cursor-pointer rounded-xl p-6 shadow hover:shadow-lg transition duration-300"
                        :class="card.color">
                        <div class="flex items-center gap-4">
                            <component :is="card.icon" class="w-8 h-8 text-gray-800" />
                            <div>
                                <h3 class="text-xl font-bold text-gray-800">{{ card.title }}</h3>
                                <p class="text-sm text-gray-600">{{ card.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head, router } from '@inertiajs/vue3'
import { Briefcase, Book, Code, FileText, Layers } from 'lucide-vue-next'
import { BreadcrumbInterface } from '@/Core/helpers/Interfaces';

const props = defineProps({
    breadcrumbs: Array as () => BreadcrumbInterface[],
    pageTitle: String,
})

const cards = [
    {
        title: 'Projects',
        description: 'Manage your portfolio projects',
        icon: Layers,
        color: 'bg-blue-100',
        route: 'projects.index',
    },
    {
        title: 'Skills',
        description: 'Update your tech stack',
        icon: Code,
        color: 'bg-green-100',
        route: 'skills.index',
    },
    {
        title: 'Experience',
        description: 'Add or edit work history',
        icon: Briefcase,
        color: 'bg-yellow-100',
        route: 'experiences.index',
    },
    {
        title: 'Education',
        description: 'Add academic background',
        icon: Book,
        color: 'bg-purple-100',
        route: 'educations.index',
    },
    {
        title: 'CV',
        description: 'Upload and manage your CV',
        icon: FileText,
        color: 'bg-pink-100',
        route: 'cvs.index',
    },
]

const goTo = (routeName) => {
    router.visit(route(routeName))
}
</script>
