<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <Head title="Inicio" />
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

  <div class="min-h-screen relative  bg-sky-600 ">
      <NavLeft />
      <section class="w-full bg-white h-screen bg-cover bg-center bg-no-repeat" style="background-image:url(/imagenes/web/anemona.jpg)">
      <div class="w-full h-full flex justify-center items-center bg-black/50">
          
        
          <div>
               <p class="text-6xl font-extrabold  text-center mb-10 text-white">En AQUATICA tenemos los productos, accesorios y más para tu acuario.</p>
               <div class="w-full flex justify-center">
                      <Link :href="route('tienda')" class="rounded-lg pl-4 pt-2 pr-4 pb-2 text-white bg-transparent border border-white font-bold">Tienda</Link>
               </div>
          </div>
   
        </div>

      </section>
      <section class="min-h-screen bg-gray-50 relative">

       <TitleSeparator  class="w-full absolute -top-[1.7rem]">
        Productos
       </TitleSeparator> 

      <div id="productos" class="pl-10 pr-10 pt-20 pb-20 ">
            <div class="h-1/2 grid grid-cols-2 lg:grid-cols-5 gap-4  content-center overflow-x">
            <div class="bg-white border border-gray-100 p-2 rounded-md shadow-md relative" v-for="(productoAleatorio, index) in productosAleatorios" :key="index"  >
                <div v-if="productoAleatorio.offer" class="absolute rounded-full bg-sky-700 text-white p-1 text-sm h-8 w-8 flex justify-center items-center">
                    {{productoAleatorio.offer.descuento}}% 
                </div>

                <img :src="`/imagenes/productos/${productoAleatorio.imagen}`" class="w-full object-center"/>


                <p class="text-sm text-center">{{productoAleatorio.nombre}}</p>
                <div class="flex justify-center">
                <Link :href="route('ver-productos-categoria',{categoria:productoAleatorio.url_categoria})"  class="text-sm text-center text-gray-400">{{productoAleatorio.nombre_categoria}}</Link>
                </div>
                <div v-if="productoAleatorio.offer">
                     <p class="text-xs text-center text-gray-400 line-through">${{productoAleatorio.precio}}</p>

                     <p class="text-xs text-center text-sky-600">
                         ${{descuento(productoAleatorio.precio,productoAleatorio.offer.descuento)}}
                     </p>
                  </div>
                  <div v-else>
                 <p class="text-xs text-center text-sky-600">${{productoAleatorio.precio}}</p>
                  </diV> 
                <div class="w-full flex justify-center p-2">
                  <Link :href="route('ver-producto',{product:productoAleatorio.id})"  class="bg-sky-400 pt-1 pb-1 pl-4 pr-4 text-white rounded-md ">Añadir al carrito</Link>
                </div>
            </div>
            </div>

            <div v-if="productosMasVendidos.length > 0" class="pl-10 pr-10 pt-20 pb-20">
            <div class="border-b-2 border-gray-200  mb-20">
            <p class="bg-red-500 rounded-md text-white text-4xl text-center mb-5">Más vendidos</p>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 justify-items-center content-center">
               <div class="mr-5 bg-white rounded-md border border-gray-200 shadow-md p-2 relative" v-for="(productoMasVendido, index ) in productosMasVendidos" :key="index">
                <div v-if="productoMasVendido.product_order[0].offer" class="absolute rounded-full bg-sky-700 text-white p-1 text-sm h-8 w-8 flex justify-center items-center">
                    {{productoMasVendido.product_order[0].offer.descuento}}% 
                </div>
                 <div class="w-full flex justify-center">
                     <img :src="`/imagenes/productos/${productoMasVendido.product_order[0].imagen}`" style="width:150px; height:150px;"/>
                 </div>
                 <p class="text-xs text-center">{{productoMasVendido.product_order[0].nombre}}</p>
                 <div class="flex justify-center">
                     <Link :href="route('ver-productos-categoria',{categoria:productoMasVendido.product_order[0].category.url_clean})" class="text-xs text-gray-400">{{productoMasVendido.product_order[0].category.nombre}}</Link>
                 </div>
                 
                  <div v-if="productoMasVendido.product_order[0].offer">
                     <p class="text-xs text-center text-gray-400 line-through">${{productoMasVendido.product_order[0].precio}}</p>

                     <p class="text-xs text-center text-sky-600">
                         ${{descuento(productoMasVendido.product_order[0].precio,productoMasVendido.product_order[0].offer.descuento)}}
                     </p>
                  </div>
                  <div v-else>
                 <p class="text-xs text-center text-sky-600">${{productoMasVendido.product_order[0].precio}}</p>
                  </diV> 


                 <div class="flex justify-center p-2">
                     <Link class="bg-sky-400 pt-1 pb-1 pl-4 pr-4 text-white rounded-md " :href="route('ver-producto',{product: productoMasVendido.product_id})" >
                         Añadir
                     </Link>
                 </div>
               </div>
            </div>
            </div>
         
      </div>
      
      

      </section>
       <section id="section-categorias " class="bg-white relative" >
        <TitleSeparator   class="w-full absolute -top-[1.7rem]">
                  Categoriás de productos
        </TitleSeparator>
        <div class="p-5">  
           <div class="flex flex-wrap justify-center items-center p-5 gap-5 min-h-screen w-full">
               <Link :href="route('ver-productos-categoria',{categoria:productoCategoria.category.url_clean})" style="width:200px; height:200px; overflow: hidden;" class="relative bg-white rounded-full border-4 border-sky-500 shadow-md" v-for="(productoCategoria, index ) in productosCategorias" :key="index">
                     <div class="absolute z-20 w-full h-full bg-black/50">
                     </div>

                     <div class="absolute  z-10 p-2">
                         <img :src="`/imagenes/productos/${productoCategoria.imagen}`" class="w-full object-center"/>
                     </div>
                     <div class="absolute z-30 w-full h-full">
                         <div class="w-full h-full flex justify-center items-center p-5">
                           <p class="break-words text-center font-bold text-white">{{productoCategoria.category.nombre}}</p>
                         </div>
                     </div>
               </Link>
           </div>
        </div>   
      </section>
      <section id="marcas" class="relative bg-white" >
        <TitleSeparator class="w-full absolute -top-[1.7rem]">
                  Marcas Destacadas
        </TitleSeparator> 
        <div class="flex justify-center items-center p-10">
          <div class="bg-white rounded-md">
              <div class="grid grid-cols-2 gap-6 lg:grid-cols-4 justify-items-center ">
                        <Link href="/productos/marca/aquaforest"><img class="mb-20" src="/imagenes/web/acuaforest.jpg" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="100"></Link>
                        <Link href="/productos/marca/aquaillumination"><img class="mb-20" src="/imagenes/web/aquaillumination.jpg" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="200"></Link>
                        <Link href="/productos/marca/ecotech-marine"><img class="mb-20" src="/imagenes/web/ecotech.jpg" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300"></Link>
                        <Link href="/productos/marca/red-sea"><img class="mb-20" src="/imagenes/web/redsea.jpg" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="400"></Link>
              </div>
              <div class="grid gap-6  grid-cols-2 justify-items-center">
                        <Link href="/productos/marca/sicce"><img class="mb-20" src="/imagenes/web/sicce.jpg" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="100"></Link>
                        <Link href="/productos/marca/neptune-systems"><img class="mb-20" src="/imagenes/web/neptunesystem.jpg" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="200"></Link>
              </div>

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
import { Link } from "@inertiajs/inertia-vue3";
import TitleSeparator from "@/Layouts/TitleSeparator.vue";

export default {
  components: {
    Head,
    NavBarTienda,
    NavLeft,
    Link,
    TitleSeparator,
  },
  props: {
    productosCarrito:Object,
  },data() {
    return {
      totalCarrito:null,
      productosAleatorios:[],
      productosMasVendidos:[],
      productosCategorias:[]
    }
  },
  mounted(){
     if (localStorage.getItem("carrito")) {
      this.totalCarrito = JSON.parse(localStorage.getItem("carrito")).length;
    }
     this.ProdAleatorios();
     this.ProdMasVendidos();
     this.ProdCategorias();
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

      },
    ProdAleatorios(){
      axios
            .get(`/api/productos/random/10`)
            .then(response => {
                                  this.productosAleatorios = response.data;

               if(response.data.length > 0){
                  // this.loadSearchProduct = false;
                   //this.productosEncontrados = response.data;
               }else{
                  // this.loadSearchProduct = false;  
                  // this.productosEncontrados = null;
                  // this.notFoundProduct = true;
               }
              });
    },
    ProdMasVendidos(){
       axios.get(`/api/productos/masvendidos/10`)
            .then(response => {
               this.productosMasVendidos = response.data;

               if(response.data.length > 0){
                  // this.loadSearchProduct = false;
                   //this.productosEncontrados = response.data;
               }else{
                  // this.loadSearchProduct = false;  
                  // this.productosEncontrados = null;
                  // this.notFoundProduct = true;
               }
              });
    },
    ProdCategorias(){
      axios
            .get(`/api/productos/category-random-products`)
            .then(response => {
               this.productosCategorias = response.data;

               if(response.data.length > 0){
                  // this.loadSearchProduct = false;
                   //this.productosEncontrados = response.data;
               }else{
                  // this.loadSearchProduct = false;  
                  // this.productosEncontrados = null;
                  // this.notFoundProduct = true;
               }
              });
    },
  },
  
};
</script>


