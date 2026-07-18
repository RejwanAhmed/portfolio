<template>
    <section v-if="props.blogs?.length" id="blogs" class="aurora-section">
        <div class="section-label">Blogs</div>
        <h2 class="section-title">Writing & Thoughts</h2>

        <div class="blogs-grid">
            <a v-for="blog in visibleBlogs" :key="blog.id"
                :href="blog.url" target="_blank" rel="noopener noreferrer"
                class="blog-card">
                <div class="blog-top">
                    <span v-if="blog.is_featured" class="featured-badge">Featured</span>
                    <span class="blog-date">{{ formatDate(blog.published_at) }}</span>
                </div>
                <h3 class="blog-title">{{ blog.title }}</h3>
                <p v-if="blog.excerpt" class="blog-excerpt">{{ blog.excerpt }}</p>
                <div class="blog-footer">
                    <span class="read-more">Read article →</span>
                </div>
            </a>
        </div>

        <div v-if="props.blogs.length > initialCount" class="blogs-actions">
            <button @click="showAll = !showAll" class="action-btn action-btn--ghost">
                {{ showAll ? 'Show Less' : 'Show More' }}
            </button>
            <a v-if="props.mediumUrl" :href="props.mediumUrl" target="_blank"
                class="action-btn action-btn--ghost">
                View all on Medium
            </a>
        </div>
    </section>
</template>

<script setup lang="ts">
import { ref, computed } from 'vue';
import { Blog } from '@/types/index';

const props = defineProps<{ blogs?: Blog[], mediumUrl?: string }>();

const initialCount = 3;
const showAll = ref(false);
const visibleBlogs = computed(() =>
    showAll.value ? (props.blogs ?? []) : (props.blogs?.slice(0, initialCount) ?? [])
);

const formatDate = (d: string) =>
    new Date(d).toLocaleDateString('en-US', { month: 'short', year: 'numeric' });
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

.blogs-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 1.25rem;
    margin-bottom: 1.5rem;
}

.blog-card {
    background: #161B22;
    border: 1px solid #30363D;
    border-radius: 12px;
    padding: 1.5rem;
    text-decoration: none;
    display: flex;
    flex-direction: column;
    gap: 0.75rem;
    transition: border-color 0.15s ease, transform 0.15s ease;
}

.blog-card:hover {
    border-color: #A855F755;
    transform: translateY(-2px);
}

.blog-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.featured-badge {
    font-size: 0.65rem;
    font-weight: 700;
    padding: 0.2rem 0.6rem;
    border-radius: 100px;
    background: linear-gradient(90deg, rgba(168,85,247,0.2), rgba(6,182,212,0.2));
    border: 1px solid rgba(168,85,247,0.4);
    color: #A855F7;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

.blog-date {
    font-size: 0.72rem;
    color: #8B949E;
}

.blog-title {
    font-size: 0.95rem;
    font-weight: 700;
    color: #F0F6FC;
    line-height: 1.4;
    transition: color 0.15s;
}

.blog-card:hover .blog-title { color: #A855F7; }

.blog-excerpt {
    font-size: 0.82rem;
    color: #8B949E;
    line-height: 1.6;
    flex: 1;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.blog-footer {
    padding-top: 0.75rem;
    border-top: 1px solid #30363D;
}

.read-more {
    font-size: 0.78rem;
    font-weight: 600;
    background: linear-gradient(90deg, #A855F7, #06B6D4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.blogs-actions {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.action-btn {
    font-size: 0.8rem;
    font-weight: 600;
    padding: 0.6rem 1.25rem;
    border-radius: 8px;
    text-decoration: none;
    cursor: pointer;
    transition: all 0.15s ease;
    border: none;
}

.action-btn--ghost {
    background: transparent;
    border: 1px solid #30363D;
    color: #F0F6FC;
}

.action-btn--ghost:hover { border-color: #A855F7; background: rgba(168,85,247,0.08); }
</style>
