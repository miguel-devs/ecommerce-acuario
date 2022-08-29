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
            <div class="font-bold text-white mb-2">Skimmers Internos</div>
            <div class="text-white">Royal Exclusiv</div>
            <div class="text-white">Red Sea</div>
            <div class="text-white">Reef Octopus</div>
            <div class="text-white">AquaMaxx</div>
            <div class="text-white">Bubble Magus</div>
            <div class="text-white">Hydor</div>
            <div class="text-white">IceCap</div>
            <div class="text-white">Innovative Marine</div>
            <div class="text-white">Maxspect</div>
            <div class="text-white">Nyos</div>
            <div class="text-white">Eshopps</div>
            <div class="text-white">Tunze</div>
            <div class="text-white">Ultra Reef</div>

            <div class="text-white">Royal Exclusiv</div>
          </div>
        </div>
        <div></div>
        <div>
          <div class="p-2">
            <div class="font-bold text-white mb-2">Reactores</div>
            <div class="text-white">Algae Scrubbers y Reactores</div>
            <div class="text-white">Reactores de Biopellets</div>
            <div class="text-white">Reactores de Carbón y GFO</div>
            <div class="text-white">Reactores de Calcio</div>
          </div>
          <div class="p-2">
            <div class="font-bold text-white mb-2">Filtros</div>
            <div class="text-white">Algae Scrubbers y Reactores</div>
            <div class="text-white">Reactores de Biopellets</div>
            <div class="text-white">Reactores de Carbón y GFO</div>
            <div class="text-white">Reactores de Calcio</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  emits: ["closeCategoriasMarcas"],

  setup() {},
};
</script>