<template>
     <div id="iluminacion" class="h-screen hidden" >
          <div class="bg-color-acuatica h-full pt-5">
            <div class="h-5 relative rounded-t-md  mt-16">
                <i class="absolute right-2 top-0 fa-solid fa-circle-xmark text-white cursor-pointer" v-on:click="$emit('closeCategoriasMarcas')"></i>
            </div>
             <div  class="pl-10 pr-10">
            <p class="text-center text-white font-bold">Iluminación</p>
            </div>
            <div class="pt-5 pl-10 pr-10">
              <div class="p-2">
                <div class="font-bold text-white mb-2"><Link :href="route('ver-productos-categoria',{categoria:'led'})">LED</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'aquamax'})">Aquamax</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'coral-box'})">Coral Box</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'ecotech-marine'})">EchoTech Marine</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'ice-cap'})">Ice Cap</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'kessil'})">Kessil</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'maxspect'})">Maxspect</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'neptune-systems'})">Neptune Systems</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'orphek'})">Orphek</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'red-sea'})">Red Sea</Link></div>
              </div>

            </div>
          </div>
          </div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
        emits: ['closeCategoriasMarcas'],
        components:{
    Link
  },

   
}
</script>