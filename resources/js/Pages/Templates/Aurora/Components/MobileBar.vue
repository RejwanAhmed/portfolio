<template>
    <div class="mobile-bar">
        <div class="mobile-bar-inner">
            <span class="mobile-name">{{ props?.aboutMe?.name }}</span>
            <button @click="isOpen = !isOpen" class="mobile-toggle">
                <Menu v-if="!isOpen" class="w-5 h-5" />
                <X v-else class="w-5 h-5" />
            </button>
        </div>

        <!-- Drawer -->
        <transition name="drawer">
            <div v-if="isOpen" class="mobile-drawer">
                <a v-for="link in navLinks" :key="link.id"
                    :href="`#${link.id}`"
                    @click.prevent="scrollTo(link.id)"
                    class="drawer-link">
                    {{ link.name }}
                </a>
            </div>
        </transition>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { Menu, X } from 'lucide-vue-next';
import { User } from '@/types/index';

const props = defineProps<{ aboutMe?: User }>();
const isOpen = ref(false);

const navLinks = [
    { id: 'introduction', name: 'Home' },
    { id: 'about',        name: 'About' },
    { id: 'experience',   name: 'Experience' },
    { id: 'education',    name: 'Education' },
    { id: 'skill',        name: 'Skills' },
    { id: 'projects',     name: 'Projects' },
    { id: 'blogs',        name: 'Blogs' },
    { id: 'contact',      name: 'Contact' },
];

const scrollTo = (id: string) => {
    isOpen.value = false;
    const el = document.getElementById(id);
    if (el) {
        const y = el.getBoundingClientRect().top + window.pageYOffset - 60;
        window.scrollTo({ top: y, behavior: 'smooth' });
    }
};
</script>

<style scoped>
.mobile-bar {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 50;
    background: #161B22;
    border-bottom: 1px solid #30363D;
}

@media (max-width: 768px) {
    .mobile-bar { display: block; }
}

.mobile-bar-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1.25rem;
    height: 60px;
}

.mobile-name {
    font-size: 0.95rem;
    font-weight: 700;
    color: #F0F6FC;
}

.mobile-toggle {
    color: #8B949E;
    background: none;
    border: none;
    cursor: pointer;
    padding: 0.25rem;
}

.mobile-drawer {
    background: #161B22;
    border-top: 1px solid #30363D;
    padding: 0.75rem 1.25rem 1.25rem;
    display: flex;
    flex-direction: column;
    gap: 0.25rem;
}

.drawer-link {
    padding: 0.6rem 0.75rem;
    border-radius: 8px;
    font-size: 0.875rem;
    color: #8B949E;
    text-decoration: none;
    transition: all 0.15s ease;
}

.drawer-link:hover {
    background: #21262D;
    color: #F0F6FC;
}

.drawer-enter-active, .drawer-leave-active { transition: opacity 0.15s ease, transform 0.15s ease; }
.drawer-enter-from, .drawer-leave-to { opacity: 0; transform: translateY(-8px); }
</style>
