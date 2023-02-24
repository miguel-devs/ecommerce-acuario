<script>
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';


export default {
   components:{
    Link
  },
     methods:{

      hiddenAllSubmenuMovil:function(){

        let _submenu = document.getElementsByClassName("sub-menu-movil");

        for(let i=0;i<_submenu.length;i++){
            if(!_submenu[i].classList.contains('hidden')){
                      _submenu[i].classList.add('hidden');
            }
        }
            
      },

       showSubMenuMovil: function(value){
          this.hiddenAllSubmenuMovil();
          let _menuMovil = document.getElementById(value)   
          if(_menuMovil.classList.contains('hidden')){
                      _menuMovil.classList.remove('hidden');
                      _menuMovil.classList.add("show");
          }else if(_menuMovil.classList.contains('show')){
                      _menuMovil.classList.remove('show');
                      _menuMovil.classList.add("hidden");
          }

      }
     }
  }
</script>

<template>
  <div >
   <div >
      <ul>
         <li>
            <button type="button" class="w-full flex items-center text-gray-500 hover:text-white hover:bg-sky-700  block px-3 py-2 rounded-md text-base font-bold" @click="showSubMenuMovil('acuarios_sumps_movil')">
             
                  <span >Acuarios y Sumps</span>
                  <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="acuarios_sumps_movil" class="sub-menu-movil hidden text-slate-500  px-3 py-2">

                  <li >
                     <Link class="font-bold" :href="route('ver-productos-categoria',{categoria:'acuarios'})">Acuarios</Link>
                  </li>
                  <li>
                     <Link :href="route('ver-productos-categoria-marca',{categoria:'acuarios', marca:'boyu'})">Boyu</Link>
                  </li>
                  <li>
                     <Link :href="route('ver-productos-categoria-marca',{categoria:'acuarios', marca:'jbj'})">JBJ</Link>
                  </li>
                    <li>
                    <Link :href="route('ver-productos-categoria-marca',{categoria:'acuarios', marca:'lomas'})">Lomas</Link>
                  </li>
                  <li>
                     <Link :href="route('ver-productos-categoria-marca',{categoria:'acuarios', marca:'red-sea'})"> Red Sea </Link>
                  </li>
                  <li>
                     <Link class="font-bold" :href="route('ver-productos-categoria',{categoria:'sumps'})">Sumps</Link>
                  </li>
                  <li>
                     <Link :href="route('ver-productos-categoria-marca',{categoria:'sumps', marca:'ice-cap'})">Ice Cap</Link>
                  </li>
                  <li>
                    <Link :href="route('ver-productos-categoria-marca',{categoria:'sumps', marca:'reef-octopus'})">Reef Octopus</Link>
                  </li>

            </ul>
         </li>

         <li>
            <button type="button" class="w-full flex items-center text-gray-500 hover:text-white hover:bg-sky-700  block px-3 py-2 rounded-md text-base font-bold" @click="showSubMenuMovil('iluminacion_movil')">

                  <span >iluminacion</span>
                  <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="iluminacion_movil" class="sub-menu-movil hidden text-slate-500  px-3 py-2">
                  <li>
                     <Link class="font-bold" :href="route('ver-productos-categoria',{categoria:'led'})">LED</Link>
                  </li>
                  <li>
                    <Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'aquamax'})">Aquamax</Link>
                  </li>
                  <li>
                    <Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'coral-box'})">Coral Box</Link>
                  </li>
                   <li>
                    <Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'ecotech-marine'})">EchoTech Marine</Link>
                  </li>
                   <li>
                   <Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'ice-cap'})">Ice Cap</Link>
                  </li>
                   <li>
                    <Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'kessil'})">Kessil</Link>
                  </li>
                   <li>
                    <Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'maxspect'})">Maxspect</Link>
                  </li>
                  <li>
                    <Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'neptune-systems'})">Neptune Systems</Link>
                  </li>
                  <li>
                   <Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'orphek'})">Orphek</Link>
                  </li>
                  <li><Link :href="route('ver-productos-categoria-marca',{categoria:'led', marca:'red-sea'})">Red Sea</Link></li>
            </ul>
         </li>

           <li>
            <button type="button" class="w-full flex items-center text-gray-500 hover:text-white hover:bg-sky-700  block px-3 py-2 rounded-md text-base font-bold" @click="showSubMenuMovil('bombas_plomeria_movil')">
             
                  <span >Bombas y plomeria</span>
                  <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>



            <ul id="bombas_plomeria_movil" class="sub-menu-movil hidden text-slate-500  px-3 py-2">
                 <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'cabezas-de-poder'})">Cabezas de Poder</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'coral-box'})">Coral Box</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'ecotech-marine'})">EcoTech Marine</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'ice-cap'})">IceCap</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'innovative-marine'})">Innovative Marine</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'jbj'})">JBJ</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'jebao'})">Jebao</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'maxi-jet'})">Maxi-Jet</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'maxspect-gyre'})">Maxspect Gyre</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'neptune-systems'})">Neptune Systems</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'red-sea'})">Red Sea</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'reef-octopus'})">Reef Octopus</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'sicce'})">Sicce</Link></li>

                <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'bombas-sumergibles'})">Bombas Sumergibles</Link></li>
                <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'ecotech-marine'})">EcoTech Marine</Link></li>
                <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'eheim'})">Eheim</Link></li>
                 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'innovative-marine'})">Innovative Marine</Link></li>
                  <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'lifegard'})">Lifegard</Link></li>
                  <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'maxspect'})">Maxspect</Link></li>
                  <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'neptune-systems'})">Neptune Systems</Link></li>
                  <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'reef-octopus'})">Reef Octopus</Link></li>
                  <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'sicce'})">Sicce</Link></li>
                  <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'coral-box'})">Coral Box</Link></li>
                  <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-sumergibles', marca:'jebao'})">Jebao</Link></li>

                      <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'bombas-externas'})">Bombas Externas</Link></li>
                     <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'ecotech-marine'})">EcoTech Marine</Link></li>
                     <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'iwaki'})">Iwaki</Link></li>
                     <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'neptune-systems'})">Neptune Systems</Link></li>
                     <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'reeflo'})">ReeFlo</Link></li>
                     <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'reef-octopus'})">Reef Octopus</Link></li>
                     <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'sicce'})">Sicce</Link></li>
                     <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'coral-box'})">Coral Box</Link></li>
                     <li><Link :href="route('ver-productos-categoria-marca',{categoria:'bombas-externas', marca:'jebao'})">Jebao</Link></li>

                <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'plomeria'})">Plomeria</Link></li>
 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'bulkheads'})">Bulkheads</Link></li>
 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:'lockline'})">Lockline</Link></li>
 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:''})">Jets de regreso</Link></li>
 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'cabezas-de-poder', marca:''})">Tubería</Link></li>



            </ul>
         </li>


           <li>
            <button type="button" class="w-full flex items-center text-gray-500 hover:text-white hover:bg-sky-700  block px-3 py-2 rounded-md text-base font-bold" @click="showSubMenuMovil('aditivos_movil')">
             
                  <span >Aditivos</span>
                  <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="aditivos_movil" class="sub-menu-movil hidden text-slate-500  px-3 py-2">
 <li class="font-bold">Aquaforest</li>
 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'aquaforest'})">Calcio, alcalinidad y magnesio</Link></li>
 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'trace-elements', marca:'aquaforest'})">Trace Elements</Link></li>
 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'nutricion-coralina', marca:'aquaforest'})">Nutrición coralina</Link></li>
 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'biofiltracion-control-de-nutrientes', marca:'aquaforest'})">Biofiltración & Control de nutrientes</Link></li>
 <li class="font-bold">Brightwell</li>
 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'brightwell'})">Calcio, alcalinidad y magnesio</Link></li>
 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'nutricion-coralina', marca:'brightwell'})">Nutrición coralina</Link></li>
 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'trace-elements', marca:'brightwell'})">Trace Elements</Link></li>
 <li><Link :href="route('ver-productos-categoria-marca',{categoria:'biofiltracion-control-de-nutrientes', marca:'brightwell'})">Biofiltración & Control de nutrientes</Link></li>

  <li class=" font-bold ">Red sea</li>
<li><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'red-sea'})">Calcio, alcalinidad y magnesio</Link></li>
<li><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'red-sea'})">Nutrición coralina</Link></li>
<li><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'red-sea'})">Trace Elements</Link></li>
<li><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'red-sea'})">Oligoelementos</Link></li>
<li><Link :href="route('ver-productos-categoria-marca',{categoria:'calcio-alcalinidad-y-magnesio', marca:'red-sea'})">Biofiltración & Control de nutrientes</Link></li>


            </ul>
         </li>

          <li>
            <button type="button" class="w-full flex items-center text-gray-500 hover:text-white hover:bg-sky-700  block px-3 py-2 rounded-md text-base font-bold" @click="showSubMenuMovil('osmosis_inversa_movil')">
             
                  <span >Ósmosis inversa</span>
                  <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="osmosis_inversa_movil" class="sub-menu-movil hidden text-slate-500  px-3 py-2">
                 <li class="font-bold ">
                    <Link :href="route('ver-productos-categoria',{categoria:'sistemas-de-osmosis-inversa'})">Sistemas de ósmosis inversa</Link>
                  </li>
                   <li>
                    <Link :href="route('ver-productos-categoria',{categoria:'sistemas-rodi-de-4-etapas'})">Sistemas RO/DI de 4 etapas</Link></li>
                   <li>
                    <Link :href="route('ver-productos-categoria',{categoria:'sistemas-rodi-de-5-etapas'})">Sistemas RO/DI de 5 etapas</Link></li>
                   <li><Link :href="route('ver-productos-categoria',{categoria:'sistemas-rodi-de-6-etapas'})">Sistemas RO/DI de 6 etapas</Link></li>
                   <li><Link :href="route('ver-productos-categoria',{categoria:'sistemas-rodi-de-7-etapas'})">Sistemas RO/DI de 7 etapas</Link></li>
                   <li><Link :href="route('ver-productos-categoria',{categoria:'membranas-de-osmosis-inversa'})">Membranas de ósmosis inversa</Link></li>
                   <li><Link :href="route('ver-productos-categoria',{categoria:'accesorios-de-osmosis-inversa'})">Accesorios de ósmosis inversa</Link></li>
                   <li><Link :href="route('ver-productos-categoria',{categoria:'bombas-de-refuerzo-y-accesorios'})">Bombas de refuerzo y accesorios</Link></li>
                   <li><Link :href="route('ver-productos-categoria',{categoria:'monitores-medidores-y-controladores'})">Monitores, medidores y controladores</Link></li>
                   <li><Link :href="route('ver-productos-categoria',{categoria:'kits-de-actualizacion'})">Kits de actualización</Link></li>
                   <li><Link :href="route('ver-productos-categoria',{categoria:'accesorios-oi'})">Accesorios</Link></li>
            </ul>
         </li>

          <li>
            <button type="button" class="w-full flex items-center text-gray-500 hover:text-white hover:bg-sky-700  block px-3 py-2 rounded-md text-base font-bold" @click="showSubMenuMovil('kits_prueba_movil')">
             
                  <span >Kits de pruebas</span>
                  <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="kits_prueba_movil" class="sub-menu-movil hidden text-slate-500  px-3 py-2">
                  <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'kits-multiparametricos'})"> Kits multiparamétricos</Link></li>
                    <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'kits-alcalinidad'})"> Alcalinidad</Link></li>
                    <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'kits-calcio'})"> Calcio</Link></li>
                    <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'kits-magnesio'})"> Magnesio</Link></li>
                    <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'kits-fosfato'})"> Fosfato</Link></li>
                    <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'kits-nitrato-y-nitrito'})"> Nitrato y nitrito</Link></li>
                    <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'kits-amoniaco'})"> Amoníaco</Link></li>
                    <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'kits-ph'})"> pH</Link></li>
                    <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'oligoelementos-menores'})"> Oligoelementos menores</Link></li>
                    <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'controladores-y-monitores'})"> Controladores y monitores</Link></li>
            </ul>
         </li>

          <li>
            <button type="button" class="w-full flex items-center text-gray-500 hover:text-white hover:bg-sky-700  block px-3 py-2 rounded-md text-base font-bold" @click="showSubMenuMovil('hidrometros_refractometros_movil')">
             
                  <span >Hidrómetros y Refractómetros </span>
                  <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="hidrometros_refractometros_movil" class="sub-menu-movil hidden text-slate-500  px-3 py-2">
                 <li><Link :href="route('ver-productos-categoria',{categoria:'marine-water-hanna-checkers'})">  Marine Water Hanna Checkers</Link></li>
                   <li><Link :href="route('ver-productos-categoria',{categoria:'accesorios-y-estandares'})"> Accesorios y estándares</Link></li>
                   <li><Link :href="route('ver-productos-categoria',{categoria:'sondas-y-accesorios-del-controlador'})"> Sondas y accesorios del controlador</Link></li>
                   <li><Link :href="route('ver-productos-categoria',{categoria:'temporizadores'})"> Temporizadores</Link></li>
            </ul>
         </li>

       


         <li>
            <button type="button" class="w-full flex items-center text-gray-500 hover:text-white hover:bg-sky-700  block px-3 py-2 rounded-md text-base font-bold" @click="showSubMenuMovil('sal_mantenimiento_movil')">
             
                  <span >Sal y Mantenimiento</span>
                  <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="sal_mantenimiento_movil" class="sub-menu-movil hidden text-slate-500  px-3 py-2">
            <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'sal'})">Sal</Link></li>
           <li><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'tropic-marin'})">Tropic Marin</Link></li>
           <li><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'aquaforest'})">Aquaforest</Link></li>
           <li><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'instant-ocean'})">Instant Ocean</Link></li>
           <li><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'reef-crystals'})">Reef Crystals</Link></li>
           <li><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'coralife'})">Coralife</Link></li>
           <li><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'red-sea-coral-pro'})">Red Sea Coral Pro</Link></li>
           <li><Link :href="route('ver-productos-categoria-marca',{categoria:'sal', marca:'red-sea-mix'})">Red Sea Mix</Link></li>


            <li class="font-bold">Mantenimiento</li>
            <li><Link :href="route('ver-productos-categoria',{categoria:'calcetines-filtrantes'})">Calcetines Filtrantes</Link></li>
            <li><Link :href="route('ver-productos-categoria',{categoria:'limpiadores-de-cristal-y-acrilico'})">Limpiadores de cristal y acrílico</Link></li>
            <li><Link :href="route('ver-productos-categoria',{categoria:'medicamentos'})">Medicamentos</Link></li>
            <li><Link :href="route('ver-productos-categoria',{categoria:'redes'})">Redes</Link></li>
            <li><Link :href="route('ver-productos-categoria',{categoria:'pinzas'})">Pinzas</Link></li>
            <li><Link :href="route('ver-productos-categoria',{categoria:'trampas'})">Trampas</Link></li>




            </ul>
         </li>

         <li>
            <button type="button" class="w-full flex items-center text-gray-500 hover:text-white hover:bg-sky-700  block px-3 py-2 rounded-md text-base font-bold" @click="showSubMenuMovil('skimmers_reactores_filtracion_movil')">
             
                  <span >Skimmers, Reactores y Filtración</span>
                  <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="skimmers_reactores_filtracion_movil" class="sub-menu-movil hidden text-slate-500  px-3 py-2">
            <li class="font-bold ">
            <Link :href="route('ver-productos-categoria',{categoria:'skimmers-internos'})">Skimmers Internos</Link>
            </li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'royal-exclusiv'})">Royal Exclusiv</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'red-sea'})">Red Sea</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'reef-octopus'})">Reef Octopus</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'aquamax'})">Aquamax</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'bubble-magus'})">Bubble Magus</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'hydor'})">Hydor</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'ice-cap'})">IceCap</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'innovative-marine'})">Innovative Marine</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'maxspect'})">Maxspect</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'nyos'})">Nyos</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'eshopps'})">Eshopps</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'tunze'})">Tunze</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'ultra-reef'})">Ultra Reef</Link></li>

            <li class="font-bold"> <Link :href="route('ver-productos-categoria',{categoria:'reactores'})">Reactores</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'boyu'})">Algae Scrubbers y Reactores</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'boyu'})">Reactores de Biopellets</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'boyu'})">Reactores de Carbón y GFO</Link></li>
            <li><Link :href="route('ver-productos-categoria-marca',{categoria:'skimmers-internos', marca:'boyu'})">Reactores de Calcio</Link></li>

             <li class="font-bold "> <Link :href="route('ver-productos-categoria',{categoria:'filtracion'})">Filtros</Link></li>
            </ul>
         </li>

         <li>
            <button type="button" class="w-full flex items-center text-gray-500 hover:text-white hover:bg-sky-700  block px-3 py-2 rounded-md text-base font-bold" @click="showSubMenuMovil('calentadores_chillers_movil')">
             
                  <span >Calentadores y chillers</span>
                  <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="calentadores_chillers_movil" class="sub-menu-movil hidden text-slate-500  px-3 py-2">
                 <li><Link :href="route('ver-productos-categoria',{categoria:'calentadores'})">Calentadores</Link></li>
<li><Link :href="route('ver-productos-categoria',{categoria:'chillers'})">Chillers</Link></li>
<li><Link :href="route('ver-productos-categoria',{categoria:'ventiladores'})">Ventiladores</Link></li>
<li><Link :href="route('ver-productos-categoria',{categoria:'termometros-y-controladores'})">Termómetros y Controladores</Link></li>
            </ul>
         </li>

          <li>
            <button type="button" class="w-full flex items-center text-gray-500 hover:text-white hover:bg-sky-700  block px-3 py-2 rounded-md text-base font-bold" @click="showSubMenuMovil('alimentos_peces_corales_movil')">
             
                  <span >Alimentos para peces y corales</span>
                  <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
            <ul id="alimentos_peces_corales_movil" class="sub-menu-movil hidden text-slate-500  px-3 py-2">
                <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'alimentos-para-peces'})">Alimentos para peces</Link></li>
               <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'spectrum'})">Spectrum</Link></li>
               <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'reef-nutrition'})">Reef Nutrition</Link></li>
               <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'ocean-nutrition'})">Ocean Nutrition</Link></li>
               <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'hikari'})">Hikari</Link></li>
               <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'two-little-fishies'})">Two Little Fishies</Link></li>
               <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'brightwell-aquatics'})">Brightwell Aquatics</Link></li>
               <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'tetra'})">Tetra</Link></li>
               <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-peces', marca:'seachem'})">Seachem</Link></li>

                <li class="font-bold"><Link :href="route('ver-productos-categoria',{categoria:'alimentos-para-corales'})">Alimentos para Corales</Link></li>
                <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'aquaforest'})">Aquaforest</Link></li>
                <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'bulk-reef-supply'})">Bulk Reef Supply</Link></li>

                <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'nyos'})">Nyos</Link></li>
                <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'tropic-marin'})">Tropic Marin</Link></li>
                <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'brightwell-aquatics'})">Brightwell Aquatics</Link></li>
                <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'reef-nutrition'})">Reef Nutrition</Link></li>
                <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'two-little-fishies'})">Two Little Fishies</Link></li>
                <li><Link :href="route('ver-productos-categoria-marca',{categoria:'alimentos-para-corales', marca:'seachem'})">Seachem</Link></li>

            </ul>
         </li>









        
        
        
      </ul>
   </div>
</div>
      
</template>

