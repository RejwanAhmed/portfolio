<template>
    <section id="contact" class="bg-black text-white py-20">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-yellow-400 mb-4">Contact Me</h2>
            <p class="text-gray-400 mb-10">
                Want to hire or work together? Feel free to reach out.
            </p>

            <!-- Contact Form -->
            <form @submit.prevent="submitForm" class="space-y-6 text-left">
                <div class="grid md:grid-cols-2 gap-4">
                    <input type="text" v-model="form.name" placeholder="Your Name" required
                        class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 w-full focus:outline-none focus:border-yellow-400 text-white" />
                    <input type="email" v-model="form.email" placeholder="Your Email" required
                        class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 w-full focus:outline-none focus:border-yellow-400 text-white" />
                </div>

                <input type="text" v-model="form.subject" placeholder="Subject"
                    class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 w-full focus:outline-none focus:border-yellow-400 text-white" />

                <textarea v-model="form.message" rows="5" placeholder="Your Message" required
                    class="bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 w-full focus:outline-none focus:border-yellow-400 text-white resize-none"></textarea>

                <button type="submit"
                    class="bg-yellow-400 text-black font-semibold px-6 py-3 rounded-lg hover:bg-yellow-300 transition">
                    Send Message
                </button>
            </form>
        </div>
    </section>
</template>

<script setup>
import { ref } from "vue";

const form = ref({
    name: "",
    email: "",
    subject: "",
    message: "",
});

const submitForm = () => {
    alert("Message sent!");
    form.value = { name: "", email: "", subject: "", message: "" };
};
</script>
