<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <Head title="Mis compras" />
    <NavBarTienda :totalCarritoProps="totalCarrito"/>

    <div v-show="$page.props.flash.message"
        class="fixed bottom-0 p-1 right-4 z-50  mb-4 text-sm bg-white text-slate-700 border border-gray-300 shadow-md rounded-lg "
                    role="alert"
                >
                <div class="relative h-5">
                  <div class="absolute top-0 right-0">
                     <svg @click="$page.props.flash.message = null" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                  </div>
                </div>
                <div class="font-medium p-2">
                        {{ $page.props.flash.message }}
                          
                        <Link :href="route('tienda')" class="text-sky-500 ">Ir a la tienda</Link>
                </div>
     </div>

      <NavLeft />
       <div id="section-categorias" class="w-full h-screen bg-sky-700 pt-20 pl-10 pr-10 pb-10" >
       <section class="w-full h-full flex justify-center">
        <div class="w-full min-h-full rounded-md shadow-md p-4  bg-white flex justify-center items-center">
            <div v-if="ordenes.data.length > 0 " class="h-full relative">
            <div class="w-full border-b border-gray-300 pb-3 mb-2">
                <p class="text-center">Mis compras en AQUATICA</p>
            </div>

                     <div class="w-full overflow-x">
                       <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6 dark:bg-gray-800">
                   Nombre del cliente
                </th>
                <th scope="col" class="py-3 px-6">
                    Direccion
                </th>
                
                <th scope="col" class="py-3 px-6">
                    Total
                </th>
                
                <th scope="col" class="py-3 px-6 dark:bg-gray-800">
                    
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(orden,index) in  ordenes.data" :key="index" class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white dark:bg-gray-800">
                    {{orden.nombre}}
                </th>
                <td class="py-4 px-6">
                 <p class="text-sm">{{orden.calle}}
                 {{orden.noExterior}},
                 <span v-if="orden.noInterior"> {{orden.noInterior}}, </span>
                 {{orden.colonia}}
                 {{orden.cp}},
                 {{orden.municipioDelegacion}},
                 {{orden.estado}}.
                 </p>
                </td>
                <td class="py-4 px-6 dark:bg-gray-800">
                 ${{orden.total}}
                </td>
               
                
                <td class="py-4 px-6">
                    <Link :href="route('compra',{order:orden.id})" class="border rounded-md shadow-md border-sky-700 text-sky-700 hover:bg-sky-700 hover:text-white px-3 py-2">Ver compra</Link>
                </td>
            </tr>
          
           
        </tbody>
    </table>
                     </div>
                     <div class="absolute w-full bottom-0">
                                 <Pagination :links="ordenes"/>
                     </div>
            </div>
            <div v-else>
                <p class="text-center text-3xl font-semibold text-gray-500 mb-4">¡Usted todavia no tiene pedidos!</p>
                <div class="w-full flex justify-center">
                     <Link :href="route('tienda')" class="bg-sky-600 px-3 py-2  rounded-md shadow-md text-white">Ir a la tienda</Link>
                </div>
            </div>
        </div>
      </section>
       </div>
</template>


<script >
import { Head } from "@inertiajs/inertia-vue3";
import NavBarTienda from "@/Layouts/NavBarTienda.vue";
import NavLeft from "@/Layouts/NavLeftDev.vue";
import { Link } from "@inertiajs/inertia-vue3";
import TitleSeparator from "@/Layouts/TitleSeparator.vue";
import Pagination from "@/Layouts/Pagination.vue";

export default {
  components: {
    Head,
    NavBarTienda,
    NavLeft,
    Link,
    TitleSeparator,
    Pagination,
  },
  props: {
     ordenes:Object,
  },data() {
    return {
      totalCarrito:null,
    }
  },
  mounted(){
    console.log(this.ordenes);
     if (localStorage.getItem("carrito")) {
      this.totalCarrito = JSON.parse(localStorage.getItem("carrito")).length;
    }
   
  },

 
   
  
};
</script>


