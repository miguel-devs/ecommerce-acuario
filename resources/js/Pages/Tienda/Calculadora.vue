<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <Head title="Calculadora" />

  <div class="min-h-screen relative">
    <NavBarTienda />
    <div class="w-full h-full flex relative ">
      <NavLeft />
    
      <section class="w-full min-h-screen bg-slate-100 bg-cover bg-center bg-no-repeat pt-20 pl-10 pr-10 pb-5">


          <div class="w-full h-full bg-white rounded-md">
             <div class="grid lg:grid-cols-3 gap-4 p-5 flex justify-items-center ">
                <div class="w-80  h-80 rounded bg-white shadow-lg p-2">
                  <div class="header">
                    <img src="/imagenes/web/whater-icon.jpg">
                  </div>
                  <div class="titulo text-orange-500 font-bold text-3xl">
                    <p class="text-center">VOLUMEN DE AGUA</p>
                  </div>
                  <div class="descripcion">
                     <p class="text-center">Determine con precisión cuánta agua hay en su acuario usando las dimensiones.</p>
                  </div>
                  <div class="flex justify-center">
                    <button class="bg-orange-500 text-white pt-2 pb-2 pl-4 pr-4 mt-3 font-bold rounded-md">Calcular</button>
                  </div>
                </div>
               

             </div>  
          </div>
      </section>

    
    </div>
  </div>
</template>

<script >
import { Head } from "@inertiajs/inertia-vue3";
import NavBarTienda from "@/Layouts/NavBarTienda.vue";
import NavLeft from "@/Layouts/NavLeftDev.vue";
export default {
  components: {
    Head,
    NavBarTienda,
    NavLeft,
  },
  props: {
    productosCarrito:Object,
  },
  methods: {
  
  },
};
</script>


