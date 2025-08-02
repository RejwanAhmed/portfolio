<template>
    <section id="introduction" class="bg-black text-white py-20">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Left: Profile Image -->
            <div class="flex justify-center">
                <img :src="props?.aboutMe.landing_image_url" alt="Profile"
                    class="rounded-3xl w-81 h-81 object-cover shadow-xl ring-4 ring-gray-800" />
            </div>

            <!-- Right: Contact Info -->
            <div class="space-y-10">
                <div class="text-center md:text-left">
                    <h1 class="text-2xl md:text-3xl text-gray-400 mb-2">Hello, this is</h1>
                    <h2 class="text-5xl md:text-6xl font-extrabold text-white">Md. <span
                            class="font-bold text-yellow-400">Rejwan</span> Ahmed</h2>
                    <p class="text-lg md:text-xl text-gray-300 mt-3 font-medium">
                        <span id="typewriter"
                            class="text-yellow-400 border-r-2 border-yellow-400 animate-pulse pr-1"></span>
                    </p>
                </div>

                <ul class="space-y-3 text-base md:text-lg">
                    <li class="flex items-center gap-4">
                        <Home class="w-6 h-6 text-gray-400" />
                        <span>{{ props?.aboutMe.address }}</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <Phone class="w-6 h-6 text-gray-400" />
                        <span>{{ props?.aboutMe.phone }}</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <Mail class="w-6 h-6 text-gray-400" />
                        <span>{{ props?.aboutMe.email }}</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <Linkedin class="w-6 h-6 text-gray-400" />
                        <a :href="props?.aboutMe.linked_in_url" target="_blank"
                            class="text-blue-400 hover:underline">
                            {{ props?.aboutMe.linked_in_url }}
                        </a>
                    </li>
                    <li class="flex items-center gap-4">
                        <Github class="w-6 h-6 text-gray-400" />
                        <a :href="props?.aboutMe.github_url" target="_blank" class="text-blue-400 hover:underline">
                            {{ props?.aboutMe.github_url }}
                        </a>
                    </li>
                </ul>

                <div class="mt-4" v-if="props?.cv">
                    <a :href="props?.cv.path" target="_blank" download class="bg-yellow-400 text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-300 transition">
                        Download CV
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { Home, Phone, Mail, Linkedin, Github } from 'lucide-vue-next';
const props = defineProps({
    aboutMe: Object,
    cv: Object,
});
const isOpen = ref(false);
const toggleMenu = () => {
    isOpen.value = !isOpen.value;
};

const textArray = ["Laravel || Vue || Fullstack Developer"];
let i = 0;
let j = 0;
let currentText = "";
let isDeleting = false;
const speed = 80;
const pause = 1500; // pause before deleting

function type() {
    const target = document.getElementById("typewriter");

    if (!isDeleting && j <= textArray[i].length) {
        currentText = textArray[i].substring(0, j++);
        target.innerHTML = currentText;
        setTimeout(type, speed);
    } else if (isDeleting && j >= 0) {
        currentText = textArray[i].substring(0, j--);
        target.innerHTML = currentText;
        setTimeout(type, speed / 2);
    } else {
        isDeleting = !isDeleting;
        setTimeout(type, pause);
    }
}

window.onload = type;
</script>

<style scoped>
/* Optional: Smooth transition for mobile dropdown */
.typewriter {
    display: inline-block;
    overflow: hidden;
    border-right: .15em solid yellow;
    white-space: nowrap;
    animation: typing 3s steps(40, end), blink .75s step-end infinite;
}

@keyframes typing {
    from {
        width: 0
    }

    to {
        width: 100%
    }
}

@keyframes blink {
    50% {
        border-color: transparent
    }
}
</style>