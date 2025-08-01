<template>
  <section id="education" class="bg-gray-950 text-white py-20">
    <div class="max-w-6xl mx-auto px-6">
      <h2 class="text-4xl font-bold text-yellow-400 text-center mb-12">Education</h2>

      <div class="relative border-l-4 border-yellow-500 ml-4 pl-6 space-y-12">
        <div v-for="(item, index) in educationList" :key="index" class="group">
          <div class="absolute -left-[30px] w-6 h-6 bg-yellow-500 rounded-full border-4 border-gray-950 group-hover:scale-110 transition-transform duration-300"></div>

          <div class="bg-gray-900 p-6 rounded-xl shadow-lg hover:shadow-yellow-500/20 transition-shadow duration-300">
            <h3 class="text-2xl font-semibold text-white">{{ item.degree }}</h3>
            <p class="text-yellow-300 text-sm mt-1">{{ item.institution }}</p>
            <p class="text-gray-400 text-sm mt-1 italic">{{ item.duration }}</p>
            <p class="text-gray-300 mt-3">{{ item.description }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
const educationList = [
  {
    degree: "Master of Science (MSC)",
    institution: "Your University Name",
    duration: "2022 - 2024",
    description: "Specialized in advanced software engineering, focusing on backend systems and distributed architecture.",
  },
  {
    degree: "Bachelor of Science (BSC)",
    institution: "Your University Name",
    duration: "2018 - 2022",
    description: "Studied core computer science subjects like data structures, web development, and databases.",
  },
  {
    degree: "Higher Secondary Certificate (HSC)",
    institution: "Your College Name",
    duration: "2016 - 2018",
    description: "Major in Science with Mathematics and Physics focus. Strong academic record and technical inclination.",
  },
  {
    degree: "Secondary School Certificate (SSC)",
    institution: "Your School Name",
    duration: "2014 - 2016",
    description: "Completed foundational education with emphasis on mathematics and science.",
  },
];
</script>
