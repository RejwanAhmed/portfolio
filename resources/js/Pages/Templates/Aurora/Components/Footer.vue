<template>
    <footer class="aurora-footer">
        <div class="footer-inner">

            <!-- Top row: brand + social -->
            <div class="footer-top">
                <div class="footer-brand">
                    <h3 class="brand-name">{{ props?.aboutMe?.name }}</h3>
                    <p class="brand-tagline" v-html="props?.aboutMe?.short_description"></p>
                </div>

                <div class="footer-social">
                    <a v-if="props?.aboutMe?.github_url" :href="props?.aboutMe?.github_url"
                        target="_blank" class="social-btn" title="GitHub">
                        <Github class="w-4 h-4" />
                    </a>
                    <a v-if="props?.aboutMe?.linked_in_url" :href="props?.aboutMe?.linked_in_url"
                        target="_blank" class="social-btn" title="LinkedIn">
                        <Linkedin class="w-4 h-4" />
                    </a>
                    <a v-if="props?.aboutMe?.email" :href="`mailto:${props?.aboutMe?.email}`"
                        class="social-btn" title="Email">
                        <Mail class="w-4 h-4" />
                    </a>
                </div>
            </div>

            <!-- Nav links -->
            <div class="footer-nav">
                <a v-for="link in navLinks" :key="link.id"
                    :href="`#${link.id}`"
                    @click.prevent="scrollTo(link.id)"
                    class="footer-link">
                    {{ link.name }}
                </a>
            </div>

            <!-- Bottom: copyright + contact line -->
            <div class="footer-bottom">
                <p class="copyright">
                    &copy; {{ new Date().getFullYear() }} {{ props?.aboutMe?.name }}. All rights reserved.
                </p>
                <div class="footer-contact">
                    <span v-if="props?.aboutMe?.email" class="contact-item">
                        <Mail class="w-3 h-3" /> {{ props?.aboutMe?.email }}
                    </span>
                    <span v-if="props?.aboutMe?.phone" class="contact-item">
                        <Phone class="w-3 h-3" /> {{ props?.aboutMe?.phone }}
                    </span>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup lang="ts">
import { Github, Linkedin, Mail, Phone } from 'lucide-vue-next';
import { User } from '@/types/index';

const props = defineProps<{ aboutMe?: User }>();

const navLinks = [
    { id: 'introduction', name: 'Home' },
    { id: 'about',        name: 'About' },
    { id: 'experience',   name: 'Experience' },
    { id: 'education',    name: 'Education' },
    { id: 'skill',        name: 'Skills' },
    { id: 'projects',     name: 'Projects' },
    { id: 'blogs',        name: 'Blogs' },
    { id: 'contact',      name: 'Contact' },
];

const scrollTo = (id: string) => {
    const el = document.getElementById(id);
    if (el) window.scrollTo({ top: el.getBoundingClientRect().top + window.pageYOffset - 20, behavior: 'smooth' });
};
</script>

<style scoped>
.aurora-footer {
    background: #161B22;
    border-top: 1px solid #30363D;
    padding: 3rem;
}

@media (max-width: 768px) { .aurora-footer { padding: 2rem 1.5rem; } }

.footer-inner {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.footer-top {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 1.5rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #30363D;
}

.brand-name {
    font-size: 1.1rem;
    font-weight: 800;
    background: linear-gradient(90deg, #A855F7, #06B6D4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin-bottom: 0.4rem;
}

.brand-tagline {
    font-size: 0.8rem;
    color: #8B949E;
    line-height: 1.6;
    max-width: 320px;
}

.footer-social {
    display: flex;
    gap: 0.5rem;
}

.social-btn {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    background: #21262D;
    border: 1px solid #30363D;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #8B949E;
    text-decoration: none;
    transition: all 0.15s ease;
}

.social-btn:hover {
    border-color: #A855F7;
    color: #A855F7;
    background: rgba(168,85,247,0.1);
}

.footer-nav {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem 1.5rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #30363D;
}

.footer-link {
    font-size: 0.8rem;
    color: #8B949E;
    text-decoration: none;
    transition: color 0.15s ease;
}

.footer-link:hover { color: #A855F7; }

.footer-bottom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 0.75rem;
}

.copyright {
    font-size: 0.78rem;
    color: #8B949E;
}

.footer-contact {
    display: flex;
    gap: 1.25rem;
    flex-wrap: wrap;
}

.contact-item {
    display: inline-flex;
    align-items: center;
    gap: 0.35rem;
    font-size: 0.75rem;
    color: #8B949E;
}
</style>
