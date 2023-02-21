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
                   <div class="text-white font-bold mb-2">
                    <Link :href="route('ver-productos-categoria',{categoria:'sistemas-de-osmosis-inversa'})">Sistemas de ósmosis inversa</Link>
                  </div>
                   <div class="text-white font-bold mb-2">
                    <Link :href="route('ver-productos-categoria',{categoria:'sistemas-rodi-de-4-etapas'})">Sistemas RO/DI de 4 etapas</Link></div>
                   <div class="text-white font-bold mb-2">
                    <Link :href="route('ver-productos-categoria',{categoria:'sistemas-rodi-de-5-etapas'})">Sistemas RO/DI de 5 etapas</Link></div>
                   <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'sistemas-rodi-de-6-etapas'})">Sistemas RO/DI de 6 etapas</Link></div>
                   <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'sistemas-rodi-de-7-etapas'})">Sistemas RO/DI de 7 etapas</Link></div>
                   <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'membranas-de-osmosis-inversa'})">Membranas de ósmosis inversa</Link></div>
                   <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'accesorios-de-osmosis-inversa'})">Accesorios de ósmosis inversa</Link></div>
                   <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'bombas-de-refuerzo-y-accesorios'})">Bombas de refuerzo y accesorios</Link></div>
                   <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'monitores-medidores-y-controladores'})">Monitores, medidores y controladores</Link></div>
                   <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'kits-de-actualizacion'})">Kits de actualización</Link></div>
                   <div class="text-white font-bold mb-2"><Link :href="route('ver-productos-categoria',{categoria:'accesorios-oi'})">Accesorios</Link></div>
              

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