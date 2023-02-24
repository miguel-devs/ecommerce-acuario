<template>
<section id="section-categorias" class="bg-white relative" >
    <TitleSeparator   class="w-full absolute -top-[1.7rem]">
              Categoriás de productos
    </TitleSeparator>
    <div class="p-5">  
       <div class="flex flex-wrap justify-center items-center p-5 gap-5 min-h-screen w-full">
           <Link :href="route('ver-productos-categoria',{categoria:'sumps'})" style="width:200px; height:200px; overflow: hidden;" class="relative bg-white rounded-full border-4 border-sky-500 shadow-md" >
                 <div class="absolute z-20 w-full h-full bg-black/50">
                 </div>

                 <div class="absolute  z-10 p-2">
                     <img src="/imagenes/web/sump.jpg" class="w-full object-center"/>
                 </div>
                 <div class="absolute z-30 w-full h-full">
                     <div class="w-full h-full flex justify-center items-center p-5">
                       <p class="break-words text-center font-bold text-white">Sumps</p>
                     </div>
                 </div>
           </Link>

           <Link :href="route('ver-productos-categoria',{categoria:'sal'})" style="width:200px; height:200px; overflow: hidden;" class="relative bg-white rounded-full border-4 border-sky-500 shadow-md" >
                 <div class="absolute z-20 w-full h-full bg-black/50">
                 </div>

                 <div class="absolute  z-10 p-2">
                     <img src='/imagenes/web/sal.jpg' class="w-full object-center"/>
                 </div>
                 <div class="absolute z-30 w-full h-full">
                     <div class="w-full h-full flex justify-center items-center p-5">
                       <p class="break-words text-center font-bold text-white">Sal</p>
                     </div>
                 </div>
           </Link>
           <Link :href="route('ver-productos-categoria',{categoria:'alimentos-para-corales'})" style="width:200px; height:200px; overflow: hidden;" class="relative bg-white rounded-full border-4 border-sky-500 shadow-md" >
                 <div class="absolute z-20 w-full h-full bg-black/50">
                 </div>

                 <div class="absolute  z-10 p-2">
                     <img src='/imagenes/web/alimento_corales.jpg' class="w-full object-center"/>
                 </div>
                 <div class="absolute z-30 w-full h-full">
                     <div class="w-full h-full flex justify-center items-center p-5">
                       <p class="break-words text-center font-bold text-white">Alimento para corales</p>
                     </div>
                 </div>
           </Link>
           <Link :href="route('ver-productos-categoria',{categoria:'calcetines-filtrantes'})" style="width:200px; height:200px; overflow: hidden;" class="relative bg-white rounded-full border-4 border-sky-500 shadow-md" >
                 <div class="absolute z-20 w-full h-full bg-black/50">
                 </div>

                 <div class="absolute  z-10 p-2">
                     <img src='/imagenes/web/calcetines-filtrantes.jpg' class="w-full object-center"/>
                 </div>
                 <div class="absolute z-30 w-full h-full">
                     <div class="w-full h-full flex justify-center items-center p-5">
                       <p class="break-words text-center font-bold text-white">Calcetines filtrantes</p>
                     </div>
                 </div>
           </Link>
           <Link :href="route('ver-productos-categoria',{categoria:'calcio-alcalinidad-y-magnesio'})" style="width:200px; height:200px; overflow: hidden;" class="relative bg-white rounded-full border-4 border-sky-500 shadow-md" >
                 <div class="absolute z-20 w-full h-full bg-black/50">
                 </div>

                 <div class="absolute  z-10 p-2">
                     <img src='/imagenes/web/calcioal-alcalinidad-magnesio.jpg' class="w-full object-center"/>
                 </div>
                 <div class="absolute z-30 w-full h-full">
                     <div class="w-full h-full flex justify-center items-center p-5">
                       <p class="break-words text-center font-bold text-white">Calcio, Alcalinidad y Magnesio</p>
                     </div>
                 </div>
           </Link>
           <Link :href="route('ver-productos-categoria',{categoria:'acuarios'})" style="width:200px; height:200px; overflow: hidden;" class="relative bg-white rounded-full border-4 border-sky-500 shadow-md" >
                 <div class="absolute z-20 w-full h-full bg-black/50">
                 </div>

                 <div class="absolute  z-10 p-2">
                     <img src='/imagenes/web/acuarios.jpg' class="w-full object-center"/>
                 </div>
                 <div class="absolute z-30 w-full h-full">
                     <div class="w-full h-full flex justify-center items-center p-5">
                       <p class="break-words text-center font-bold text-white">Acuarios</p>
                     </div>
                 </div>
           </Link>
           <Link :href="route('ver-productos-categoria',{categoria:'alimentos-para-peces'})" style="width:200px; height:200px; overflow: hidden;" class="relative bg-white rounded-full border-4 border-sky-500 shadow-md" >
                 <div class="absolute z-20 w-full h-full bg-black/50">
                 </div>

                 <div class="absolute  z-10 p-2">
                     <img src="/imagenes/web/alimento_peces.jpg" class="w-full object-center"/>
                 </div>
                 <div class="absolute z-30 w-full h-full">
                     <div class="w-full h-full flex justify-center items-center p-5">
                       <p class="break-words text-center font-bold text-white">Alimento para peces</p>
                     </div>
                 </div>
           </Link>
       </div>
    </div>   
  </section>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import TitleSeparator from "@/Layouts/TitleSeparator.vue";

export default {
  components: {
    TitleSeparator,

    Link,
  
  },
  data() {
    return {
      productosCategorias:[]
    }
  },mounted(){
    
     this.ProdCategorias();
  },
  methods: {
  
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
}
  </script>
