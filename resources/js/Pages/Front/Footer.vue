<template>
  <footer class="bg-gradient-to-br from-gray-950 to-gray-900 text-white pt-14 pb-8">
    <div class="max-w-7xl mx-auto px-6">
      <!-- Top Section: 3 columns -->
      <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-10">
        
        <!-- Left: Brand -->
        <div class="md:w-1/3 text-center md:text-left">
          <h3 class="text-3xl font-bold tracking-tight">
            Md. <span class="text-yellow-400">Rejwan</span> Ahmed
          </h3>
          <p class="text-sm text-gray-400 mt-2">
            Laravel & Vue Developer with passion for clean code and modern UI.
          </p>
        </div>

        <!-- Center: Nav Links (vertical, centered) -->
        <nav class="md:w-1/3 flex flex-col items-center space-y-3 text-gray-400 text-base md:text-sm">
          <a href="#introduction" @click.prevent="scrollToSection('introduction')" class="hover:text-yellow-400 transition">Home</a>
          <a href="#about" @click.prevent="scrollToSection('about')" class="hover:text-yellow-400 transition">About</a>
          <a href="#experience" @click.prevent="scrollToSection('experience')" class="hover:text-yellow-400 transition">Experience</a>
          <a href="#education" @click.prevent="scrollToSection('education')" class="hover:text-yellow-400 transition">Education</a>
          <a href="#skill" @click.prevent="scrollToSection('skill')" class="hover:text-yellow-400 transition">Skill</a>
          <a href="#projects" @click.prevent="scrollToSection('projects')" class="hover:text-yellow-400 transition">Projects</a>
          <a href="#contact" @click.prevent="scrollToSection('contact')" class="hover:text-yellow-400 transition">Contact</a>
        </nav>

        <!-- Right: Contact Info (aligned right) -->
        <div class="md:w-1/3 text-gray-400 text-sm space-y-3 text-center md:text-right">
          <ul class="space-y-3 text-base md:text-sm">
            <li class="flex items-center justify-center md:justify-end gap-4">
                <span>Dhaka, Bangladesh</span>
              <Home class="w-4 h-4 text-gray-400" />
            </li>
            <li class="flex items-center justify-center md:justify-end gap-4">
                <span>+880 1234 567890</span>
              <Phone class="w-4 h-4 text-gray-400" />
            </li>
            <li class="flex items-center justify-center md:justify-end gap-4">
                <span>your.email@example.com</span>
              <Mail class="w-4 h-4 text-gray-400" />
            </li>
            <li class="flex items-center justify-center md:justify-end gap-4">
                <a href="https://linkedin.com/in/your-linkedin" target="_blank" class="text-blue-400 hover:underline">
                    linkedin.com/in/your-linkedin
              </a>
              <Linkedin class="w-4 h-4 text-gray-400" />
            </li>
            <li class="flex items-center justify-center md:justify-end gap-4">
                <a href="https://github.com/yourusername" target="_blank" class="text-blue-400 hover:underline">
                    github.com/yourusername
                </a>
              <Github class="w-4 h-4 text-gray-400" />
            </li>
          </ul>
        </div>
      </div>

      <!-- Divider -->
      <div class="border-t border-gray-800 mt-10 pt-4 text-center text-gray-500 text-sm">
        &copy; {{ new Date().getFullYear() }} Md. Rejwan Ahmed. All rights reserved.
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
import { Home, Phone, Mail, Linkedin, Github } from 'lucide-vue-next';

const scrollToSection = (id: string) => {
  const el = document.getElementById(id);
  if (el) {
    const yOffset = -64; // adjust based on your navbar height
    const y = el.getBoundingClientRect().top + window.pageYOffset + yOffset;
    window.scrollTo({ top: y, behavior: 'smooth' });
  }
};
</script>
