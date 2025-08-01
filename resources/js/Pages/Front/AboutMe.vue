<template>
    <section id="about" class="bg-gray-950 text-white py-20">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <!-- Left: Text Content -->
            <div class="space-y-6">
                <h2 class="text-4xl md:text-5xl font-bold text-yellow-400">About Me</h2>
                <p class="text-gray-300 text-lg leading-relaxed">
                    I'm <span class="text-white font-semibold">Md. Rejwan Ahmed</span>, a passionate and dedicated
                    <span class="text-yellow-400">Fullstack Developer</span> with expertise in
                    <span class="text-blue-400">Laravel</span> and <span class="text-green-400">Vue.js</span>. I love
                    building
                    dynamic, responsive, and user-friendly web applications.
                </p>
                <p class="text-gray-400 text-md">
                    With a strong foundation in backend logic, frontend interactivity, and clean UI/UX practices, I
                    strive to create high-performance applications that solve real-world problems.
                </p>
                <div>
                    <h3 class="text-xl font-semibold text-white mb-2">Tech Stack:</h3>
                    <div class="flex flex-wrap gap-3">
                        <span class="bg-gray-800 text-sm px-3 py-1 rounded-full text-yellow-300">Laravel</span>
                        <span class="bg-gray-800 text-sm px-3 py-1 rounded-full text-green-300">Vue 3</span>
                        <span class="bg-gray-800 text-sm px-3 py-1 rounded-full text-blue-300">Inertia.js</span>
                        <span class="bg-gray-800 text-sm px-3 py-1 rounded-full text-purple-300">Tailwind CSS</span>
                        <span class="bg-gray-800 text-sm px-3 py-1 rounded-full text-red-300">MySQL</span>
                        <span class="bg-gray-800 text-sm px-3 py-1 rounded-full text-pink-300">REST API</span>
                    </div>
                </div>
            </div>

            <!-- Right: Image or Card -->
            <div class="flex justify-center md:justify-end">
                <div class="bg-gray-900 p-6 rounded-3xl shadow-xl ring-4 ring-gray-800 max-w-sm">
                    <img src="/storage/uploads/Rejwan.jpeg" alt="Rejwan"
                        class="w-full h-80 object-cover rounded-2xl shadow-md" />
                    <div class="mt-4 text-center">
                        <h3 class="text-2xl font-semibold text-white">Md. Rejwan Ahmed</h3>
                        <p class="text-gray-400 text-sm">Fullstack Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
