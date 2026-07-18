<template>
    <section v-if="props.blogs && props.blogs.length > 0" id="blogs" class="bg-black text-white py-20">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-4xl font-bold text-yellow-400 text-center mb-12">Blogs</h2>

            <transition-group name="blog-fade" tag="div" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <a v-for="(blog, index) in visibleBlogs" :key="blog.id" :href="blog.url" target="_blank" rel="noopener noreferrer" class="bg-gray-900 rounded-xl p-6 shadow-lg hover:shadow-yellow-500/20 transition-shadow duration-300 flex flex-col justify-between group">
                    <!-- Featured Badge -->
                    <div>
                        <span v-if="blog.is_featured" class="inline-block mb-3 text-xs font-semibold bg-yellow-400 text-black px-2 py-1 rounded-full">
                            Featured
                        </span>

                        <h3 class="text-lg font-bold text-white group-hover:text-yellow-400 transition-colors duration-200 mb-2">
                            {{ blog.title }}
                        </h3>

                        <p v-if="blog.excerpt" class="text-gray-400 text-sm leading-relaxed">
                            {{ blog.excerpt }}
                        </p>
                    </div>

                    <!-- Footer -->
                    <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-800">
                        <span class="text-xs text-gray-500">
                            {{ formatDate(blog.published_at) }}
                        </span>
                        <span class="text-yellow-400 text-sm font-medium group-hover:underline">
                            Read More →
                        </span>
                    </div>
                </a>
            </transition-group>

            <!-- after closing </div> of the grid -->
            <div v-if="props.blogs && props.blogs.length > initialCount" class="text-center mt-10">
                <button @click="showAll = !showAll" class="bg-yellow-400 text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-300 transition m-2">
                    {{ showAll ? 'Show Less' : 'Show More' }}
                </button>

                <button class="bg-yellow-400 text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-300 transition mt-2">
                    <a :href="props?.mediumUrl" target="_blank">View all on Medium</a>
                </button>
            </div>
        </div>
    </section>
</template>

<script setup lang="ts">
import { Blog } from '@/types/index';
import { ref, computed } from 'vue';

const props = defineProps<{
    blogs?: Blog[];
    mediumUrl?: string,
}>();

const formatDate = (date: string): string => {
    return new Date(date).toLocaleDateString('en-US', {
        month: 'short',
        year: 'numeric',
    });
};

const initialCount = 3 as const;
const showAll = ref<boolean>(false);

const visibleBlogs = computed<Blog[]>(() =>
    showAll.value ? (props.blogs ?? []) : (props.blogs?.slice(0, initialCount) ?? [])
);
</script>