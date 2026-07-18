<template>
    <section id="introduction" class="intro-section">
        <div class="intro-inner">
            <!-- Greeting -->
            <p class="intro-greeting">Good to see you 👋</p>

            <!-- Name with gradient -->
            <h1 class="intro-name">{{ props?.aboutMe?.name }}</h1>

            <!-- Typewriter role -->
            <p class="intro-role">
                <span ref="typewriterEl"></span>
                <span class="cursor">|</span>
            </p>

            <!-- Short bio -->
            <p class="intro-bio" v-if="props?.aboutMe?.short_description"
                v-html="props?.aboutMe?.short_description">
            </p>

            <!-- CTA row -->
            <div class="intro-cta">
                <a href="#contact" @click.prevent="scrollTo('contact')" class="cta-primary">
                    Get In Touch
                </a>
                <a href="#projects" @click.prevent="scrollTo('projects')" class="cta-secondary">
                    See My Work
                </a>
            </div>

            <!-- Quick stats -->
            <div class="intro-stats">
                <div v-for="stat in stats" :key="stat.label" class="stat-item">
                    <span class="stat-value">{{ stat.value }}</span>
                    <span class="stat-label">{{ stat.label }}</span>
                </div>
            </div>
        </div>

        <!-- Background glow -->
        <div class="intro-glow"></div>
    </section>
</template>

<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { User, Cv } from '@/types/index';

const props = defineProps<{ aboutMe?: User, cv?: Cv }>();

const typewriterEl = ref<HTMLElement | null>(null);
const roles = ['Laravel Developer', 'Vue.js Developer', 'Fullstack Engineer', 'Problem Solver'];
let i = 0, j = 0, isDeleting = false;

function type() {
    const el = typewriterEl.value;
    if (!el) return;
    if (!isDeleting && j <= roles[i].length) {
        el.textContent = roles[i].substring(0, j++);
        setTimeout(type, 85);
    } else if (isDeleting && j >= 0) {
        el.textContent = roles[i].substring(0, j--);
        setTimeout(type, 45);
    } else {
        isDeleting = !isDeleting;
        if (!isDeleting) i = (i + 1) % roles.length;
        setTimeout(type, 1600);
    }
}

onMounted(() => type());

const scrollTo = (id: string) => {
    const el = document.getElementById(id);
    if (el) window.scrollTo({ top: el.getBoundingClientRect().top + window.pageYOffset - 20, behavior: 'smooth' });
};

const stats = [
    { value: '3+', label: 'Years Experience' },
    { value: '20+', label: 'Projects Built' },
    { value: '100+', label: 'Clients Served' },
];
</script>

<style scoped>
.intro-section {
    min-height: 100vh;
    display: flex;
    align-items: center;
    padding: 4rem 3rem;
    position: relative;
    overflow: hidden;
    border-bottom: 1px solid #30363D;
}

.intro-inner {
    position: relative;
    z-index: 1;
    max-width: 640px;
}

.intro-greeting {
    font-size: 1rem;
    color: #8B949E;
    margin-bottom: 1rem;
    font-weight: 500;
}

.intro-name {
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1rem;
    background: linear-gradient(90deg, #F0F6FC 0%, #A855F7 50%, #06B6D4 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.intro-role {
    font-size: 1.25rem;
    color: #8B949E;
    font-weight: 500;
    margin-bottom: 1.5rem;
    min-height: 2rem;
}

.cursor {
    color: #A855F7;
    animation: blink 0.75s step-end infinite;
}

@keyframes blink {
    50% { opacity: 0; }
}

.intro-bio {
    font-size: 0.95rem;
    color: #8B949E;
    line-height: 1.7;
    margin-bottom: 2rem;
    max-width: 520px;
}

.intro-cta {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-bottom: 3rem;
}

.cta-primary {
    padding: 0.7rem 1.5rem;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 600;
    text-decoration: none;
    background: linear-gradient(90deg, #A855F7, #06B6D4);
    color: #fff;
    transition: opacity 0.15s ease;
}

.cta-primary:hover { opacity: 0.85; }

.cta-secondary {
    padding: 0.7rem 1.5rem;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 600;
    text-decoration: none;
    background: transparent;
    color: #F0F6FC;
    border: 1px solid #30363D;
    transition: border-color 0.15s ease, background 0.15s ease;
}

.cta-secondary:hover {
    border-color: #A855F7;
    background: rgba(168,85,247,0.08);
}

.intro-stats {
    display: flex;
    gap: 2.5rem;
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    flex-direction: column;
    gap: 0.2rem;
}

.stat-value {
    font-size: 1.75rem;
    font-weight: 800;
    background: linear-gradient(90deg, #A855F7, #06B6D4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.stat-label {
    font-size: 0.75rem;
    color: #8B949E;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.intro-glow {
    position: absolute;
    top: -200px;
    right: -200px;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(168,85,247,0.12) 0%, transparent 70%);
    pointer-events: none;
}

@media (max-width: 768px) {
    .intro-section { padding: 2.5rem 1.5rem; }
}
</style>
