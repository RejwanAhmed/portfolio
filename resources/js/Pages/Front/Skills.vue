<template>
  <section id="skill" class="bg-black text-white py-20">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-4xl font-bold text-yellow-400 text-center mb-12">Skills</h2>

      <div class="grid md:grid-cols-2 gap-10">
        <div v-for="skill in skills" :key="skill.name">
          <div class="flex justify-between mb-1">
            <span class="text-base font-medium text-white">{{ skill.name }}</span>
            <span class="text-sm text-gray-400">{{ skill.level }}%</span>
          </div>
          <div class="w-full bg-gray-800 rounded-full h-3">
            <div :style="{ width: skill.level + '%' }"
              class="h-3 rounded-full"
              :class="skill.color">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
const skills = [
  { name: 'Laravel', level: 90, color: 'bg-yellow-400' },
  { name: 'Vue 3', level: 85, color: 'bg-green-400' },
  { name: 'Inertia.js', level: 80, color: 'bg-blue-400' },
  { name: 'Tailwind CSS', level: 90, color: 'bg-purple-400' },
  { name: 'MySQL', level: 75, color: 'bg-red-400' },
  { name: 'JavaScript', level: 85, color: 'bg-yellow-300' },
  { name: 'REST API', level: 80, color: 'bg-pink-400' },
  { name: 'Git & GitHub', level: 70, color: 'bg-gray-400' },
];
</script>
