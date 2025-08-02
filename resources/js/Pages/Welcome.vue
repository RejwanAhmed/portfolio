<template>

    <Navbar></Navbar>
    <Introduction :aboutMe="props?.aboutMe"></Introduction>
    <AboutMe :aboutMe="props?.aboutMe" :skills="props?.skills"></AboutMe>
    <Experience :experiences="props?.experiences"></Experience>
    <Education :educations="props?.educations"></Education>
    <Skills :skills="props?.skills"></Skills>
    <Projects :projects="props?.projects"></Projects>
    <ContactMe></ContactMe>
    <Footer :aboutMe="props?.aboutMe"></Footer>
</template>

<script setup>
import Navbar from '@/Pages/Front/Navbar.vue';
import Introduction from '@/Pages/Front/Introduction.vue';
import AboutMe from '@/Pages/Front/AboutMe.vue';
import Skills from '@/Pages/Front/Skills.vue';
import Education from '@/Pages/Front/Education.vue';
import Projects from '@/Pages/Front/Projects.vue';
import Experience from '@/Pages/Front/Experience.vue';
import ContactMe from '@/Pages/Front/ContactMe.vue';
import Footer from '@/Pages/Front/Footer.vue';

const props = defineProps({
    aboutMe: Object,
    skills: Object,
    educations: Object,
    projects: Object,
    experiences: Object,
});
</script>
