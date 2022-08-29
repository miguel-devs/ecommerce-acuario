<template>
     <div id="osmosisInversa" class="h-screen hidden" >
          <div class="bg-color-acuatica h-full pt-5">
            <div class="h-5 relative rounded-t-md  mt-16">
                <i class="absolute right-2 top-0 fa-solid fa-circle-xmark text-white cursor-pointer" v-on:click="$emit('closeCategoriasMarcas')"></i>
            </div>
            <div  class="pl-10 pr-10">
            <p class="text-center text-white font-bold">Ósmosis inversa</p>
            </div>
            <div class="pt-5 pl-10 pr-10 flex">
              <div>
              <div class="p-2">
                   <div class="text-white font-bold mb-2">Sistemas de ósmosis inversa</div>
                   <div class="text-white font-bold mb-2">Sistemas RO/DI de 4 etapas</div>
                   <div class="text-white font-bold mb-2">Sistemas RO/DI de 5 etapas</div>
                   <div class="text-white font-bold mb-2">Sistemas RO/DI de 6 etapas</div>
                   <div class="text-white font-bold mb-2">Sistemas RO/DI de 7 etapas</div>
                   <div class="text-white font-bold mb-2">Membranas de ósmosis inversa</div>
                   <div class="text-white font-bold mb-2">Accesorios de ósmosis inversa</div>
                   <div class="text-white font-bold mb-2">Bombas de refuerzo y accesorios</div>
                   <div class="text-white font-bold mb-2">Monitores, medidores y controladores</div>
                   <div class="text-white font-bold mb-2">Kits de actualización</div>
                   <div class="text-white font-bold mb-2">Accesorios</div>
                   <!--<div class="text-white font-bold mb-2">Tubería</div>-->
                   <!--<div class="text-white font-bold mb-2">Válvulas</div>-->

              </div>
               </div>
            </div>
          </div>
          </div>

</template>

<script>
export default {
        emits: ['closeCategoriasMarcas'],

    setup() {
        
    },
}
</script>