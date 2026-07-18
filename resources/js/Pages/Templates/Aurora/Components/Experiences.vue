<template>
    <section v-if="props?.experiences?.length" id="experience" class="aurora-section">
        <div class="section-label">Experience</div>
        <h2 class="section-title">Work History</h2>

        <div class="timeline">
            <div v-for="(exp, index) in props?.experiences" :key="index" class="timeline-item">
                <!-- Dot -->
                <div class="timeline-dot"></div>

                <div class="timeline-card">
                    <div class="timeline-header">
                        <div>
                            <h3 class="job-title">{{ exp.job_title }}</h3>
                            <p class="company-name">{{ exp.company_name }}</p>
                        </div>
                        <div class="timeline-meta">
                            <span class="date-badge">
                                {{ formatDate(exp.start_date) }} — {{ exp.end_date ? formatDate(exp.end_date) : 'Present' }}
                            </span>
                            <span class="duration-badge">{{ calculateDuration(exp.start_date, exp.end_date) }}</span>
                        </div>
                    </div>

                    <div class="job-desc" v-html="exp.description"></div>

                    <ul v-if="exp.responsibilities?.length" class="responsibilities">
                        <li v-for="(point, i) in exp.responsibilities" :key="i" class="resp-item">
                            <span class="resp-dot"></span>
                            {{ point }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { Experience } from '@/types/index';

const props = defineProps<{ experiences?: Experience[] }>();

const formatDate = (date?: string) => {
    if (!date) return '';
    return new Date(date).toLocaleDateString('en-US', { month: 'short', year: 'numeric' });
};

function calculateDuration(start: string, end?: string): string {
    const s = new Date(start);
    const e = end ? new Date(end) : new Date();
    let y = e.getFullYear() - s.getFullYear();
    let m = e.getMonth() - s.getMonth();
    if (m < 0) { y--; m += 12; }
    return [y > 0 ? `${y}y` : '', m > 0 ? `${m}mo` : ''].filter(Boolean).join(' ') || '< 1mo';
}
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
    margin-bottom: 2.5rem;
}

.timeline {
    position: relative;
    padding-left: 1.5rem;
    border-left: 2px solid #30363D;
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.timeline-item {
    position: relative;
}

.timeline-dot {
    position: absolute;
    left: -1.65rem;
    top: 1.25rem;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: linear-gradient(135deg, #A855F7, #06B6D4);
    border: 2px solid #0D1117;
}

.timeline-card {
    background: #161B22;
    border: 1px solid #30363D;
    border-radius: 12px;
    padding: 1.5rem;
    transition: border-color 0.15s ease;
}

.timeline-card:hover { border-color: #A855F755; }

.timeline-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 1rem;
}

.job-title {
    font-size: 1.05rem;
    font-weight: 700;
    color: #F0F6FC;
    margin-bottom: 0.2rem;
}

.company-name {
    font-size: 0.85rem;
    font-weight: 600;
    background: linear-gradient(90deg, #A855F7, #06B6D4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.timeline-meta {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    gap: 0.3rem;
}

.date-badge {
    font-size: 0.72rem;
    color: #8B949E;
    background: #21262D;
    border: 1px solid #30363D;
    padding: 0.25rem 0.6rem;
    border-radius: 100px;
    white-space: nowrap;
}

.duration-badge {
    font-size: 0.68rem;
    color: #06B6D4;
}

.job-desc {
    font-size: 0.875rem;
    color: #8B949E;
    line-height: 1.7;
    margin-bottom: 1rem;
}

.responsibilities {
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
    list-style: none;
    padding: 0;
    margin: 0;
}

.resp-item {
    display: flex;
    align-items: flex-start;
    gap: 0.6rem;
    font-size: 0.85rem;
    color: #8B949E;
}

.resp-dot {
    margin-top: 0.5rem;
    width: 5px;
    height: 5px;
    border-radius: 50%;
    background: #A855F7;
    flex-shrink: 0;
}
</style>
