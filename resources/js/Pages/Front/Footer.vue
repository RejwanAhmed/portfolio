<template>
    <footer class="bg-gradient-to-br from-gray-950 to-gray-900 text-white pt-16 pb-10">
        <div class="max-w-7xl mx-auto px-4">
            <!-- Grid: Brand / Nav / Contact -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 border-b border-gray-800 pb-10">
                <!-- Left: Brand (Vertically centered) -->
                <div class="flex flex-col justify-center text-center md:text-left space-y-3">
                    <h3 class="text-3xl font-bold tracking-tight">
                        Md. <span class="text-yellow-400">Rejwan</span> Ahmed
                    </h3>
                    <p v-html="props?.aboutMe.short_description" class="text-sm text-gray-400 leading-relaxed"></p>
                </div>

                <!-- Center: Navigation (Vertically centered) -->
                <nav class="flex flex-col justify-center">
                    <div class="flex flex-wrap justify-center md:justify-center gap-4 text-sm text-gray-400">
                        <a v-for="link in navLinks" :key="link.id" :href="`#${link.id}`"
                            @click.prevent="scrollToSection(link.id)"
                            class="hover:text-yellow-400 transition duration-300">
                            {{ link.name }}
                        </a>
                    </div>
                </nav>

                <!-- Right: Contact Info -->
                <div class="text-center md:text-right text-sm text-gray-400 space-y-3">
                    <div class="flex items-center justify-center md:justify-end gap-2">
                        <Home class="w-4 h-4 text-yellow-400" />
                        <span>{{ props?.aboutMe.address }}</span>
                    </div>
                    <div class="flex items-center justify-center md:justify-end gap-2">
                        <Phone class="w-4 h-4 text-yellow-400" />
                        <span>{{ props?.aboutMe.phone }}</span>
                    </div>
                    <div class="flex items-center justify-center md:justify-end gap-2">
                        <Mail class="w-4 h-4 text-yellow-400" />
                        <span>{{ props?.aboutMe.email }}</span>
                    </div>
                    <div class="flex items-center justify-center md:justify-end gap-2">
                        <Linkedin class="w-4 h-4 text-yellow-400" />
                        <a :href="props?.aboutMe.linked_in_url" target="_blank"
                            class="text-blue-400 hover:underline break-all"> Visit Linked In</a>
                    </div>
                    <div class="flex items-center justify-center md:justify-end gap-2">
                        <Github class="w-4 h-4 text-yellow-400" />
                        <a :href="props?.aboutMe.github_url" target="_blank"
                            class="text-blue-400 hover:underline break-all">Visit Ahmed Github</a>
                    </div>
                </div>
            </div>

            <!-- Bottom: Copyright -->
            <div class="text-center text-gray-500 text-sm pt-6">
                &copy; {{ new Date().getFullYear() }} Md. Rejwan Ahmed. All
                rights reserved.
            </div>
        </div>
    </footer>
</template>

<script setup lang="ts">
import { Home, Phone, Mail, Linkedin, Github } from "lucide-vue-next";

const props = defineProps({
    aboutMe: Object,
});

const scrollToSection = (id: string) => {
    const el = document.getElementById(id);
    if (el) {
        const yOffset = -64;
        const y = el.getBoundingClientRect().top + window.pageYOffset + yOffset;
        window.scrollTo({ top: y, behavior: "smooth" });
    }
};

const navLinks = [
    { id: "introduction", name: "Home" },
    { id: "about", name: "About" },
    { id: "experience", name: "Experience" },
    { id: "education", name: "Education" },
    { id: "skill", name: "Skill" },
    { id: "projects", name: "Projects" },
    { id: "contact", name: "Contact" },
];
</script>
