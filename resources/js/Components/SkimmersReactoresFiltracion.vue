<template>
  <div id="SkimmersReactoresFiltracion" class="h-screen hidden">
    <div class="bg-color-acuatica h-full pt-5">
      <div class="h-5 relative rounded-t-md mt-16">
        <i
          class="
            absolute
            right-2
            top-0
            fa-solid fa-circle-xmark
            text-white
            cursor-pointer
          "
          v-on:click="$emit('closeCategoriasMarcas')"
        ></i>
      </div>
      <div class="pl-10 pr-10">
        <p class="text-center text-white font-bold">
          Skimmers, Reactors & Filtration
        </p>
      </div>

      <div class="pt-5 pl-10 pr-10 flex">
        <div>
          <div class="p-2">
            <div class="font-bold text-white mb-2">
            <Link :href="route('ver-productos-categoria',{categoria:'skimmers-internos'})">Skimmers Internos</Link>
            </div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'royal-exclusiv'})">Royal Exclusiv</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'red-sea'})">Red Sea</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'reef-octopus'})">Reef Octopus</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'aquamax'})">Aquamax</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'bubble-magus'})">Bubble Magus</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'hydor'})">Hydor</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'ice-cap'})">IceCap</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'innovative-marine'})">Innovative Marine</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'maxspect'})">Maxspect</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'nyos'})">Nyos</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'eshopps'})">Eshopps</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'tunze'})">Tunze</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'ultra-reef'})">Ultra Reef</Link></div>

          </div>
        </div>
        <div></div>
        <div>
          <div class="p-2">
            <div class="font-bold text-white mb-2"> <Link :href="route('ver-productos-categoria',{categoria:'reactores'})">Reactores</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'boyu'})">Algae Scrubbers y Reactores</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'boyu'})">Reactores de Biopellets</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'boyu'})">Reactores de Carbón y GFO</Link></div>
            <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'boyu'})">Reactores de Calcio</Link></div>
          </div>
          <div class="p-2">
            <div class="font-bold text-white mb-2"> <Link :href="route('ver-productos-categoria',{categoria:'filtracion'})">Filtros</Link></div>
           
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
  

  
}
</script>