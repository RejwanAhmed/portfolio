<template>
    <section id="skill" class="bg-black text-white py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-yellow-400 text-center mb-12">Skills</h2>

            <div class="grid md:grid-cols-2 gap-10">
                <div v-for="skill in props?.skills" :key="skill.name">
                    <div class="flex justify-between mb-1">
                        <span class="text-base font-medium text-white">{{ skill.name }}</span>
                        <span class="text-sm text-gray-400">{{ skill.proficiency_level }}%</span>
                    </div>
                    <div class="w-full bg-gray-800 rounded-full h-3">
                        <div :style="{ width: skill.proficiency_level + '%', backgroundColor: skill.color}" class="h-3 rounded-full">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
const props = defineProps({
    skills: Object,
});
</script>
