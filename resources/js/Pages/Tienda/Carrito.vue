<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <Head title="Tienda" />

  <div class="min-h-screen relative">
    <NavBarTienda :totalCarritoProps="totalCarrito" />
      <NavLeft />

      <section class="w-full min-h-screen bg-sky-600 pt-20 pl-10 pr-10 pb-10">
         
        <div class="">
          
          <PasosCompra/>

         <div class="lg:grid  lg:grid-cols-3 lg:grid-flow-col gap-4">
          
         <div class="lg:col-span-2 bg-white rounded-md p-5 shadow-md overflow-x-auto mb-4">
          <div v-if="carrito.length > 0">
            <table  class="border-collapse table-auto w-full text-sm rounded-md">
  <thead class="bg-white">
    <tr>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>

    </tr>
  </thead>
  <tbody class="bg-white dark:bg-slate-800">
    <tr v-for="(producto, index) in carrito" :key="index">
      <td class="border-b border-slate-100   p-4  " >
        <div class="w-20 h-20 lg:w-40 lg:h-40  bg-no-repeat bg-cover" :style="`background-image:url(/imagenes/productos/${producto.imagen})`"></div>        
      </td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 text-center" v-if="producto.tipoProductoId">
        {{producto.nombre}} / {{producto.descripcionTipoProducto}}
      </td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 text-center" v-else>{{producto.nombre}}</td>

      <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400 text-center" >${{formattedCurrencyValue(producto.precio , carrito[index].cantidad)}}</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400 text-center">
            <div class="flex justify-center items-center mt-2 w-full">
                <button type="button" @click="minus(index)" class="bg-white border border-slate-200 rounded-md shadow-md text-slate-500 h-6 w-6 rounded m-1"><i class="fa-solid fa-minus m-1"></i></button>
                <div class="w-full bg-gray-100 rounded-full pr-3 pl-3">
                <input  :value="carrito[index].cantidad"  class="ml-1 mr-1 w-full tipo-producto text-center bg-transparent border-transparent focus:border-transparent focus:ring-0" type="text" min="0" placeholder="cantidad" readonly/>
                </div>
                <button type="button" @click="more(index)" class="bg-white border border-slate-200 rounded-md shadow-md text-slate-500 h-6 w-6 rounded m-1"><i class="fa-solid fa-plus m-1"></i></button>
            </div> 
      </td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400 text-center">
           <button @click="showModalDelateProduct(index)" class="bg-white border border-slate-200 rounded-md shadow-md text-red-500 h-9 w-9 rounded m-1"><i class="fa-solid fa-trash-can"></i></button>
      </td>
    </tr>
    
  </tbody>
            </table>
         </div>
         <div v-else>
            <p class="text-center text-gray-700">No hay productos en el carrito</p>
          </div>
         </div>


         <div class="h-[28rem] bg-white border border-slate-200 rounded-md shadow-md text-slate-700">
            <div class="flex ">
              <div class="w-full border-b border-slate-200 p-2">
                 <div class="flex w-full justify-center">
                  <img src="/imagenes/logos/logo150-150.png">
                 </div>
              </div>
             
            </div>
            <div class="p-5">
               <p class="text-center text-slate-500 text-2xl ">Total del carrito</p>

            <div class="p-5">
              <p class="mb-5 text-lg text-slate-500 ">Total: <span v-if="totalPrecioCarrito">${{totalPrecioCarrito}}</span><span v-else>$0</span></p>
              <p class="text-sm text-lg text-slate-500">Impuestos incluidos</p>
            </div>
            <div class="w-full relative h-14 mt-5 p-5">
             <Link   v-if="carrito.length > 0" :href="route('datosCarrito')" class="absolute right-0 bg-sky-600 shadow-md font-bold rounded-md pb-2 pt-2 pl-3 pr-3 text-white ">Siguiente</Link>
             <button v-else class="absolute right-0 bg-sky-600 shadow-md font-bold rounded-md pb-2 pt-2 pl-3 pr-3 text-white cursor-not-allowed">Siguiente</button>
            </div>
            </div> 
         </div>
         </div>
        </div>
         
      </section>

      <Contacto></Contacto>
      <Modal :show="dalateProductModal" @close="dalateProductModal = false" >
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex sm:items-start">
            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
              <!-- Heroicon name: outline/exclamation -->
              <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
            </div>
            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
              <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Eliminar producto</h3>
              <div class="mt-2">
                <p class="text-sm text-gray-500">¿Estás seguro que quieres eliminar este producto? Esta información será eliminada y no podrá recuperarse.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button @click="delate" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Eliminar</button>
          <button @click="dalateProductModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
        </div>
      </Modal>
  </div>
</template>

<script >
import { Head } from "@inertiajs/inertia-vue3";
import Modal from "@/Jetstream/Modal.vue";
import NavBarTienda from "@/Layouts/NavBarTienda.vue";
import NavLeft from "@/Layouts/NavLeftDev.vue";
import { Link } from "@inertiajs/inertia-vue3";
import TitleSeparator from "@/Layouts/TitleSeparator.vue";
import Contacto from "@/Layouts/Contacto.vue";
import PasosCompra from "@/Layouts/PasosCompra.vue";


export default {
  props: {
    product: Object
  },
  components: {
    Head,
    Modal,
    NavBarTienda,
    NavLeft,
    Link,
    TitleSeparator,
    Contacto,
    PasosCompra
  },
  data() {
    return {
      carrito: [],
      active: false,
      messageCarrito: "",
      totalCarrito:null,
      dalateProductModal: false,
      indexProduct:null,
      totalPrecioCarrito:null
    };
  },

  mounted() {
    if(localStorage.getItem("carrito")) {
      this.carrito = JSON.parse(localStorage.getItem("carrito"));
      this.totalCarrito = JSON.parse(localStorage.getItem("carrito")).length;
    }
    this.calcularPrecioTotal();
  },
  
  methods: {
     formattedCurrencyValue(precio,cantidad){
         let valor = precio * cantidad;
         if(!valor){ return "0.00"}
            return parseFloat(valor).toFixed(2)
    },
    formattedTotal(valor){
            if(!valor){ return "0.00"}
            return parseFloat(valor).toFixed(2)
    },
    showModalDelateProduct:function(value){
      this.indexProduct = value;
      this.dalateProductModal = true;
    },
    more:function(index){
         this.carrito[index].cantidad++;
         this.modificarStorageCarrito();
    },
    minus:function(index){
         if(this.carrito[index].cantidad <= 1)return;
         this.carrito[index].cantidad--;
         this.modificarStorageCarrito();
    },
    delate:function(){
      this.carrito.splice(this.indexProduct , 1);
      this.indexProduct = null;
      this.dalateProductModal = false;
      this.modificarStorageCarrito();
      this.totalCarrito=this.carrito.length;
    },
    modificarStorageCarrito:function(){
              const parsed = JSON.stringify(this.carrito);
              localStorage.setItem("carrito", parsed);
              this.calcularPrecioTotal();
    },
    calcularPrecioTotal:function(){
                 this.totalPrecioCarrito = null;
                
                 this.carrito.forEach((item, index) => {
                     this.totalPrecioCarrito += item.precio * item.cantidad;
                 });
                 this.totalPrecioCarrito = this.formattedTotal(this.totalPrecioCarrito);
    }

  },
};
</script>


