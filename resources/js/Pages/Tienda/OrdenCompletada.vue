<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <Head title="Tienda" />

  <div class="min-h-screen relative">
    <NavBarTienda  />
    <NavLeft />

    <section class="w-full min-h-screen bg-sky-600 pt-20 pl-10 pr-10 pb-10">
      <div class="">
        <div class="bg-white flex justify-between p-5 mb-4 rounded-md shadow-md">
          <div>
            <div class="flex justify-center">
              <div class="h-10 w-10 p-2 text-center rounded-full bg-sky-600 shadow-md text-white font-bold">
                <i class="fa-solid fa-check"></i>
              </div>
            </div>
            <p class="text-sky-600 font-bold">Mi carrito</p>
          </div>

          <div>
            <div class="flex justify-center">
              <div class="h-10 w-10 p-2 text-center rounded-full bg-sky-600 shadow-md text-white font-bold">
                <i class="fa-solid fa-check"></i>
              </div>
            </div>
            <p class="text-sky-600 font-bold">Datos envio</p>
          </div>
          <div>
            <div class="flex justify-center">
              <div class="h-10 w-10 p-2 text-center rounded-full bg-sky-600 shadow-md text-white font-bold">
                <i class="fa-solid fa-check"></i>
              </div>
            </div>
            <p class="text-sky-600 font-bold">Confirmación de orden</p>
          </div>
        </div>
        <div class="flex justify-center">
          <div v-if="order" class="bg-white w-[30rem] p-2 rounded-md shadow-md">
            <div class="flex justify-center  ">
            <img src="/imagenes/logos/logo150-150.png">
            </div>
            <div class="p-4 mb-4 text-gray-700">
            <p class="text-center text-sky-800 font-semibold mb-2">AQUATICA</p>
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
    TitleSeparator
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


