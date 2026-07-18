<template>
    <section v-if="props?.projects?.length" id="projects" class="aurora-section">
        <div class="section-label">Projects</div>
        <h2 class="section-title">Things I've Built</h2>

        <div class="projects-grid">
            <div v-for="(project, index) in props?.projects" :key="index"
                class="project-card" @click="openModal(index)">

                <div class="project-thumb">
                    <img :src="project.project_images?.[0]?.image_url" :alt="project.name"
                        class="thumb-img" />
                    <div class="thumb-overlay">
                        <Eye class="w-6 h-6" />
                    </div>
                </div>

                <div class="project-body">
                    <h3 class="project-name">{{ project.name }}</h3>
                    <p class="project-desc">{{ project.description?.substring(0, 80) }}{{ (project.description?.length ?? 0) > 80 ? '…' : '' }}</p>
                    <div class="project-tags">
                        <span v-for="(skill, i) in project.skills?.slice(0, 4)" :key="i"
                            class="project-tag" :style="{ color: skill.color, borderColor: skill.color + '44' }">
                            {{ skill.name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <Teleport to="body">
            <transition name="fade">
                <div v-if="isModalOpen" class="modal-backdrop" @click.self="closeModal">
                    <div class="modal-box">
                        <div class="modal-header">
                            <h2 class="modal-title">{{ activeProject?.name }}</h2>
                            <button @click="closeModal" class="modal-close">&times;</button>
                        </div>

                        <Swiper :modules="[Navigation, Pagination]"
                            :pagination="(swiperPagination as any)"
                            :navigation="(true as any)"
                            class="modal-swiper">
                            <SwiperSlide v-for="(img, i) in activeProject?.project_images" :key="i">
                                <img :src="img.image_url" alt="" class="swiper-img" />
                            </SwiperSlide>
                        </Swiper>

                        <div class="modal-body">
                            <p class="modal-date">
                                {{ formatDate(activeProject?.start_date) }} – {{ formatDate(activeProject?.end_date) }}
                            </p>
                            <p class="modal-desc">{{ activeProject?.description }}</p>

                            <div class="modal-tags">
                                <span v-for="(skill, i) in activeProject?.skills" :key="i"
                                    class="project-tag" :style="{ color: skill.color, borderColor: skill.color + '44' }">
                                    {{ skill.name }}
                                </span>
                            </div>

                            <div class="modal-links">
                                <a v-if="activeProject?.github_url" :href="activeProject.github_url"
                                    target="_blank" class="modal-link modal-link--ghost">
                                    <Github class="w-4 h-4" /> GitHub
                                </a>
                                <a v-if="activeProject?.live_link_url" :href="activeProject.live_link_url"
                                    target="_blank" class="modal-link modal-link--primary">
                                    <ExternalLink class="w-4 h-4" /> Live Site
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </transition>
        </Teleport>
    </section>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import { Eye, Github, ExternalLink } from 'lucide-vue-next';
import { Swiper, SwiperSlide } from 'swiper/vue';
import { Navigation, Pagination } from 'swiper/modules';
import type { PaginationOptions } from 'swiper/types';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import { Project } from '@/types/index';

const props = defineProps<{ projects?: Project[] }>();

const isModalOpen = ref(false);
const activeIndex = ref(0);
const openModal = (i: number) => { activeIndex.value = i; isModalOpen.value = true; };
const closeModal = () => { isModalOpen.value = false; };
const activeProject = computed(() => props.projects?.[activeIndex.value]);
const formatDate = (d?: string) => d ? new Date(d).toLocaleDateString('en-US', { month: 'short', year: 'numeric' }) : '';
const swiperPagination: PaginationOptions = { clickable: true, dynamicBullets: true };
</script>

<style scoped>
.aurora-section {
    padding: 4rem 3rem;
    border-bottom: 1px solid #30363D;
}

@media (max-width: 768px) { .aurora-section { padding: 2.5rem 1.5rem; } }

.section-label {
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: #A855F7;
    margin-bottom: 0.5rem;
}

.section-title {
    font-size: 1.75rem;
    font-weight: 800;
    color: #F0F6FC;
    margin-bottom: 2rem;
}

.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.25rem;
}

.project-card {
    background: #161B22;
    border: 1px solid #30363D;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    transition: border-color 0.15s ease, transform 0.15s ease;
}

.project-card:hover {
    border-color: #A855F755;
    transform: translateY(-3px);
}

.project-thumb {
    position: relative;
    height: 160px;
    overflow: hidden;
}

.thumb-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.project-card:hover .thumb-img { transform: scale(1.04); }

.thumb-overlay {
    position: absolute;
    inset: 0;
    background: rgba(168,85,247,0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    opacity: 0;
    transition: opacity 0.2s ease;
}

.project-card:hover .thumb-overlay { opacity: 1; }

.project-body {
    padding: 1.25rem;
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.project-name {
    font-size: 0.95rem;
    font-weight: 700;
    color: #F0F6FC;
}

.project-desc {
    font-size: 0.8rem;
    color: #8B949E;
    line-height: 1.5;
}

.project-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.4rem;
    margin-top: 0.25rem;
}

.project-tag {
    font-size: 0.68rem;
    font-weight: 600;
    padding: 0.2rem 0.55rem;
    border-radius: 100px;
    border: 1px solid;
    background: transparent;
}

/* Modal */
.modal-backdrop {
    position: fixed;
    inset: 0;
    z-index: 50;
    background: rgba(0,0,0,0.75);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1.5rem;
}

.modal-box {
    background: #161B22;
    border: 1px solid #30363D;
    border-radius: 16px;
    width: 100%;
    max-width: 680px;
    max-height: 90vh;
    overflow-y: auto;
}

.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 1.25rem 1.5rem;
    border-bottom: 1px solid #30363D;
}

.modal-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #F0F6FC;
}

.modal-close {
    font-size: 1.5rem;
    line-height: 1;
    color: #8B949E;
    background: none;
    border: none;
    cursor: pointer;
    transition: color 0.15s;
}

.modal-close:hover { color: #F0F6FC; }

.modal-swiper { margin: 1rem 1.5rem 0; border-radius: 10px; overflow: hidden; }

.swiper-img { width: 100%; height: 240px; object-fit: cover; }

.modal-body {
    padding: 1.25rem 1.5rem 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
}

.modal-date { font-size: 0.75rem; color: #8B949E; }
.modal-desc { font-size: 0.875rem; color: #8B949E; line-height: 1.7; }

.modal-tags { display: flex; flex-wrap: wrap; gap: 0.4rem; }

.modal-links {
    display: flex;
    gap: 0.75rem;
    padding-top: 0.5rem;
}

.modal-link {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.8rem;
    font-weight: 600;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    text-decoration: none;
    transition: opacity 0.15s;
}

.modal-link--primary {
    background: linear-gradient(90deg, #A855F7, #06B6D4);
    color: white;
}

.modal-link--ghost {
    border: 1px solid #30363D;
    color: #F0F6FC;
    background: transparent;
}

.modal-link--ghost:hover { border-color: #A855F7; background: rgba(168,85,247,0.08); }
.modal-link--primary:hover { opacity: 0.85; }

.fade-enter-active, .fade-leave-active { transition: opacity 0.2s ease; }
.fade-enter-from, .fade-leave-to { opacity: 0; }
</style>
