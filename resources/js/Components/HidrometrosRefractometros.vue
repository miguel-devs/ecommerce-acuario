<template>
     <div id="hidrometrosRefactrometros" class="h-screen hidden" >
          <div class="bg-color-acuatica h-full pt-5">
            <div class="h-5 relative rounded-t-md  mt-16">
                <i class="absolute right-2 top-0 fa-solid fa-circle-xmark text-white cursor-pointer" v-on:click="$emit('closeCategoriasMarcas')"></i>
            </div>
             <div  class="pl-10 pr-10">
            <p class="text-center text-white font-bold">Hidrómetros y Refractómetros</p>
            </div>
            <div class="pt-5 pl-10 pr-10  flex">
              <div>
              <div class="p-2">
                   <div class="font-bold text-white mb-2">Marine Water Hanna Checkers</div>
                   <div class="font-bold text-white mb-2">Accesorios y estándares</div>
                   <div class="font-bold text-white mb-2">Sondas y accesorios del controlador</div>
                   <div class="font-bold text-white mb-2">Temporizadores</div>
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