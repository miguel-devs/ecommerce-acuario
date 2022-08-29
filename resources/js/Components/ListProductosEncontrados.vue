<template>
  <div v-if="productosEncontradosProps">
  <Link :href="route('ver-producto',{product:productoEncontrado.id})" v-for="(productoEncontrado, index) in productosEncontradosProps" :key="index" class="grid grid-rows-3 grid-cols-3 gap-4 h-32 border-b border-sky-500 pt-2 pb-2">
    <div class="relative row-span-3 bg-contain bg-no-repeat bg-center" :style="{backgroundImage: `url(/imagenes/productos/${productoEncontrado.imagen})`}">
      <div v-if="productoEncontrado.offer" class="absolute rounded-full bg-sky-700 text-white p-1 text-sm h-8 w-8 flex justify-center items-center">
                    {{productoEncontrado.offer.descuento}}% 
      </div>
    </div>
    <div class="col-span-2">
        <p class="text-sky-700">{{productoEncontrado.nombre_marca}} / {{productoEncontrado.nombre_categoria}}</p>
        <p class="text-sm text-slate-500">{{productoEncontrado.nombre}}</p>
    </div>
    <div class="row-span-2 col-span-2">
        <div v-if="productoEncontrado.offer">
                     <p class="text-end font-semibold text-gray-400 line-through">${{productoEncontrado.precio}}</p>
                     <p class="text-end font-semibold text-sky-700">
                         ${{descuento(productoEncontrado.precio,productoEncontrado.offer.descuento)}}
                     </p>
                  </div>
                  <div v-else>
                    <p class="text-end font-semibold text-sky-700">${{productoEncontrado.precio}}</p>
                  </diV> 
    </div>
    

    
    </Link>
  </div>
  <div v-if="loadSearchProductProp" class="w-full flex justify-center p-5">
    <button type="button" class="inline-flex items-center px-4 py-2 font-semibold leading-6 text-sm shadow rounded-md text-white bg-color-acuatica hover:bg-indigo-400 transition ease-in-out duration-150 cursor-not-allowed" disabled="">
      <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
      </svg>
      Buscando Productos...
    </button>
  </div>
  <div v-if="notFoundProductProp" class="w-full p-5">
    <p class="text-center text-sm font-medium text-gray-900">No se encontraron productos</p>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
components:{
   Link
},

props: ['productosEncontradosProps','notFoundProductProp','loadSearchProductProp'],

methods: {
      descuento(precio,descuento){
        let val = (((precio *  descuento) / 100.00));
        val = precio-val;
        let xsd = val.toString().split('.')
  
         if (xsd.length === 1) {
           val = val.toString() + '.00'
           return val
         }
         if (xsd.length > 1) {
           if (xsd[1].length < 2) {
             val = val.toString() + '0'
           }
           return val
         }

      }
     },


};
</script>