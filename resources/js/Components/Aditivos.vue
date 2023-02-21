<template>
     <div id="aditivos" class="h-screen hidden" >
          <div class="bg-color-acuatica h-full pt-5">
            <div class="h-5 relative rounded-t-md  mt-16">
                <i class="absolute right-2 top-0 fa-solid fa-circle-xmark text-white cursor-pointer" v-on:click="$emit('closeCategoriasMarcas')"></i>
            </div>
            <div  class="pl-10 pr-10">
            <p class="text-center text-white font-bold">Aditivos</p>
            </div>
            <div class="pt-5 pl-10 pr-10 flex">
              <div class="p-3">
                  <div class="p-2">
                      <div class="font-bold text-white mb-2">Aquaforest</div>
                      <div class="text-white "><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'aquaforest'})">Calcio, alcalinidad y magnesio</Link></div>
                      <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'trace-elements', marca:'aquaforest'})">Trace Elements</Link></div>
                      <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'nutricion-coralina', marca:'aquaforest'})">Nutrición coralina</Link></div>
                      <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'biofiltracion-control-de-nutrientes', marca:'aquaforest'})">Biofiltración & Control de nutrientes</Link></div>
                  </div>
                  
                  
              </div>
              <div class="p-3">
              <div class="p-2">
                 <div class="text-white  font-bold mb-2">Brightwell</div>
                      <div class="text-white "><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'brightwell'})">Calcio, alcalinidad y magnesio</Link></div>
                       <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'nutricion-coralina', marca:'brightwell'})">Nutrición coralina</Link></div>
                       <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'trace-elements', marca:'brightwell'})">Trace Elements</Link></div>
                      <div class="text-white"><Link :href="route('ver-productos-categoria-marca',{categoria:'biofiltracion-control-de-nutrientes', marca:'brightwell'})">Biofiltración & Control de nutrientes</Link></div>
                 </div>
              <div class="p-2">
                <div class="text-white font-bold mb-2">Red sea</div>
                      <div class="text-white "><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'red-sea'})">Calcio, alcalinidad y magnesio</Link></div>
                      <div class="text-white "><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'red-sea'})">Nutrición coralina</Link></div>
                      <div class="text-white "><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'red-sea'})">Trace Elements</Link></div>
                      <div class="text-white "><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'red-sea'})">Oligoelementos</Link></div>
                      <div class="text-white "><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'red-sea'})">Biofiltración & Control de nutrientes</Link></div>
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