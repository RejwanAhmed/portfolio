<template>
    <section id="about" class="aurora-section">
        <div class="section-label">About Me</div>

        <div class="about-grid">
            <!-- Image -->
            <div class="about-image-wrap">
                <div class="about-image-border">
                    <img :src="props?.aboutMe?.about_me_image_url" :alt="props?.aboutMe?.name"
                        class="about-image" />
                </div>
                <!-- Contact chips -->
                <div class="contact-chips">
                    <span class="chip" v-if="props?.aboutMe?.address">
                        <MapPin class="w-3 h-3" /> {{ props?.aboutMe?.address }}
                    </span>
                    <span class="chip" v-if="props?.aboutMe?.email">
                        <Mail class="w-3 h-3" /> {{ props?.aboutMe?.email }}
                    </span>
                    <span class="chip" v-if="props?.aboutMe?.phone">
                        <Phone class="w-3 h-3" /> {{ props?.aboutMe?.phone }}
                    </span>
                </div>
            </div>

            <!-- Text -->
            <div class="about-content">
                <h2 class="section-title">Who am I?</h2>
                <div class="about-desc" v-html="props?.aboutMe?.long_description"></div>

                <div class="tech-stack" v-if="props?.skills?.length">
                    <p class="stack-label">Tech Stack</p>
                    <div class="stack-tags">
                        <span v-for="skill in props?.skills" :key="skill.name"
                            class="stack-tag"
                            :style="{ borderColor: skill.color + '55', color: skill.color }">
                            {{ skill.name }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { MapPin, Mail, Phone } from 'lucide-vue-next';
import { User, Skill } from '@/types/index';

const props = defineProps<{ aboutMe?: User, skills?: Skill[] }>();
</script>

<style scoped>
.aurora-section {
    padding: 4rem 3rem;
    border-bottom: 1px solid #30363D;
}

@media (max-width: 768px) {
    .aurora-section { padding: 2.5rem 1.5rem; }
}

.section-label {
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.12em;
    color: #A855F7;
    margin-bottom: 2rem;
}

.section-title {
    font-size: 1.75rem;
    font-weight: 800;
    color: #F0F6FC;
    margin-bottom: 1.25rem;
}

.about-grid {
    display: grid;
    grid-template-columns: 1fr 1.6fr;
    gap: 3rem;
    align-items: start;
}

@media (max-width: 900px) {
    .about-grid { grid-template-columns: 1fr; }
}

.about-image-wrap {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.about-image-border {
    padding: 3px;
    border-radius: 16px;
    background: linear-gradient(135deg, #A855F7, #06B6D4);
    display: inline-block;
    width: 260px;
    flex-shrink: 0;
}

.about-image {
    width: 260px;
    height: 320px;
    object-fit: cover;
    object-position: top;
    border-radius: 14px;
    display: block;
    border: 3px solid #161B22;
}

.contact-chips {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.chip {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    font-size: 0.75rem;
    color: #8B949E;
    background: #21262D;
    border: 1px solid #30363D;
    padding: 0.35rem 0.75rem;
    border-radius: 100px;
    width: fit-content;
}

.about-content {
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.about-desc {
    font-size: 0.9rem;
    color: #8B949E;
    line-height: 1.8;
}

.stack-label {
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: #8B949E;
    margin-bottom: 0.75rem;
}

.stack-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.stack-tag {
    font-size: 0.75rem;
    font-weight: 600;
    padding: 0.3rem 0.75rem;
    border-radius: 100px;
    border: 1px solid;
    background: transparent;
}
</style>