<template>
    <section id="about" class="bg-gray-950 text-white py-20">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Left: Text Content -->
            <div class="space-y-6">
                <h2 class="text-4xl md:text-5xl font-bold text-yellow-400">About Me</h2>
                <div v-html="props?.aboutMe.long_description"></div>
                <div>
                    <h3 class="text-xl font-semibold text-white mb-2">Tech Stack:</h3>
                    <div class="flex flex-wrap gap-3">
                        <span v-for="skill in props?.skills" class="bg-gray-800 text-sm px-3 py-1 rounded-full"
                            :style="{ color: skill.color }">{{ skill.name }}</span>
                    </div>
                </div>
            </div>

            <!-- Right: Image or Card -->
            <div class="flex justify-center md:justify-end">
                <div class="bg-gray-900 p-6 rounded-3xl shadow-xl ring-4 ring-gray-800 max-w-sm">
                    <img :src="props?.aboutMe.about_me_image_url" alt="Rejwan"
                        class="w-full h-80 object-cover rounded-2xl shadow-md" />
                    <div class="mt-4 text-center">
                        <h3 class="text-2xl font-semibold text-white">Md. Rejwan Ahmed</h3>
                        <p class="text-gray-400 text-sm">Fullstack Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
const props = defineProps({
    aboutMe: Object,
    skills: Object,
});
</script>