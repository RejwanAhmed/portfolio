<template>
    <div class="aurora-root">
        <!-- Sidebar (desktop) -->
        <Sidebar :aboutMe="props?.aboutMe" :cv="props?.cv" />

        <!-- Mobile top bar -->
        <MobileBar :aboutMe="props?.aboutMe" />

        <!-- Main scrollable content -->
        <main class="aurora-main">
            <Introduction :aboutMe="props?.aboutMe" :cv="props?.cv" />
            <AboutMe :aboutMe="props?.aboutMe" :skills="props?.skills" />
            <Experiences :experiences="props?.experiences" />
            <Educations :educations="props?.educations" />
            <Skills :skills="props?.skills" />
            <Projects :projects="props?.projects" />
            <Blogs :blogs="props?.blogs" :medium-url="props?.mediumUrl" />
            <ContactMe />
            <Footer :aboutMe="props?.aboutMe" />
        </main>
    </div>
</template>

<script setup lang="ts">
import Sidebar from '@/Pages/Templates/Aurora/Components/Sidebar.vue';
import MobileBar from '@/Pages/Templates/Aurora/Components/MobileBar.vue';
import Introduction from '@/Pages/Templates/Aurora/Components/Introduction.vue';
import AboutMe from '@/Pages/Templates/Aurora/Components/AboutMe.vue';
import Skills from '@/Pages/Templates/Aurora/Components/Skills.vue';
import Educations from '@/Pages/Templates/Aurora/Components/Educations.vue';
import Projects from '@/Pages/Templates/Aurora/Components/Projects.vue';
import Experiences from '@/Pages/Templates/Aurora/Components/Experiences.vue';
import Blogs from '@/Pages/Templates/Aurora/Components/Blogs.vue';
import ContactMe from '@/Pages/Templates/Aurora/Components/ContactMe.vue';
import Footer from '@/Pages/Templates/Aurora/Components/Footer.vue';
import { Cv, Education, Experience, Project, Skill, User, Blog } from '@/types/index';

const props = defineProps<{
    aboutMe?: User,
    skills?: Skill[],
    educations?: Education[],
    projects?: Project[],
    experiences?: Experience[],
    cv?: Cv,
    blogs?: Blog[],
    mediumUrl?: string,
}>();
</script>

<style>
.aurora-root {
    display: flex;
    min-height: 100vh;
    background-color: #0D1117;
    color: #F0F6FC;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
}

.aurora-main {
    margin-left: 280px;
    flex: 1;
    min-height: 100vh;
}

@media (max-width: 768px) {
    .aurora-main {
        margin-left: 0;
        padding-top: 60px;
    }
}
</style>
