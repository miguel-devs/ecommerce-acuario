<template>
<div id="acuarios_sumps" class="h-screen hidden" >
          <div class="bg-color-acuatica h-full pt-5">
            <div class="h-5 relative rounded-t-md  mt-16">
                <i class="absolute right-2 top-0 fa-solid fa-circle-xmark text-white cursor-pointer"  v-on:click="$emit(closeCategoriasMarcas)"></i>
            </div>
            <div  class="pl-10 pr-10">
            <p class="text-center text-white font-bold ">Acuarios y Sumps</p>
            </div>
            <div class="pt-5 pl-10 pr-10">
              <div class="p-2">
                <div class="font-bold text-white mb-2"><Link :href="route('ver-productos-categoria',{categoria:'acuarios'})">Acuarios</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'acuarios', marca:'boyu'})">Boyu</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'acuarios', marca:'jbj'})">JBJ</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'acuarios', marca:'lomas'})">Lomas</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'acuarios', marca:'red-sea'})"> Red Sea </Link></div>
              </div>
              <div class="p-2">
                <div class="font-bold text-white mb-2"><Link :href="route('ver-productos-categoria',{categoria:'sumps'})">Sumps</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'sumps', marca:'ice-cap'})">Ice Cap</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'sumps', marca:'reef-octopus'})">Reef Octopus</Link></div>
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