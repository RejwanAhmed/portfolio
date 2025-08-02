<template>
    <section id="experience" class="bg-black text-white py-20">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-yellow-400 text-center mb-12">Experience</h2>

            <div class="space-y-8">
                <div v-for="(exp, index) in props?.experiences" :key="index"
                    class="border-l-4 border-yellow-400 pl-6 relative bg-gray-900 rounded-xl p-6 shadow hover:shadow-yellow-600/20 transition">
                    <h3 class="text-xl font-bold mb-1">{{ exp.job_title }}</h3>
                    <p class="text-gray-400 text-sm">
                        <span class="font-bold text-yellow-300"> {{ exp.company_name }} </span> — <span
                            class="text-yellow-400">({{ formatDate(exp.start_date) }} - <span v-if="exp.end_date">{{
                                formatDate(exp.end_date) }}</span> <span v-else>Currently Working</span>)</span>
                    </p>
                    <p class="text-gray-400 text-sm mb-2">Duration: Total: {{ calculateDuration(exp.start_date,
                        exp.end_date) }}</p>
                    <h2 class="text-gray-400 font-bold text-lg mt-3 mb-1">Responsibilities:</h2>
                    <div class="prose max-w-none" v-html="exp.description"></div>

                    <!-- Responsibilities -->
                    <ul class="list-disc list-inside text-gray-300 space-y-1">
                        <li v-for="(point, i) in exp.responsibilities" :key="i">{{ point }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { ref } from 'vue';

const props = defineProps({
    experiences: Object,
});

const formatDate = (date) => {
    return new Date(date).toLocaleDateString('en-US', {
        month: 'short',
        year: 'numeric'
    });
};

function calculateDuration(startDateStr: string, endDateStr: string): string {
    const startDate = new Date(startDateStr);
    const endDate = endDateStr ? new Date(endDateStr) : new Date();

    // Ensure valid dates
    if (isNaN(startDate.getTime()) || isNaN(endDate.getTime())) {
        return 'Invalid date';
    }

    // Swap if start > end
    if (startDate > endDate) {
        [startDateStr, endDateStr] = [endDateStr, startDateStr];
        return calculateDuration(startDateStr, endDateStr);
    }

    let years = endDate.getFullYear() - startDate.getFullYear();
    let months = endDate.getMonth() - startDate.getMonth();

    if (months < 0) {
        years--;
        months += 12;
    }

    const yearPart = years > 0 ? `${years} year${years > 1 ? 's' : ''}` : ' 0 year';
    const monthPart = months > 0 ? `${months} month${months > 1 ? 's' : ''}` : ' 0 month';

    if (yearPart && monthPart) return `${yearPart} ${monthPart}`;
    if (yearPart) return yearPart;
    if (monthPart) return monthPart;

    return 'Less than a month';
}

</script>
