<template>
    <section v-if="props?.skills?.length" id="skill" class="aurora-section">
        <div class="section-label">Skills</div>
        <h2 class="section-title">What I Work With</h2>

        <div class="skills-grid">
            <div v-for="skill in props?.skills" :key="skill.name" class="skill-card">
                <div class="skill-top">
                    <img v-if="skill.image_url" :src="skill.image_url" :alt="skill.name"
                        class="skill-icon" />
                    <div v-else class="skill-icon-placeholder"
                        :style="{ background: skill.color + '22', color: skill.color }">
                        {{ skill.name.charAt(0) }}
                    </div>
                    <span class="skill-name">{{ skill.name }}</span>
                </div>

                <div class="skill-bar-wrap">
                    <div class="skill-bar-track">
                        <div class="skill-bar-fill"
                            :style="{ width: skill.proficiency_level + '%', background: `linear-gradient(90deg, #A855F7, #06B6D4)` }">
                        </div>
                    </div>
                    <span class="skill-pct">{{ skill.proficiency_level }}%</span>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { Skill } from '@/types/index';

const props = defineProps<{ skills?: Skill[] }>();
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

.skills-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 1rem;
}

.skill-card {
    background: #161B22;
    border: 1px solid #30363D;
    border-radius: 12px;
    padding: 1.25rem;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    transition: border-color 0.15s ease;
}

.skill-card:hover { border-color: #A855F755; }

.skill-top {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.skill-icon {
    width: 28px;
    height: 28px;
    object-fit: contain;
    border-radius: 6px;
}

.skill-icon-placeholder {
    width: 28px;
    height: 28px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    font-weight: 700;
    flex-shrink: 0;
}

.skill-name {
    font-size: 0.875rem;
    font-weight: 600;
    color: #F0F6FC;
}

.skill-bar-wrap {
    display: flex;
    align-items: center;
    gap: 0.6rem;
}

.skill-bar-track {
    flex: 1;
    height: 4px;
    background: #21262D;
    border-radius: 100px;
    overflow: hidden;
}

.skill-bar-fill {
    height: 100%;
    border-radius: 100px;
    transition: width 0.6s ease;
}

.skill-pct {
    font-size: 0.7rem;
    color: #8B949E;
    font-weight: 600;
    min-width: 2rem;
    text-align: right;
}
</style>
