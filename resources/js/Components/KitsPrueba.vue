<template>
     <div id="kitsPrueba" class="h-screen hidden" >
          <div class="bg-color-acuatica h-full pt-5">
            <div class="h-5 relative rounded-t-md  mt-16">
                <i class="absolute right-2 top-0 fa-solid fa-circle-xmark text-white cursor-pointer" v-on:click="$emit('closeCategoriasMarcas')"></i>
            </div>
             <div  class="pl-10 pr-10">
            <p class="text-center text-white font-bold">Kits de Prueba</p>
            </div>
            <div class="pt-5 pl-10 pr-10 flex">
              <div>
              <div class="p-2">
                     <div class="text-white font-bold mb-2"> Kits multiparamétricos</div>
                     <div class="text-white font-bold mb-2"> Alcalinidad</div>
                     <div class="text-white font-bold mb-2"> Calcio</div>
                     <div class="text-white font-bold mb-2"> Magnesio</div>
                     <div class="text-white font-bold mb-2"> Fosfato</div>
                     <div class="text-white font-bold mb-2"> Nitrato y nitrito</div>
                     <div class="text-white font-bold mb-2"> Amoníaco</div>
                     <div class="text-white font-bold mb-2"> pH</div>
                     <div class="text-white font-bold mb-2"> Oligoelementos menores</div>
                     <div class="text-white font-bold mb-2"> Controladores y monitores</div>
                     <div class="text-white font-bold mb-2"> Neptune Systems Apex</div>
                     <div class="text-white font-bold mb-2"> CoralVue Hidros</div>
                     <div class="text-white font-bold mb-2"> Milwaukee</div>
                     <div class="text-white font-bold mb-2"> Pinpoint</div>
                     <div class="text-white font-bold mb-2"> Tunze</div>
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