<template>
  <section id="experience" class="bg-black text-white py-20">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-4xl font-bold text-yellow-400 text-center mb-12">Experience</h2>

      <div class="space-y-8">
        <div
          v-for="(exp, index) in experiences"
          :key="index"
          class="border-l-4 border-yellow-400 pl-6 relative bg-gray-900 rounded-xl p-6 shadow hover:shadow-yellow-600/20 transition"
        >
          <h3 class="text-xl font-bold mb-1">{{ exp.title }}</h3>
          <p class="text-gray-400 text-sm mb-2">
            {{ exp.company }} — {{ formatDate(exp.start_date) }} to {{ formatDate(exp.end_date) }}
          </p>

          <!-- Tech stack -->
          <div class="flex flex-wrap gap-2 mb-3">
            <span
              v-for="(tech, i) in exp.technologies"
              :key="i"
              class="bg-gray-700 text-xs px-2 py-1 rounded"
            >
              {{ tech }}
            </span>
          </div>

          <!-- Responsibilities -->
          <ul class="list-disc list-inside text-gray-300 space-y-1">
            <li v-for="(point, i) in exp.responsibilities" :key="i">{{ point }}</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';

const experiences = ref([
  {
    title: 'Full Stack Developer',
    company: 'Tech Innovators Ltd.',
    start_date: '2023-01-01',
    end_date: '2024-06-01',
    technologies: ['Laravel', 'Vue 3', 'Inertia.js', 'MySQL'],
    responsibilities: [
      'Developed and maintained multiple enterprise-level web applications.',
      'Integrated RESTful APIs and handled complex database relations.',
      'Worked closely with designers to deliver pixel-perfect UIs.',
    ]
  },
  {
    title: 'Backend Developer',
    company: 'CodeCraft Bangladesh',
    start_date: '2021-06-01',
    end_date: '2022-12-01',
    technologies: ['Laravel', 'Redis', 'PostgreSQL', 'REST API'],
    responsibilities: [
      'Built scalable APIs and handled large data sets efficiently.',
      'Optimized Laravel queues and background jobs.',
      'Collaborated with frontend team on API specifications.',
    ]
  }
]);

const formatDate = (date) => {
  return new Date(date).toLocaleDateString('en-US', {
    month: 'short',
    year: 'numeric'
  });
};
</script>
