<template>
    <Navbar></Navbar>
    <Introduction :aboutMe="props?.aboutMe" :cv="props?.cv"></Introduction>
    <AboutMe :aboutMe="props?.aboutMe" :skills="props?.skills"></AboutMe>
    <Experiences :experiences="props?.experiences"></Experiences>
    <Educations :educations="props?.educations"></Educations>
    <Skills :skills="props?.skills"></Skills>
    <Projects :projects="props?.projects"></Projects>
    <Blogs :blogs="props?.blogs" :medium-url="props?.mediumUrl"></Blogs>
    <ContactMe></ContactMe>
    <Footer :aboutMe="props?.aboutMe"></Footer>
</template>

<script setup lang="ts">
import Navbar from '@/Pages/Templates/Classic/Components/Navbar.vue';
import Introduction from '@/Pages/Templates/Classic/Components/Introduction.vue';
import AboutMe from '@/Pages/Templates/Classic/Components/AboutMe.vue';
import Skills from '@/Pages/Templates/Classic/Components/Skills.vue';
import Educations from '@/Pages/Templates/Classic/Components/Educations.vue';
import Projects from '@/Pages/Templates/Classic/Components/Projects.vue';
import Experiences from '@/Pages/Templates/Classic/Components/Experiences.vue';
import Blogs from '@/Pages/Templates/Classic/Components/Blogs.vue';
import ContactMe from '@/Pages/Templates/Classic/Components/ContactMe.vue';
import Footer from '@/Pages/Templates/Classic/Components/Footer.vue';
import { Cv, Education, Experience, Project, Skill, User, Blog } from '@/types/index';

const props = defineProps<{
    aboutMe?: User,
    skills?: Skill[],
    educations?: Education[],
    projects?: Project[],
    experiences?: Experience[],
    cv?: Cv,
    blogs?: Blog[];
    mediumUrl?: string;
}>();
</script>
