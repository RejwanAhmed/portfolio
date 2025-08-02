<template>
    <section id="projects" class="bg-gray-950 text-white py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-yellow-400 text-center mb-12">
                Projects
            </h2>

            <!-- Projects Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <div v-for="(project, index) in projects" :key="index" @click="openModal(index)"
                    class="cursor-pointer group">
                    <div
                        class="relative overflow-hidden rounded-xl shadow-lg transition-transform group-hover:scale-105">
                        <img :src="project.project_images[0].image_url" alt="Project thumbnail" class="w-full h-52" />
                        <div
                            class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="text-white text-lg font-medium">View Details</span>
                        </div>
                    </div>
                    <h3 class="mt-3 text-xl font-semibold text-white group-hover:text-yellow-300">
                        {{ project.name }}
                    </h3>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <transition name="fade">
            <div v-if="isModalOpen"
                class="fixed inset-0 z-50 bg-black bg-opacity-80 flex items-center justify-center px-4">
                <div
                    class="bg-gray-900 p-6 rounded-xl w-full max-w-4xl relative overflow-y-auto max-h-[90vh] animate-slide-up">
                    <!-- Close button -->
                    <button @click="closeModal" class="absolute top-0 right-4 hover:text-red-400 text-5xl">
                        &times;
                    </button>
                    <!-- Swiper Image Slider -->
                    <Swiper :modules="[Navigation, Pagination]" :pagination="swiperPagination" :navigation="true"
                        class="rounded-lg mb-6 mt-5">
                        <SwiperSlide v-for="(img, i) in activeProject.project_images" :key="i">
                            <img :src="img.image_url" alt="Project Image"
                                class="w-full h-80 rounded-xl cursor-zoom-in" />
                        </SwiperSlide>
                    </Swiper>

                    <!-- Project Details -->
                    <div class="text-white space-y-3">
                        <h2 class="text-2xl font-bold">
                            {{ activeProject.name }}
                        </h2>
                        <p class="text-sm text-gray-400">
                            Duration:
                            {{ formatDate(activeProject.start_date) }} –
                            {{ formatDate(activeProject.end_date) }}
                        </p>
                        <p class="text-gray-300">
                            {{ activeProject.description }}
                        </p>

                        <div class="flex flex-wrap gap-2 mt-2">
                            <span v-for="(skill, index) in activeProject.skills" :key="index"
                                class="bg-gray-700 text-xs px-2 py-1 rounded" :style="{ color: skill.color }">{{
                                    skill.name }}</span>
                        </div>

                        <div class="space-x-4 mt-4">
                            <a v-if="activeProject.github_url" :href="activeProject.github_url" target="_blank"
                                class="text-blue-400 hover:underline">
                                GitHub
                            </a>
                            <a v-if="activeProject.live_link_url" :href="activeProject.live_link_url" target="_blank"
                                class="text-green-400 hover:underline">
                                Live Site
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </section>
</template>

<script setup>
import { ref, computed } from "vue";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation, Pagination } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";

const props = defineProps({
    projects: Object,
});

const isModalOpen = ref(false);
const activeIndex = ref(0);

const openModal = (index) => {
    console.log(index);
    activeIndex.value = index;
    isModalOpen.value = true;
};

const closeModal = () => {
    isModalOpen.value = false;
};

const activeProject = computed(() => props?.projects[activeIndex.value]);

const formatDate = (date) => {
    return new Date(date).toLocaleDateString("en-US", {
        month: "short",
        year: "numeric",
    });
};

const swiperPagination = {
    clickable: true,
    dynamicBullets: true,
};
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

@keyframes slide-up {
    from {
        transform: translateY(40px);
        opacity: 0;
    }

    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.animate-slide-up {
    animation: slide-up 0.3s ease-out;
}
</style>
