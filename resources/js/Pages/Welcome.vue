<template>
    <Navbar></Navbar>
    <Introduction :aboutMe="props?.aboutMe" :cv="props?.cv"></Introduction>
    <AboutMe :aboutMe="props?.aboutMe" :skills="props?.skills"></AboutMe>
    <Experiences :experiences="props?.experiences"></Experiences>
    <Educations :educations="props?.educations"></Educations>
    <Skills :skills="props?.skills"></Skills>
    <Projects :projects="props?.projects"></Projects>
    <ContactMe></ContactMe>
    <Footer :aboutMe="props?.aboutMe"></Footer>
</template>

<script setup lang="ts">
import Navbar from '@/Pages/Front/Navbar.vue';
import Introduction from '@/Pages/Front/Introduction.vue';
import AboutMe from '@/Pages/Front/AboutMe.vue';
import Skills from '@/Pages/Front/Skills.vue';
import Educations from '@/Pages/Front/Educations.vue';
import Projects from '@/Pages/Front/Projects.vue';
import Experiences from '@/Pages/Front/Experiences.vue';
import ContactMe from '@/Pages/Front/ContactMe.vue';
import Footer from '@/Pages/Front/Footer.vue';
import { Cv, Education, Experience, Project, Skill, User } from '@/types/index';

const props = defineProps<{
    aboutMe?: User,
    skills?: Skill[],
    educations?: Education[],
    projects?: Project[],
    experiences?: Experience[],
    cv?: Cv,
}>();
</script>
