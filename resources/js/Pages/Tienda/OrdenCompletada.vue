<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <Head title="Tienda" />

  <div class="min-h-screen relative">
    <NavBarTienda  />
    <NavLeft />

    <section class="w-full min-h-screen bg-sky-600 pt-20 pl-10 pr-10 pb-10">
      <div class="">
       

        <div class="flex justify-center">
          <div v-if="order" class="bg-white w-[30rem] p-2 rounded-md shadow-md">
            <div class="flex justify-center  ">
               <img src="/imagenes/logos/logo-pez.png" style="width:150px; ">
            </div>
            <div class="p-4 mb-4 text-gray-700">
            <p class="text-center text-sky-800 font-semibold mb-2">Aquatic Depot</p>
            <div class="mb-4">
            <p class="text-center">{{order.created_at}}</p>
            <p class="text-center">Ticket de compra: {{ order.id }}</p>     
            <p class="text-center">Tu pedido se a completado</p>
            </div>
            
            <div class="py-2 border-b border-t border-gray-300">
               <table class="text-sm">
                <thead>
                  <tr>
                     <th class="p-2" >Descripcion</th>
                     <th class="p-2" >Cantidad</th>
                     <th class="p-2" >Precio</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(orderDetail, index) in orderDetails" :key="index">
                      <td class="p-2 text-xs" >{{orderDetail.descripcion}}</td>
                      <td class="p-2 text-xs text-center">{{orderDetail.cantidad}}</td>
                      <td class="p-2 text-xs" >${{orderDetail.precio}}</td>
                  </tr>
                </tbody>
               </table>

            </div>
            <div class="py-2 flex justify-between w-full">
              <div>
                Total
              </div>
              <div>
                ${{order.total}}
              </div>

            </div>


            </div>

            <div class="flex justify-center mb-4">
              <Link :href="route('inicio')" class="bg-sky-600 shadow-md text-white font-bold rounded-md
                  pl-5 pr-5 pt-2 pb-2">
                Seguir comprando
              </Link>
            </div>
          </div>
          <div v-else class="bg-white w-1/2  p-5 rounded-md shadow-md">
            <p class="text-center">No tienes ninguna orden registrada</p>
          </div>
        </div>
      </div>
    </section>
    <Contacto/>
    
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
import Contacto from "@/Layouts/Contacto.vue";

export default {
  props: {
    orderProp: Object,
    orderDetailsProp:Object
  },

  components: {
    Head,
    Modal,
    NavBarTienda,
    NavLeft,
    Link,
    ActionMessage,
    TitleSeparator,
    Contacto,
    
  },
  data() {
    return {
      order:[],
      orderDetails:[],
    }
  },
 
  mounted() {
    this.order = this.orderProp[0];
    this.orderDetails = this.orderDetailsProp;
    localStorage.removeItem('carrito');
  },
};
</script>


