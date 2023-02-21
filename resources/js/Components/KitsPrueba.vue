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
                     <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'kits-multiparametricos'})"> Kits multiparamétricos</Link></div>
                     <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'kits-alcalinidad'})"> Alcalinidad</Link></div>
                     <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'kits-calcio'})"> Calcio</Link></div>
                     <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'kits-magnesio'})"> Magnesio</Link></div>
                     <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'kits-fosfato'})"> Fosfato</Link></div>
                     <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'kits-nitrato-y-nitrito'})"> Nitrato y nitrito</Link></div>
                     <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'kits-amoniaco'})"> Amoníaco</Link></div>
                     <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'kits-ph'})"> pH</Link></div>
                     <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'oligoelementos-menores'})"> Oligoelementos menores</Link></div>
                     <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'controladores-y-monitores'})"> Controladores y monitores</Link></div>
                    
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