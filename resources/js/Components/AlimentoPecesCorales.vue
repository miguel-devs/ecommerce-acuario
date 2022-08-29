<template>
<div id="AlimentoPecesCorales" class="h-screen hidden" >
          <div class="bg-color-acuatica h-full pt-5">
            <div class="h-5 relative rounded-t-md  mt-16">
                <i class="absolute right-2 top-0 fa-solid fa-circle-xmark text-white cursor-pointer"  v-on:click="$emit(closeCategoriasMarcas)"></i>
            </div>
            <div  class="pl-10 pr-10">
            <p class="text-center text-white font-bold ">Alimento para peces y corales</p>
            </div>
            <div class="pt-5 pl-10 pr-10">
              <div class="p-2">
               
                <div class="font-bold text-white mb-2"><Link :href="route('ver-productos-categoria',{categoria:'alimentos-para-peces'})">Alimentos para peces</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'spectrum'})">Spectrum</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'reef-nutrition'})">Reef Nutrition</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'ocean-nutrition'})">Ocean Nutrition</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'hikari'})">Hikari</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'two-little-fishies'})">Two Little Fishies</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'brightwell-aquatics'})">Brightwell Aquatics</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'tetra'})">Tetra</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'seachem'})">Seachem</Link></div>












              </div>
              <div class="p-2">
                <div class="font-bold text-white mb-2"><Link :href="route('ver-productos-categoria',{categoria:'alimentos-para-corales'})">Alimentos para Corales</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'aquaforest'})">Aquaforest</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'bulk-reef-supply'})">Bulk Reef Supply</Link></div>

                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'nyos'})">Nyos</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'tropic-marin'})">Tropic Marin</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'brightwell-aquatics'})">Brightwell Aquatics</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'reef-nutrition'})">Reef Nutrition</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'two-little-fishies'})">Two Little Fishies</Link></div>
                <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'seachem'})">Seachem</Link></div>


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