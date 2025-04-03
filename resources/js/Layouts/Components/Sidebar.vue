<template>

   <button @click="toggleSidebar" data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
      type="button"
      class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
      <span class="sr-only">Open sidebar</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
         xmlns="http://www.w3.org/2000/svg">
         <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
         </path>
      </svg>
   </button>

   <aside :class="{'-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen}" id="default-sidebar"
      class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform duration-500 ease-in-out -translate-x-full sm:translate-x-0"
      aria-label="Sidebar">
      <button v-if="sidebarOpen" 
        @click="sidebarOpen = !sidebarOpen"
        class="sm:hidden absolute top-4 right-4 p-2 text-white bg-gray-800 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
      <div class="h-full flex flex-col px-3 py-4 overflow-y-auto bg-gray-800 dark:bg-gray-800">
         <div class="flex flex-col justify-center items-center mb-5">
            <img class="rounded-full w-20 h-20" src="/assets/images/rejwan.jpg" alt="image description">
            <h2
               class="mt-3 text-gray-50 dark:text-gray hover:text-black hover:bg-gray-100 dark:hover:bg-gray-700 text-2xl">
               Welcome Rejwan</h2>
         </div>

         <ul class="space-y-2 font-medium">
            <li>
               <Link :href="route('dashboard')"
                  class="flex items-center p-2 text-gray-50 rounded-lg dark:text-gray hover:text-black hover:bg-gray-100 dark:hover:bg-gray-700 group">
               <svg
                  class="w-5 h-5 text-gray-50 transition duration-75 dark:text-gray-700 group-hover:text-gray-900 dark:group-hover:text-white"
                  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                  <path
                     d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                  <path
                     d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
               </svg>
               <span class="ms-3">Dashboard</span>
               </Link>
            </li>
            <li>
               <Link :href="route('profile.edit')"
                  class="flex items-center p-2 text-gray-50 rounded-lg dark:text-gray hover:text-black hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg
                     class="w-6 h-6 text-gray-50 transition duration-75 dark:text-gray-700 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                     viewBox="0 0 24 24">
                     <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z" clip-rule="evenodd" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
               </Link>
            </li>

            <li>
               <Link :href="route('projects.index')" class="flex items-center p-2 text-gray-50 rounded-lg dark:text-gray hover:text-black hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="w-6 h-6 text-gray-50 transition duration-75 dark:text-gray-700 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                     <path fill-rule="evenodd" d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z"
                        clip-rule="evenodd" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Project</span>
               </Link>
            </li>

            <li>
               <Link :href="route('skills.index')" class="flex items-center p-2 text-gray-50 rounded-lg dark:text-gray hover:text-black hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="w-6 h-6 text-gray-50 transition duration-75 dark:text-gray-700 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                     <path fill-rule="evenodd" d="M10 2a3 3 0 0 0-3 3v1H5a3 3 0 0 0-3 3v2.382l1.447.723.005.003.027.013.12.056c.108.05.272.123.486.212.429.177 1.056.416 1.834.655C7.481 13.524 9.63 14 12 14c2.372 0 4.52-.475 6.08-.956.78-.24 1.406-.478 1.835-.655a14.028 14.028 0 0 0 .606-.268l.027-.013.005-.002L22 11.381V9a3 3 0 0 0-3-3h-2V5a3 3 0 0 0-3-3h-4Zm5 4V5a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v1h6Zm6.447 7.894.553-.276V19a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3v-5.382l.553.276.002.002.004.002.013.006.041.02.151.07c.13.06.318.144.557.242.478.198 1.163.46 2.01.72C7.019 15.476 9.37 16 12 16c2.628 0 4.98-.525 6.67-1.044a22.95 22.95 0 0 0 2.01-.72 15.994 15.994 0 0 0 .707-.312l.041-.02.013-.006.004-.002.001-.001-.431-.866.432.865ZM12 10a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H12Z" clip-rule="evenodd"/>
                  </svg>

                  <span class="flex-1 ms-3 whitespace-nowrap">Skill</span>
               </Link>
            </li>

            <li>
               <Link :href="route('experiences.index')" class="flex items-center p-2 text-gray-50 rounded-lg dark:text-gray hover:text-black hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="w-6 h-6 text-gray-50 transition duration-75 dark:text-gray-700 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                     <path fill-rule="evenodd" d="M8 4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2h3a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3V4Zm2 2h4V4h-4v2ZM4 10v10h16V10H4Zm10 3h-4v2h4v-2Z" clip-rule="evenodd"/>
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Experience</span>
               </Link>
            </li>

            <li>
               <Link :href="route('educations.index')" class="flex items-center p-2 text-gray-50 rounded-lg dark:text-gray hover:text-black hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg class="w-6 h-6 text-gray-50 transition duration-75 dark:text-gray-700 group-hover:text-gray-900 dark:group-hover:text-white" 
                     aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
                     fill="currentColor" viewBox="0 0 24 24">
                     <path d="M12 2 1 7l11 5 9-4v6h2V7zm7 16h2v-4h-2zm-2-2H7v2h10zm-5-2.5-8-3.5V14l8 4 8-4v-3.5l-8 3.5z"/>
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Education</span>
               </Link>
            </li>
         </ul>

         <ul class="mt-auto space-y-2 font-medium">
            <li>
               <Link method="post" :href="route('logout')" class="flex items-center p-2 text-gray-50 rounded-lg dark:text-gray hover:text-black hover:bg-gray-100 dark:hover:bg-gray-700 group">
                  <svg
                     class="w-6 h-6 text-gray-50 transition duration-75 dark:text-gray-700 group-hover:text-gray-900 dark:group-hover:text-white"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                     viewBox="0 0 24 24">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.6" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2" />
                  </svg>
                  <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
               </Link>
            </li>
         </ul>
      </div>
   </aside>


</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const sidebarOpen = ref(false);

// Method to toggle sidebar visibility
const toggleSidebar = () => {
   sidebarOpen.value = !sidebarOpen.value;
};
</script>