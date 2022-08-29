<template>
<div id="CalentadoresChillers" class="h-screen hidden" >
          <div class="bg-color-acuatica h-full pt-5">
            <div class="h-5 relative rounded-t-md  mt-16">
                <i class="absolute right-2 top-0 fa-solid fa-circle-xmark text-white cursor-pointer"  v-on:click="$emit(closeCategoriasMarcas)"></i>
            </div>
            <div  class="pl-10 pr-10">
            <p class="text-center text-white font-bold ">Calentadores y Chillers</p>
            </div>
            <div class="pt-5 pl-10 pr-10">
              <div class="p-2">
               
                
<div class="text-white"><Link :href="route('ver-productos-categoria',{categoria:'calentadores'})">Calentadores</Link></div>
<div class="text-white"><Link :href="route('ver-productos-categoria',{categoria:'chillers'})">Chillers</Link></div>
<div class="text-white"><Link :href="route('ver-productos-categoria',{categoria:'ventiladores'})">Ventiladores</Link></div>
<div class="text-white"><Link :href="route('ver-productos-categoria',{categoria:'termometros-y-controladores'})">Termómetros y Controladores</Link></div>














              </div>
              
            <div>

              
       
 
              </div>
            </div>
          </div>
</div>
</template>
<script>
import { Link } from '@inertiajs/inertia-vue3';
export default {
  components:{
    Link
  },
  

  
}
</script>