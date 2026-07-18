<template>
    <section v-if="props?.educations?.length" id="education" class="aurora-section">
        <div class="section-label">Education</div>
        <h2 class="section-title">Academic Background</h2>

        <div class="edu-grid">
            <div v-for="(edu, index) in props?.educations" :key="index" class="edu-card">
                <div class="edu-top">
                    <div class="edu-icon">
                        <GraduationCap class="w-5 h-5" />
                    </div>
                    <div class="edu-years">{{ edu.start_year }} – {{ edu.end_year }}</div>
                </div>

                <h3 class="edu-title">{{ edu.title }}</h3>
                <p class="edu-institution">{{ edu.institution }}</p>

                <div class="edu-meta">
                    <span class="meta-item">
                        Result: <strong>{{ edu.result }}</strong>
                    </span>
                    <span v-if="edu.board" class="meta-item">
                        Board: <strong>{{ edu.board }}</strong>
                    </span>
                    <span v-if="edu.held_on_year" class="meta-item">
                        Held: <strong>{{ edu.held_on_year }}</strong>
                    </span>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { GraduationCap } from 'lucide-vue-next';
import { Education } from '@/types/index';

const props = defineProps<{ educations?: Education[] }>();
</script>

<style scoped>
.aurora-section {
    padding: 4rem 3rem;
    border-bottom: 1px solid #30363D;
}

@media (max-width: 768px) { .aurora-section { padding: 2.5rem 1.5rem; } }

.section-label {
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: #A855F7;
    margin-bottom: 0.5rem;
}

.section-title {
    font-size: 1.75rem;
    font-weight: 800;
    color: #F0F6FC;
    margin-bottom: 2rem;
}

.edu-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.25rem;
}

.edu-card {
    background: #161B22;
    border: 1px solid #30363D;
    border-radius: 12px;
    padding: 1.5rem;
    transition: border-color 0.15s ease, transform 0.15s ease;
}

.edu-card:hover {
    border-color: #A855F755;
    transform: translateY(-2px);
}

.edu-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.edu-icon {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: linear-gradient(135deg, rgba(168,85,247,0.2), rgba(6,182,212,0.2));
    border: 1px solid rgba(168,85,247,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #A855F7;
}

.edu-years {
    font-size: 0.72rem;
    color: #06B6D4;
    font-weight: 600;
    background: rgba(6,182,212,0.1);
    border: 1px solid rgba(6,182,212,0.25);
    padding: 0.2rem 0.6rem;
    border-radius: 100px;
}

.edu-title {
    font-size: 1rem;
    font-weight: 700;
    color: #F0F6FC;
    margin-bottom: 0.3rem;
}

.edu-institution {
    font-size: 0.82rem;
    font-weight: 600;
    background: linear-gradient(90deg, #A855F7, #06B6D4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 1rem;
}

.edu-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.meta-item {
    font-size: 0.75rem;
    color: #8B949E;
    background: #21262D;
    border: 1px solid #30363D;
    padding: 0.25rem 0.6rem;
    border-radius: 6px;
}

.meta-item strong {
    color: #F0F6FC;
}
</style>
