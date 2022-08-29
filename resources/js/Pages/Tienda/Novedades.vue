<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <Head title="Novedades"/>

  <div class="min-h-screen relative">
    <NavBarTienda :totalCarritoProps="totalCarrito" />
      <NavLeft  />
      <section class="w-full min-h-screen bg-sky-600 pt-20 pl-10 pr-10 pb-10">
        <div class="bg-white bg-white rounded-md shadow-md pt-6 pb-6">
           <nav aria-label="Breadcrumb" class="mb-4">
              <ol role="list" class="max-w-2xl mx-auto px-4 flex items-center space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
                <li>
                  <div class="flex items-center">
                    <Link
                      :href="route('inicio')"
                      class="text-sm font-medium text-orange-300"
                      >AQUATICA
                    </Link>
                    
                  </div>
                </li>

                <li class="text-sm">
                                    <div class="flex items-center">

                   <span class="text-gray-300 ml-4 mr-4">\</span>

                  <Link
                    :href="route('novedades')" 
                    aria-current="page"
                    class="font-medium text-gray-500 hover:text-gray-600"
                    >
                    Novedades
                    </Link
                  >
                  </div>
                </li>

                
              </ol>
            </nav>

            <div class="mt-6 pl-4 pr-4 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
           
              <div v-for="(producto,index) in productos" :key="index" class="group relative">
                <div v-if="producto.offer" class="absolute rounded-full bg-sky-700 text-white p-1 text-sm h-8 w-8 flex justify-center items-center">
                    {{producto.offer.descuento}}% 
                </div>
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                  <img :src="`/imagenes/productos/${producto.imagen}`" 
                  :alt="producto.nombre" 
                  class="w-full h-full object-center object-cover lg:w-full lg:h-full"/>
                </div>
                <div class="mt-4 flex justify-between">
                  <div>
                    <h3 class="text-sm text-gray-700">
                      <Link :href="route('ver-producto',{product:producto.id})" >
                        <span aria-hidden="true" class="absolute inset-0" ></span>
                        {{producto.nombre}}
                      </Link>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">{{producto.nombre_marca}}</p>
                  </div>
                  <div v-if="producto.offer">
                     <p class="text-sm font-medium text-gray-400 line-through">${{producto.precio}}</p>
                     <p class="text-sm font-medium text-gray-900">
                         ${{descuento(producto.precio,producto.offer.descuento)}}
                     </p>
                  </div>
                  <div v-else>
                    <p class="text-sm font-medium text-gray-900">${{producto.precio}}</p>
                  </div> 
                </div>
              </div>
              

              <!-- More products... -->
            </div>
        </div>
        
      </section>
             <section id="contacto" class="relative bg-cover bg-center bg-no-repeat" style="background-image:url(/imagenes/web/contacto.jpg)">
        <div class="bg-black/50 w-full h-full">
         <TitleSeparator class="w-full absolute -top-[1.7rem]">
                  Contacto
        </TitleSeparator> 
        <div class="flex pl-10 pr-10 pt-24 pb-24">
        <div>
                   <img src="/imagenes/logos/logo150-150.png" style="width:150px; height:150px">
       </div>
<div class="w-full flex justify-between p-5">
        <div class="w-1/2">
          <p class="text-white mb-2">Teléfono: 22222222</p>
          <p class="text-white mb-2">contacto@correo.com</p>
          <p class="text-white">Horarios: 10:00am - 8:00pm L-S</p>
        </div>
        <div class="w-1/2 flex justify-center items-center">
          <a href="#"
            ><div
              class="w-10 h-10 mr-5 rounded-lg bg-cover bg-no-repeat bg-center"
              style="background-image: url(imagenes/web/instagram.jpg)"
            ></div
          ></a>
          <a href="#"
            ><div
              class="w-10 h-10 mr-5 rounded-lg bg-cover bg-no-repeat bg-center"
              style="background-image: url(imagenes/web/whattsap.png)"
            ></div
          ></a>
          <a href="#"
            ><div
              class="w-10 h-10 mr-5 rounded-lg bg-cover bg-no-repeat bg-center"
              style="background-image: url(imagenes/web/facebook.jpg)"
            ></div
          ></a>
        </div>
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
import { Link } from '@inertiajs/inertia-vue3';
import TitleSeparator from "@/Layouts/TitleSeparator.vue";

export default {
  props: {
    productos: Object,
    brand:Object,
    category:Object
  },
  components: {
    Head,
    Link,
    NavBarTienda,
    NavLeft,
        TitleSeparator

  },
     data() {
       return {
            totalCarrito:null,
            nombreCategoria : "",
            urlCategoria: "",
            nombreMarca:"",
            urlMarca:"",
       };
     },
     mounted() {
      if(this.category){
      this.nombreCategoria = this.category[0].nombre;
      this.urlCategoria = this.category[0].url_clean;
      }
      if(this.brand){
      this.nombreMarca = this.brand[0].nombre; 
      this.urlMarca = this.brand[0].url_clean;
      }
      if (localStorage.getItem("carrito")) {
        this.totalCarrito = JSON.parse(localStorage.getItem("carrito")).length;
      }
     },
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


