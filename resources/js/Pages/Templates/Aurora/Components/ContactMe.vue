<template>
    <section id="contact" class="aurora-section">
        <div class="section-label">Contact</div>
        <h2 class="section-title">Let's Build Something</h2>
        <p class="contact-sub">Have a project in mind or want to collaborate? I'd love to hear from you.</p>

        <div class="contact-layout">
            <VForm @submit="submit" class="contact-form">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <Field type="text" name="name" v-model="form.name"
                            placeholder="Your name"
                            class="form-input" />
                        <ErrorMessage :errorMessage="form.errors.name" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <Field type="email" name="email" v-model="form.email"
                            placeholder="your@email.com"
                            class="form-input" />
                        <ErrorMessage :errorMessage="form.errors.email" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Subject</label>
                    <Field type="text" name="subject" v-model="form.subject"
                        placeholder="What's this about?"
                        class="form-input" />
                </div>

                <div class="form-group">
                    <label class="form-label">Message</label>
                    <Field as="textarea" name="message" v-model="form.message"
                        rows="5" placeholder="Tell me about your project…"
                        class="form-input form-textarea" />
                    <ErrorMessage :errorMessage="form.errors.message" />
                </div>

                <button type="submit" class="submit-btn">
                    Send Message
                </button>
            </VForm>
        </div>
    </section>
</template>

<script setup lang="ts">
import { Field, Form as VForm } from 'vee-validate';
import ErrorMessage from '@/Components/Message/ErrorMessage.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import type { Page } from '@inertiajs/core';

const form = useForm({ name: '', email: '', subject: '', message: '' });

const submit = () => {
    form.post(route('contactMe'), {
        preserveScroll: true,
        onSuccess: (_page: Page) => {
            form.reset();
            const flash = usePage().props.flash as { success?: string };
            if (flash?.success) alert(flash.success);
        },
    });
};
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
    margin-bottom: 0.5rem;
}

.contact-sub {
    font-size: 0.9rem;
    color: #8B949E;
    margin-bottom: 2.5rem;
}

.contact-form {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

@media (max-width: 600px) { .form-row { grid-template-columns: 1fr; } }

.form-group {
    display: flex;
    flex-direction: column;
    gap: 0.4rem;
}

.form-label {
    font-size: 0.75rem;
    font-weight: 600;
    color: #8B949E;
    text-transform: uppercase;
    letter-spacing: 0.06em;
}

.form-input {
    background: #161B22;
    border: 1px solid #30363D;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    font-size: 0.875rem;
    color: #F0F6FC;
    outline: none;
    transition: border-color 0.15s ease;
    width: 100%;
    font-family: inherit;
}

.form-input::placeholder { color: #8B949E; }
.form-input:focus { border-color: #A855F7; }

.form-textarea { resize: none; }

.submit-btn {
    align-self: flex-start;
    padding: 0.75rem 1.75rem;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 700;
    color: white;
    background: linear-gradient(90deg, #A855F7, #06B6D4);
    border: none;
    cursor: pointer;
    transition: opacity 0.15s ease;
}

.submit-btn:hover { opacity: 0.85; }
</style>