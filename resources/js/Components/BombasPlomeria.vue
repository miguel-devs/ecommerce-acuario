<template>
     <div id="bombasplomeria" class="h-screen hidden" >
          <div class="bg-color-acuatica h-full pt-5">
            <div class="h-5 relative rounded-t-md  mt-16">
                <i class="absolute right-2 top-0 fa-solid fa-circle-xmark text-white cursor-pointer" v-on:click="$emit('closeCategoriasMarcas')"></i>
            </div>
             <div  class="pl-10 pr-10">
            <p class="text-center text-white font-bold">Bombas y Plomeria</p>
            </div>
            <div class="pt-5 pl-10 pr-10 flex">
              <div class="p-4">
                     <div >
                           <div class="font-bold text-white mb-2"><Link :href="route('ver-productos-categoria',{categoria:'cabezas-de-poder'})">Cabezas de Poder</Link></div>
                           <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'coral-box'})">Coral Box</Link></div>
                           <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'ecotech-marine'})">EcoTech Marine</Link></div>
                           <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'ice-cap'})">IceCap</Link></div>
                           <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'innovative-marine'})">Innovative Marine</Link></div>
                           <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'jbj'})">JBJ</Link></div>
                           <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'jebao'})">Jebao</Link></div>
                           <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'maxi-jet'})">Maxi-Jet</Link></div>
                           <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'maxspect-gyre'})">Maxspect Gyre</Link></div>
                           <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'neptune-systems'})">Neptune Systems</Link></div>
                           <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'red-sea'})">Red Sea</Link></div>
                           <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'reef-octopus'})">Reef Octopus</Link></div>
                           <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'sicce'})">Sicce</Link></div>
                     </div>
                     <div >
                            <div class="font-bold text-white mb-2"><Link :href="route('ver-productos-categoria',{categoria:'plomeria'})">Plomeria</Link></div>
                            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'bulkheads'})">Bulkheads</Link></div>
                            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'lockline'})">Lockline</Link></div>
                            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:''})">Jets de regreso</Link></div>
                            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:''})">Tubería</Link></div>
                     </div>
              </div>
              <div class="p-4">
                <div class="text-white  font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'bombas-sumergibles'})">Bombas Sumergibles</Link></div>
                  <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'ecotech-marine'})">EcoTech Marine</Link></div>
                  <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'eheim'})">Eheim</Link></div>
                  <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'innovative-marine'})">Innovative Marine</Link></div>
                  <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'lifegard'})">Lifegard</Link></div>
                  <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'maxspect'})">Maxspect</Link></div>
                  <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'neptune-systems'})">Neptune Systems</Link></div>
                  <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'reef-octopus'})">Reef Octopus</Link></div>
                  <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'sicce'})">Sicce</Link></div>
                  <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'coral-box'})">Coral Box</Link></div>
                  <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'jebao'})">Jebao</Link></div>
              </div>
              <div class="p-4">
                <div class="text-white  font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'bombas-externas'})">Bombas Externas</Link></div>
                      <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'ecotech-marine'})">EcoTech Marine</Link></div>
                      <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'iwaki'})">Iwaki</Link></div>
                      <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'neptune-systems'})">Neptune Systems</Link></div>
                      <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'reeflo'})">ReeFlo</Link></div>
                      <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'reef-octopus'})">Reef Octopus</Link></div>
                      <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'sicce'})">Sicce</Link></div>
                      <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'coral-box'})">Coral Box</Link></div>
                      <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'jebao'})">Jebao</Link></div>
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


    setup() {
        
    },
}
</script>