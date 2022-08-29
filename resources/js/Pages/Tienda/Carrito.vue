<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <Head title="Tienda" />

  <div class="min-h-screen relative">
    <NavBarTienda :totalCarritoProps="totalCarrito" />
      <NavLeft />

      <section class="w-full min-h-screen bg-sky-600 pt-20 pl-10 pr-10 pb-10">
         
        <div class="">
          <div class="bg-white flex justify-between p-5 mb-4 rounded-md shadow-md">
            <div>
              <div class="flex justify-center">
              <div class="h-10 w-10 p-2 text-center rounded-full bg-sky-600 shadow-md text-white font-bold">
                  <span>1</span>
              </div>
              
              </div>
              <p class="text-sky-600 font-bold">Mi carrito</p>
            </div>

            <div>
              <div class="flex justify-center">
              <div v-if="true" class="h-10 w-10 p-2 text-center rounded-full bg-sky-600 shadow-md text-white font-bold">
                  <span>2</span>
              </div>
              <div v-else class="h-10 w-10 p-2 text-center rounded-full  text-white font-bold">
                <i class="fa-solid fa-check"></i>
              </div>
              </div>
              <p class="text-sky-600  font-bold">Datos envio</p> 
            </div> 
            <div><div class="flex justify-center">
              <div v-if="true" class="h-10 w-10 p-2 text-center rounded-full bg-sky-600 shadow-md text-white font-bold">
                  <span>3</span>
              </div>
              <div v-else class="h-10 w-10 p-2 text-center rounded-full bg-white text-white font-bold">
                <i class="fa-solid fa-check"></i>
              </div>
              </div>
              <p class="text-sky-600  font-bold">Confirmación de orden</p>
            </div> 

          </div>
         <div class="grid grid-rows-2 grid-cols-3 grid-flow-col gap-4 gap-4">
          
         <div class="row-span-2  col-span-2 bg-white rounded-md p-5 shadow-md">
          <div v-if="carrito.length > 0">
            <table  class="border-collapse table-auto w-full text-sm rounded-md">
  <thead class="bg-white">
    <tr>
      <th></th>
      <th class="border-b font-medium p-4 text-slate-500 text-center">Producto</th>
      <th class="border-b font-medium p-4 text-slate-500 text-center">Precio</th>
      <th class="border-b font-medium p-4 text-slate-500 text-center" >Cantidad</th>
      <th class="border-b font-medium p-4 text-slate-500 text-center" ></th>

    </tr>
  </thead>
  <tbody class="bg-white dark:bg-slate-800">
    <tr v-for="(producto, index) in carrito" :key="index">
      <td class="border-b border-slate-100   p-4  " >
        <div class="w-40 h-40  bg-no-repeat bg-cover" :style="`background-image:url(/imagenes/productos/${producto.imagen})`">
        
        </div>        
      </td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 text-center" v-if="producto.tipoProductoId">
        {{producto.nombre}} / {{producto.descripcionTipoProducto}}
      </td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400 text-center" v-else>{{producto.nombre}}</td>

      <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400 text-center" >${{formattedCurrencyValue(producto.precio , carrito[index].cantidad)}}</td>
      <td class="border-b border-slate-100 dark:border-slate-700 p-4 pr-8 text-slate-500 dark:text-slate-400 text-center">
            <div class="flex justify-center items-center mt-2 w-full">
                <button type="button" @click="minus(index)" class="bg-white border border-slate-200 rounded-md shadow-md text-slate-500 h-6 w-6 rounded m-1"><i class="fa-solid fa-minus m-1"></i></button>
                <div class="w-1/2 bg-gray-100 rounded-full">
                <input  :value="carrito[index].cantidad"  class="w-full tipo-producto text-center bg-transparent border-transparent focus:border-transparent focus:ring-0" type="text" min="0" placeholder="cantidad" readonly/>
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


         <div class="bg-white border border-slate-200 rounded-md shadow-md text-slate-700">
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

      <section id="contacto" class="relative bg-cover bg-center bg-no-repeat" style="background-image:url(/imagenes/web/contacto.jpg)">
        <div class="bg-black/50 w-full h-full">
         <TitleSeparator class="w-full absolute -top-[1.7rem]">
                  Contacto
        </TitleSeparator> 
        <div class="flex pl-10 pr-10 pt-24 pb-24">
        <div>
                   <img src="/imagenes/logos/logo150-150.png" style="width:150px; height:150px">
       </div>
<div class="w-full flex justify-between p-5">
        <div class="w-1/2">
          <p class="text-white mb-2">Teléfono: 22222222</p>
          <p class="text-white mb-2">contacto@correo.com</p>
          <p class="text-white">Horarios: 10:00am - 8:00pm L-S</p>
        </div>
        <div class="w-1/2 flex justify-center items-center">
          <a href="#"
            ><div
              class="w-10 h-10 mr-5 rounded-lg bg-cover bg-no-repeat bg-center"
              style="background-image: url(imagenes/web/instagram.jpg)"
            ></div
          ></a>
          <a href="#"
            ><div
              class="w-10 h-10 mr-5 rounded-lg bg-cover bg-no-repeat bg-center"
              style="background-image: url(imagenes/web/whattsap.png)"
            ></div
          ></a>
          <a href="#"
            ><div
              class="w-10 h-10 mr-5 rounded-lg bg-cover bg-no-repeat bg-center"
              style="background-image: url(imagenes/web/facebook.jpg)"
            ></div
          ></a>
        </div>
      </div>
        </div>
       </div>
      </section>
      

  
     <ActionMessage :on="active">
        <div
          class="bg-white pt-1 pb-4 p-2 fixed bottom-5 right-5 rounded-md"
        >
          <div class="relative h-5">
            <i
              class="
                absolute
                right-0
                cursor-pointer
                fa-solid fa-circle-xmark
                text-white
              "
              @click="active = false"
            ></i>
          </div>
          <p class="text-white font-bold pl-10 pr-10">{{ messageCarrito }}</p>
        </div>
        <audio autoplay>
    <source src="/audio/add-carrito.mp3" type="audio/mp3">
  
</audio>
      </ActionMessage>
   
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
                <p class="text-sm text-gray-500">¿Estas seguro que quieres eliminar este producto? Esta informacion sera eliminada y no podra recuperarse.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button @click="delate" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-white text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Eliminar</button>
          <button @click="dalateProductModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
        </div>
      </Modal>
  </div>
</template>

<script >
import { Head } from "@inertiajs/inertia-vue3";
import Modal from "@/Jetstream/Modal.vue";
import ActionMessage from "@/Layouts/ActionMessage.vue";
import NavBarTienda from "@/Layouts/NavBarTienda.vue";
import NavLeft from "@/Layouts/NavLeftDev.vue";
import { Link } from "@inertiajs/inertia-vue3";
import TitleSeparator from "@/Layouts/TitleSeparator.vue";

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
    ActionMessage,
    TitleSeparator
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


