<template>
  <div id="sal" class="h-screen hidden">
    <div class="bg-color-acuatica h-full pt-5">
      <div class="h-5 relative rounded-t-md mt-16">
        <i class=" absolute right-2 top-0 fa-solid fa-circle-xmark text-white cursor-pointer" v-on:click="$emit('closeCategoriasMarcas')"></i>
      </div>
     
            <div  class="pl-10 pr-10">
            <p class="text-center text-white font-bold">Sal y Mantenimiento</p>
            </div>

      <div class="pt-5 pl-10 pr-10 flex">
        <div>
          <div class="p-2">
            <div class="font-bold text-white mb-2"><Link :href="route('ver-productos-categoria',{categoria:'sal'})">Sal</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'tropic-marin'})">Tropic Marin</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'aquaforest'})">Aquaforest</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'instant-ocean'})">Instant Ocean</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'reef-crystals'})">Reef Crystals</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'coralife'})">Coralife</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'red-sea-coral-pro'})">Red Sea Coral Pro</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'red-sea-mix'})">Red Sea Mix</Link></div>
          </div>
          <div class="p-2">
            <div class="font-bold text-white mb-2">Mantenimiento</div>
            <div class="text-white"><Link :href="route('ver-productos-categoria',{categoria:'calcetines-filtrantes'})">Calcetines Filtrantes</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria',{categoria:'limpiadores-de-cristal-y-acrilico'})">Limpiadores de cristal y acrílico</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria',{categoria:'medicamentos'})">Medicamentos</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria',{categoria:'redes'})">Redes</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria',{categoria:'pinzas'})">Pinzas</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria',{categoria:'trampas'})">Trampas</Link></div>
          </div>
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
  setup() {},
};
</script>