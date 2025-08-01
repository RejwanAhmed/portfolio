<template>
    <nav class="bg-black text-white fixed w-full z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo or Name -->
                <div class="flex-shrink-0 text-xl font-bold">
                    Md. <span class="font-bold text-yellow-400">Rejwan</span> Ahmed
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-6">
                    <a href="#introduction" @click.prevent="scrollToSection('introduction')"
                        class="hover:text-yellow-400 transition">Home</a>
                    <a href="#about" @click.prevent="scrollToSection('about')"
                        class="hover:text-yellow-400 transition">About</a>
                    <a href="#experience" @click.prevent="scrollToSection('experience')"
                        class="hover:text-yellow-400 transition">Experience</a>
                    <a href="#education" @click.prevent="scrollToSection('education')"
                        class="hover:text-yellow-400 transition">Education</a>
                    <a href="#skill" @click.prevent="scrollToSection('skill')"
                        class="hover:text-yellow-400 transition">Skill</a>
                    <a href="#projects" @click.prevent="scrollToSection('projects')"
                        class="hover:text-yellow-400 transition">Projects</a>
                    <a href="#contact" @click.prevent="scrollToSection('contact')"
                        class="hover:text-yellow-400 transition">Contact</a>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button @click="toggleMenu" class="focus:outline-none">
                        <svg v-if="!isOpen" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg v-else class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div v-if="isOpen" class="md:hidden px-4 pb-4 space-y-2">
            <a href="#introduction" @click.prevent="scrollToSection('introduction')"
                class="block hover:text-yellow-400 transition">Home</a>
            <a href="#about" @click.prevent="scrollToSection('about')"
                class="block hover:text-yellow-400 transition">About</a>
            <a href="#experience" @click.prevent="scrollToSection('experience')"
                class="block hover:text-yellow-400 transition">Experience</a>
            <a href="#education" @click.prevent="scrollToSection('education')"
                class="block hover:text-yellow-400 transition">Education</a>
            <a href="#skill" @click.prevent="scrollToSection('skill')"
                class="block hover:text-yellow-400 transition">Skill</a>
            <a href="#projects" @click.prevent="scrollToSection('projects')"
                class="block hover:text-yellow-400 transition">Projects</a>
            <a href="#contact" @click.prevent="scrollToSection('contact')"
                class="block hover:text-yellow-400 transition">Contact</a>
        </div>
    </nav>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const isOpen = ref(false);
const toggleMenu = () => {
    isOpen.value = !isOpen.value;
};

const scrollToSection = (id: string) => {
    const el = document.getElementById(id);
    if (el) {
        const yOffset = -64; // adjust based on your navbar height
        const y = el.getBoundingClientRect().top + window.pageYOffset + yOffset;
        window.scrollTo({ top: y, behavior: 'smooth' });
    }
};
</script>