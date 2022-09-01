<script>
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

import ListProductosEncontrados from '@/Components/ListProductosEncontrados.vue';
import JetDropdown from '@/Jetstream/Dropdown.vue';
import JetDropdownLink from '@/Jetstream/DropdownLink.vue';

export default {
 components: {
      Link,JetDropdown,JetDropdownLink,
      ListProductosEncontrados
    },

    props:["totalCarritoProps"],

    data() {
        return {
            searchProduct: "", 
            productosEncontrados:null,
            loadSearchProduct:false,
            notFoundProduct:false,
            totalCarrito:null,
        }
    },
    watch: {
          searchProduct(newSearchProducto, oldSearchProducto) {
              if(newSearchProducto){
                 this.buscarProducto();
              }
          },
          totalCarritoProps(newTotalCarritoProps,_){
              this.totalCarrito = newTotalCarritoProps;
          }
    },
    methods: {
         showMenuMovil:function(){
                  let menuMovil = document.getElementById("mobile-menu");
                  let claseMenu = menuMovil;

                  if(claseMenu.classList.contains('hidden')){
                      menuMovil.classList.remove('hidden');
                      menuMovil.classList.add("show");
                  }else if(claseMenu.classList.contains('show')){
                      menuMovil.classList.remove('show');
                      menuMovil.classList.add("hidden");
                  }
         },
         showMenuProductos:function(){

         },

         closeModalSearch(){
           this.searchProduct = "";
         },

           onClick(event) {
           var modalSearch = document.getElementById("modalSearch");
           if(event.target == modalSearch){
               this.closeModalSearch();
           }
         },
         buscarProducto(){
             this.loadSearchProduct = true;
             this.notFoundProduct = false;
             this.productosEncontrados = null;
            axios
            .get(`/api/buscar/producto/${this.searchProduct}`)
            .then(response => {
               if(response.data.length > 0){
                   this.loadSearchProduct = false;
                   this.productosEncontrados = response.data;
               }else{
                   this.loadSearchProduct = false;  
                   this.productosEncontrados = null;
                   this.notFoundProduct = true;
               }
              });
         },
         logout(){
             Inertia.post(route('logout'));
         }
    },
   created() {
        this.menuLinks
  },
   mounted() {
    document.addEventListener('click', this.onClick);
   
  },
  beforeDestroy() {
    document.removeEventListener('click', this.onClick);
  },
}


</script>
<template>    
<nav class="w-full fixed top-0 bg-white shadow-md z-50  text-sm">

  <div class="max-w-7xl mx-auto pl-2 pr-2">
    <div class="relative flex items-center justify-between h-16">
      <!--sandwich movil-->
      <div class="absolute left-0 flex items-center lg:hidden">
        <!-- Mobile menu button-->
        <button type="button" v-on:click="showMenuMovil" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
    
          <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
     
          <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="flex-1 flex items-center justify-center ">
        <div class="flex-shrink-0 flex items-center">
         
           <Link :href="route('inicio')" class="text-gray-500 hover:text-sky-500  hover:text-md px-3 py-2 rounded-md text-sm font-bold">
                 <img class="block lg:hidden h-8 w-auto" src="/imagenes/logos/logo-pez.jpg" alt="Workflow">
                 <img class="hidden lg:block h-8 w-auto" src="/imagenes/logos/logo-pez.jpg" alt="Workflow" >  
                
           </Link>
           <div class="relative bg-slate-100 flex text-gray-700 font-bold rounded-lg">
               <div class="p-2"><i class="fa-solid fa-magnifying-glass"></i></div>
               <input v-model="searchProduct" class="bg-transparent border-transparent focus:border-transparent focus:ring-0" type="text" placeholder="Buscar" />
           </div>
          
        </div>
        <div class="hidden lg:block  w-full sm:ml-4">
          <div class="flex lg:justify-center items-center gap-6">
                 <Link :href="route('inicio')" class="text-gray-700 hover:text-sky-500 hover:text-lg px-3 py-2 rounded-md  font-semibold">
                    Inicio
                 </Link>
                 <Link :href="route('ofertas')" class="text-gray-700 hover:text-sky-500 hover:text-lg px-3 py-2 rounded-md  font-semibold">
                    Ofertas
                 </Link>
                 <Link :href="route('novedades')" class="text-gray-700 hover:text-sky-500 hover:text-lg px-3 py-2 rounded-md  font-semibold">
                    Novedades
                 </Link>
                 
                 <Link v-if="false" :href="route('calculadora')" class="text-gray-700 hover:text-sky-500 hover:text-lg px-3 py-2 rounded-md font-semibold">
                    Calculadora
                 </Link>
                             
                  <a href="#contacto" class="text-gray-700 hover:text-sky-500 hover:text-lg px-3 py-2 rounded-md  font-semibold">
                    Contacto
                  </a>
          </div>
        </div>
      </div>

      <div class="absolute right-0 flex items-center p-2">

       <div class="hidden sm:flex sm:items-center sm:ml-6">
                            

                            <!-- Settings Dropdown -->
                            <div v-if="$page.props.user" class="ml-3 mr-3 relative">
                                <JetDropdown align="right" width="48">
                                    <template #trigger>
                                        

                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ $page.props.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                       

                                        <JetDropdownLink :href="route('perfil.show')">
                                            Perfil
                                        </JetDropdownLink>
                                        <JetDropdownLink :href="route('mis.compras')">
                                            Mis compras
                                        </JetDropdownLink>
                                        <JetDropdownLink v-if="$page.props.user.role_id == 1" :href="route('dashboard.productos')" >
                                            Dashboard
                                        </JetDropdownLink>
                                      

                                        <div class="border-t border-gray-100" />

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <JetDropdownLink as="button">
                                                Cerrar sesión
                                            </JetDropdownLink>
                                        </form>
                                    </template>
                                </JetDropdown>
                            </div>
                            <div v-else class="ml-3 mr-3 relative">
                              <Link :href="route('login')" class="text-sm text-gray-700">
                              <i class="fa-solid fa-user  text-gray-500"></i> 
                              <span class="ml-2 text-gray-700 ">iniciar sersión</span>
                              </Link>
                            </div>

                        </div>

       <Link :href="route('verMiCarrito')" class="p-1 rounded-full relative">
          <span class="sr-only">Ver mi carrito</span>
         <i class="fa-solid fa-cart-shopping text-gray-500 "></i>
          <div v-if="this.totalCarritoProps" class="absolute -top-3 -right-3 w-5 h-5 rounded-full p-1 bg-red-600 text-sm text-white flex items-center justify-center" >
          <span>{{this.totalCarritoProps}}</span>
         </div>
        </Link>
       
        
      </div>
    </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="hidden md:hidden lg:hidden" id="mobile-menu" >
  
    <div class="px-2 pt-2 pb-3 space-y-1">
        <div v-if="$page.props.user" class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            
                            <div>
                                <div class="font-medium text-base text-gray-800">
                                    {{ $page.props.user.name }}
                                </div>
                                <div class="font-medium text-sm text-gray-500">
                                    {{ $page.props.user.email }}
                                </div>
                            </div>
                        </div>

                            <Link :href="route('perfil.show')" class="text-gray-500 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-bold"  :active="route().current('profile.show')">
                                Perfil
                            </Link>

                             <Link v-if="$page.props.user.role_id == 1" :href="route('dashboard.productos')" class="text-gray-500 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-bold"  :active="route().current('profile.show')">
                                Dashboard
                            </Link>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout" class="text-gray-500 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-bold" >
                                <button>
                                    Cerrar sesión
                                </button>
                            </form>
    </div>
    <div v-else>
       <Link :href="route('login')" class="text-gray-500 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-bold">
                              <i class="fa-solid fa-user "></i> 
                              <span class="ml-2">iniciar sersión</span>
       </Link>
    </div>
                 <Link :href="route('inicio')" class="text-gray-500 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-bold" >
                   Inicio
                 </Link>

                 <Link :href="route('ofertas')" class="text-gray-500 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-bold" >
                   Ofertas
                 </Link>
                 <Link :href="route('novedades')" class="text-gray-500 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-bold" >
                   Novedades
                 </Link>
                 
                 <Link v-if="false" :href="route('calculadora')" class="text-gray-500 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-bold" >
                    Calculadora
                 </Link>
                 <Link href="#" class="text-gray-500 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-bold" >
                    Contacto
                 </Link>
                 
    </div>
  </div>
  <div id="modalSearch" v-if="searchProduct" class="fixed w-full h-full bg-black/50 flex justify-center" >
    <div class="w-full md:w-2/4	lg:w-2/4 bg-white ml-2 mr-2 mt-2 m-auto   top-16 rounded-md  ">
         <div class="w-ful h-2 relative pt-2 pb-2 pl-4 pr-4">
              <i class="absolute right-2 top-2 fa-solid fa-circle-xmark text-sky-700 cursor-pointer" @click="closeModalSearch" ></i>
         </div>
          <div class="w-ful h-3 mb-5  pt-2 pb-2 pl-4 pr-4">
            <p class="text-center text-text-color-acuatica-600 font-bold">Productos encontrados</p>
         </div>
         <div class="max-h-96 overflow-y-auto scroll scroll-track scroll-thumb pt-2 pb-2 pl-4 pr-4">
          <ListProductosEncontrados :productosEncontradosProps="productosEncontrados" :notFoundProductProp="notFoundProduct" :loadSearchProductProp="loadSearchProduct"/>
         </div>
    </div>     
  </div>
</nav>

</template>


