<template>
    <aside id="navLeftDev" class="hidden lg:block text-sm h-full fixed z-40 -left-80 md:-left-80 lg:-lef-80"   @mouseover="showNavLeft" @mouseout="hideNavLeft" >
      <div class="h-full flex">
        
        <div class="w-80 md:w-80 lg:w-80 pt-10 flex justify-center bg-white">
          <div class="p-1 mt-16">
            <div class="mb-5 flex items-center"  data-id="categoria-1" >
              <div class="cursor-pointer text-slate-500 text-center font-bold" @click="showCategoriasMarcas('acuarios_sumps')"
                >Acuarios y Sumps</div>
              <i class="fa-solid fa-caret-right text-slate-500 ml-2"></i>
            </div>
            <div class="mb-5 flex items-center">
              <span class="cursor-pointer text-slate-500 text-center font-bold"
                @click="showCategoriasMarcas('iluminacion')" >Iluminación</span
              ><i
                class="fa-solid fa-caret-right text-slate-500 text-slate-500 ml-2"
              ></i>
            </div>
            <div class="mb-5 flex items-center">
              <span class="cursor-pointer text-slate-500 text-center font-bold"
                @click="showCategoriasMarcas('bombasplomeria')">Bombas y plomeria</span
              ><i class="fa-solid fa-caret-right text-slate-500 ml-2"></i>
            </div>
            <div class="mb-5 flex items-center">
              <span class="cursor-pointer text-slate-500 text-center font-bold" 
              @click="showCategoriasMarcas('aditivos')">Aditivos</span
              ><i class="fa-solid fa-caret-right text-slate-500 ml-2"></i>
            </div>
            <div class="mb-5 flex items-center">
              <span class="cursor-pointer text-slate-500 text-center font-bold"
                @click="showCategoriasMarcas('osmosisInversa')">Ósmosis inversa</span
              ><i class="fa-solid fa-caret-right text-slate-500 ml-2"></i>
            </div>
            <div class="mb-5 flex items-center">
               <span class="cursor-pointer text-slate-500 text-center font-bold"
                @click="showCategoriasMarcas('kitsPrueba')"> Kits de pruebas
               </span>
               <i class="fa-solid fa-caret-right text-slate-500 ml-2"></i>
            </div>
            <div class="mb-5 flex items-center">
                   <span class="cursor-pointer text-slate-500  font-bold"
                   @click="showCategoriasMarcas('hidrometrosRefactrometros')">
                    Hidrómetros y Refractómetros
                    <i class="fa-solid fa-caret-right text-slate-500 ml-2"></i>
                   </span>
                   
            </div>
            <div class="mb-5 flex items-center">
                   <span class="cursor-pointer text-slate-500  font-bold"
                   @click="showCategoriasMarcas('sal')">
                    Sal y Mantenimiento
                   </span>
                   <i class="fa-solid fa-caret-right text-slate-500 ml-2"></i>
            </div>
             <div class="mb-5 flex items-center">
                   <span class="cursor-pointer text-slate-500  font-bold"
                   @click="showCategoriasMarcas('SkimmersReactoresFiltracion')">
                   Skimmers, Reactores y Filtración
                   </span>
                   <i class="fa-solid fa-caret-right text-slate-500 ml-2"></i>
            </div>
            
             <div class="mb-5 flex items-center">
                   <span class="cursor-pointer text-slate-500  font-bold"
                   @click="showCategoriasMarcas('CalentadoresChillers')">
                  Calentadores y chillers
                   </span>
                   <i class="fa-solid fa-caret-right text-slate-500 ml-2"></i>
            </div>
            <div class="mb-5 flex items-center">
                   <span class="cursor-pointer text-slate-500  font-bold"
                   @click="showCategoriasMarcas('AlimentoPecesCorales')">
                   Alimentos para peces y corales
                   </span>
                   <i class="fa-solid fa-caret-right text-slate-500 ml-2"></i>
            </div>

          </div>
        </div>
        
        <AcuarioSump    v-on:click="closeCategoriasMarcas"/>
        <Iluminacion    v-on:click="closeCategoriasMarcas"/>
        <BombasPlomeria v-on:click="closeCategoriasMarcas"/>
        <Aditivos v-on:click="closeCategoriasMarcas"/>   
        <OsmosisInversa v-on:click="closeCategoriasMarcas"/>    
        <KitsPrueba v-on:click="closeCategoriasMarcas"/>
        <HidrometrosRefractometros  v-on:click="closeCategoriasMarcas"/>
        <SalMantenimiento  v-on:click="closeCategoriasMarcas"/>
        <SkimmersReactoresFiltracion v-on:click="closeCategoriasMarcas"/>
        <AlimentoPecesCorales v-on:click="closeCategoriasMarcas"/>
        <CalentadoresChillers  v-on:click="closeCategoriasMarcas"/>

       
        <div id="pestanaLeft"  class="w-10 flex  items-center" >
          <div class="w-full h-48 flex justify-center items-center  bg-color-acuatica rounded-r-lg pt-10 pb-10 ">
          <i class="fa-solid fa-arrow-right-from-bracket text-white"></i>
          </div>
        </div>

      </div>
    </aside>

    <aside class="hidden md:hidden lg:hidden text-sm h-full fixed z-40 -left-80 md:-left-80 lg:-lef-80" @mouseover="showNavLeft" @mouseout="hideNavLeft">
    </aside>

</template>

<script>
import AcuarioSump from '@/Components/AcuarioSump.vue';
import Iluminacion from '@/Components/Iluminacion.vue';
import BombasPlomeria from '@/Components/BombasPlomeria.vue';
import Aditivos from '@/Components/Aditivos.vue';
import OsmosisInversa from '@/Components/OsmosisInversa.vue';
import KitsPrueba from '@/Components/KitsPrueba.vue';
import HidrometrosRefractometros from '@/Components/HidrometrosRefractometros.vue';
import SalMantenimiento from '@/Components/SalMantenimiento.vue';
import SkimmersReactoresFiltracion from '@/Components/SkimmersReactoresFiltracion.vue';
import AlimentoPecesCorales from '@/Components/AlimentoPecesCorales.vue';
import CalentadoresChillers from '@/Components/CalentadoresChillers.vue';

export default {
components:{
   AcuarioSump,
   Iluminacion,
   BombasPlomeria,
   Aditivos,
   OsmosisInversa,
   KitsPrueba,
   HidrometrosRefractometros,
   SalMantenimiento,
   SkimmersReactoresFiltracion,
   AlimentoPecesCorales,
   CalentadoresChillers,
},
props: {
  text: String
},
data() {
  return {
    hover: false,
    categoryShow: '',

  };
},
  watch: {
          categoryShow(newCategoryShow, oldCategoryShow) {
             if (oldCategoryShow !== '') {
                   let menuCategoriasMarcas = document.getElementById(oldCategoryShow);
                   menuCategoriasMarcas.classList.remove("show");
                   menuCategoriasMarcas.classList.add("hidden");
             }
         },
  },
methods: {
    showCategoriasMarcas: function (data) {
    this.categoryShow = data;

    let menuCategoriasMarcas = document.getElementById(this.categoryShow);

      menuCategoriasMarcas.classList.remove("hidden");
      menuCategoriasMarcas.classList.add("show");
    
  },
  closeCategoriasMarcas: function () {
    let menuCategoriasMarcas = document.getElementById(this.categoryShow);
        menuCategoriasMarcas.classList.remove("show");
        menuCategoriasMarcas.classList.add("hidden");
        this.categoryShow = '';
  },
  showNavLeft(){
     let navLeftDev = document.getElementById("navLeftDev");
     navLeftDev.classList.add("hover:left-0");
  }, 
  hideNavLeft(){
    
     let navLeftDev = document.getElementById("navLeftDev");
     navLeftDev.classList.remove("hover:left-0");
  }

}
}
</script>