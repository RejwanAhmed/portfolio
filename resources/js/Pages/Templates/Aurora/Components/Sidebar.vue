<template>
    <aside class="aurora-sidebar">
        <!-- Profile -->
        <div class="sidebar-profile">
            <div class="avatar-ring">
                <img :src="props?.aboutMe?.landing_image_url" :alt="props?.aboutMe?.name"
                    class="avatar-img" />
            </div>
            <h1 class="sidebar-name">{{ props?.aboutMe?.name }}</h1>
            <p class="sidebar-role">{{ props?.aboutMe?.designation ?? 'Fullstack Developer' }}</p>
        </div>

        <!-- Nav -->
        <nav class="sidebar-nav">
            <a v-for="link in navLinks" :key="link.id"
                :href="`#${link.id}`"
                @click.prevent="scrollTo(link.id)"
                :class="['nav-link', activeSection === link.id ? 'nav-link--active' : '']">
                <component :is="link.icon" class="nav-icon" />
                <span>{{ link.name }}</span>
            </a>
        </nav>

        <!-- Social + CV -->
        <div class="sidebar-footer">
            <div class="social-row">
                <a v-if="props?.aboutMe?.github_url" :href="props?.aboutMe?.github_url"
                    target="_blank" class="social-btn" title="GitHub">
                    <Github class="w-4 h-4" />
                </a>
                <a v-if="props?.aboutMe?.linked_in_url" :href="props?.aboutMe?.linked_in_url"
                    target="_blank" class="social-btn" title="LinkedIn">
                    <Linkedin class="w-4 h-4" />
                </a>
                <a v-if="props?.aboutMe?.email" :href="`mailto:${props?.aboutMe?.email}`"
                    class="social-btn" title="Email">
                    <Mail class="w-4 h-4" />
                </a>
            </div>
            <a v-if="props?.cv?.path" :href="props?.cv?.path" target="_blank" download
                class="cv-btn">
                <Download class="w-4 h-4" />
                Download CV
            </a>
        </div>
    </aside>
</template>

<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';
import {
    Home, User, Briefcase, GraduationCap, Code2,
    FolderOpen, BookOpen, Mail, Github, Linkedin, Download
} from 'lucide-vue-next';
import { User as UserType, Cv } from '@/types/index';

const props = defineProps<{ aboutMe?: UserType, cv?: Cv }>();

const navLinks = [
    { id: 'introduction', name: 'Home',       icon: Home },
    { id: 'about',        name: 'About',       icon: User },
    { id: 'experience',   name: 'Experience',  icon: Briefcase },
    { id: 'education',    name: 'Education',   icon: GraduationCap },
    { id: 'skill',        name: 'Skills',      icon: Code2 },
    { id: 'projects',     name: 'Projects',    icon: FolderOpen },
    { id: 'blogs',        name: 'Blogs',       icon: BookOpen },
    { id: 'contact',      name: 'Contact',     icon: Mail },
];

const activeSection = ref('introduction');

const scrollTo = (id: string) => {
    const el = document.getElementById(id);
    if (el) {
        const y = el.getBoundingClientRect().top + window.pageYOffset - 20;
        window.scrollTo({ top: y, behavior: 'smooth' });
    }
};

const onScroll = () => {
    for (let i = navLinks.length - 1; i >= 0; i--) {
        const el = document.getElementById(navLinks[i].id);
        if (el && el.getBoundingClientRect().top <= 120) {
            activeSection.value = navLinks[i].id;
            return;
        }
    }
    activeSection.value = 'introduction';
};

onMounted(() => window.addEventListener('scroll', onScroll, { passive: true }));
onUnmounted(() => window.removeEventListener('scroll', onScroll));
</script>

<style scoped>
.aurora-sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 280px;
    height: 100vh;
    background: #161B22;
    border-right: 1px solid #30363D;
    display: flex;
    flex-direction: column;
    padding: 2rem 1.5rem;
    overflow-y: auto;
    z-index: 40;
}

@media (max-width: 768px) {
    .aurora-sidebar { display: none; }
}

.sidebar-profile {
    text-align: center;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #30363D;
    margin-bottom: 1.5rem;
}

.avatar-ring {
    display: inline-block;
    padding: 3px;
    border-radius: 50%;
    background: linear-gradient(135deg, #A855F7, #06B6D4);
    margin-bottom: 1rem;
}

.avatar-img {
    width: 88px;
    height: 88px;
    border-radius: 50%;
    object-fit: cover;
    display: block;
    border: 3px solid #161B22;
}

.sidebar-name {
    font-size: 1rem;
    font-weight: 700;
    color: #F0F6FC;
    margin-bottom: 0.25rem;
}

.sidebar-role {
    font-size: 0.75rem;
    color: #8B949E;
    background: linear-gradient(90deg, #A855F7, #06B6D4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 500;
}

.sidebar-nav {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.nav-link {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.6rem 0.75rem;
    border-radius: 8px;
    font-size: 0.875rem;
    color: #8B949E;
    text-decoration: none;
    transition: all 0.15s ease;
}

.nav-link:hover {
    background: #21262D;
    color: #F0F6FC;
}

.nav-link--active {
    background: linear-gradient(90deg, rgba(168,85,247,0.15), rgba(6,182,212,0.1));
    color: #F0F6FC;
    border-left: 2px solid #A855F7;
}

.nav-icon {
    width: 16px;
    height: 16px;
    flex-shrink: 0;
}

.sidebar-footer {
    padding-top: 1.5rem;
    border-top: 1px solid #30363D;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.social-row {
    display: flex;
    justify-content: center;
    gap: 0.75rem;
}

.social-btn {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: #21262D;
    border: 1px solid #30363D;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8B949E;
    transition: all 0.15s ease;
    text-decoration: none;
}

.social-btn:hover {
    background: #30363D;
    color: #A855F7;
    border-color: #A855F7;
}

.cv-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    padding: 0.6rem 1rem;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 600;
    color: #F0F6FC;
    background: linear-gradient(90deg, #A855F7, #06B6D4);
    text-decoration: none;
    transition: opacity 0.15s ease;
}

.cv-btn:hover { opacity: 0.85; }
</style>
