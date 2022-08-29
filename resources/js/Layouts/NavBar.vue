<script setup>
import { Link } from '@inertiajs/inertia-vue3';

</script>
<template>    
<nav class="w-full z-40  shadow-md fixed top-0">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between h-16">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <!--
            Icon when menu is open.

            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start ">
        <div class="flex-shrink-0 flex items-center">
         
           <Link :href="route('inicio')" class="text-gray-500 hover:text-sky-500 hover:font-bold hover:text-md px-3 py-2 rounded-md text-sm font-medium">
                 <img class="block lg:hidden h-8 w-auto" src="imagenes/logos/shark-white.png" alt="Workflow">
                 <img class="hidden lg:block h-8 w-auto" src="imagenes/logos/shark-white.png" alt="Workflow">  
           </Link>
        </div>
        <div class="hidden w-full sm:block sm:ml-6 ">
          <div class="flex  justify-center space-x-4 ">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              
                 <Link :href="route('inicio')" class="text-gray-300 hover:text-red-500 hover:font-bold  px-3 py-2 rounded-md    ">
                    Nosotros
                 </Link>
                 

                 <Link :href="route('servicios')" class="text-gray-300 hover:text-red-500 hover:font-bold  px-3 py-2 rounded-md   ">
                    Servicios
                 </Link>

                 <Link :href="route('tienda')" class="text-gray-300 hover:text-red-500 hover:font-bold  px-3 py-2 rounded-md    ">
                    Tienda
                 </Link>

              
                  <a href="#" class="text-gray-300 hover:text-red-500 hover:font-bold  px-3 py-2 rounded-md   ">
                    Contacto
                  </a>
          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <button type="button" class="bg-gray-800 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
          <span class="sr-only">Ver mi carrito</span>
          <!-- Heroicon name: outline/bell -->
          <img class="block lg:hidden h-5 w-auto" src="imagenes/web/carrito-2.png" alt="Workflow">
          <img class="hidden lg:block h-5 w-auto" src="imagenes/web/carrito-2.png" alt="Workflow">  

        </button>
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="px-2 pt-2 pb-3 space-y-1">

              
      <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>

      <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
    </div>
  </div>
</nav>
</template>

<script>
export default {
  setup() {
    
  },
}
</script>
