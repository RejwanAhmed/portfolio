<template>
    <section id="education" class="bg-gray-950 text-white py-20">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-yellow-400 text-center mb-12">Education</h2>

            <div class="relative border-l-4 border-yellow-500 ml-4 pl-6 space-y-12">
                <div v-for="(education, index) in props?.educations" :key="index" class="group">
                    <div
                        class="absolute -left-[30px] w-6 h-6 bg-yellow-500 rounded-full border-4 border-gray-950 group-hover:scale-110 transition-transform duration-300">
                    </div>

                    <div
                        class="bg-gray-900 p-6 rounded-xl shadow-lg hover:shadow-yellow-500/20 transition-shadow duration-300">
                        <h3 class="text-2xl font-semibold text-white">{{ education.title }}</h3>
                        <p class="text-yellow-300 text-sm mt-1">{{ education.institution }}</p>
                        <p class="text-gray-400 text-sm mt-1 italic">{{ education.start_year }} - {{ education.end_year }} 
                            <span v-if="education.held_on_year" class="text-yellow-500">(Held On: {{ education.held_on_year }})</span></p>
                        <p class="text-gray-300 mt-3">Result: {{ education.result }}</p>
                        <p v-if="education.board" class="text-gray-300">Board: {{ education.board }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
const props = defineProps({
    educations: Object
})
</script>
