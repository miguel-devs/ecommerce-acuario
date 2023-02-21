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
                   <div class="font-bold text-white mb-2"><Link :href="route('ver-productos-categoria',{categoria:'marine-water-hanna-checkers'})">  Marine Water Hanna Checkers</Link></div>
                   <div class="font-bold text-white mb-2"><Link :href="route('ver-productos-categoria',{categoria:'accesorios-y-estandares'})"> Accesorios y estándares</Link></div>
                   <div class="font-bold text-white mb-2"><Link :href="route('ver-productos-categoria',{categoria:'sondas-y-accesorios-del-controlador'})"> Sondas y accesorios del controlador</Link></div>
                   <div class="font-bold text-white mb-2"><Link :href="route('ver-productos-categoria',{categoria:'temporizadores'})"> Temporizadores</Link></div>
              </div>
 
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