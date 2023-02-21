<template>
  <!-- This example requires Tailwind CSS v2.0+ -->
  <Head title="Tienda" />

  <div class="min-h-screen relative">
    <NavBarTienda :totalCarritoProps="totalCarrito" />
    <div class="w-full h-full  relative ">
      <NavLeft />

      <section
        class="
          w-full
          min-h-screen
          bg-sky-600 
          pt-20
          pl-10
          pr-10
          pb-10
        "
      >
        <div class="">
          

         
            <div class="rounded-md shadow-md bg-white">
              <div class=" pt-4 pb-4 pl-4 pr-4">
                <div class="border-b border-slate-200 pb-2">
                <p class="text-center text-slate-500 ">
                  Datos de envio
                </p>
                </div>
              </div>
              <div class="p-5">
                <div >
                    <div class="mb-2 lg:grid grid-cols-3 gap-4 ">
                      <div>
                      <JetLabel for="remitente" value="Nombre y apellido" />
                      <JetInput
                        id="remitente"
                        v-model="formDatosEnvio.nombre"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                      />
                    </div>
                    <div>
                      <JetLabel for="correo" value="Correo" />
                      <JetInput
                        id="correo"
                        v-model="formDatosEnvio.correo"
                        type="email"
                        class="mt-1 block w-full"
                        required
                      />
                    </div>
                    <div>
                       <JetLabel for="telefono" value="Teléfono" />
                      <JetInput
                        id="telefono"
                        v-model="formDatosEnvio.telefono"
                        type="tel"
                        pattern="[0-9]{10}"
                        class="mt-1 block w-full"
                        required
                      />
                    </div>
                    </div>
                    
                    
                    <div class="mb-2 lg:grid grid-cols-4 gap-4 ">
                      <div class="col-span-2">
                      <JetLabel for="calle" value="Calle" />
                      <JetInput
                        v-model="formDatosEnvio.calle"
                        id="calle"
                        type="text"
                        class="mt-1 block w-full"
                        required
                        autofocus
                      />
                      </div>
                      <div>
                        <JetLabel for="noExterior" value="No. Exterior" />
                     
                      <JetInput
                        id="noExterior"
                        v-model="formDatosEnvio.noExterior"
                        type="text"
                        class="mt-1 block w-full"
                        required
                      />
                      </div>
                      <div>
                       <JetLabel for="noInterior" value="No. Interior" />
                     
                      <JetInput
                        id="noInterior"
                        v-model="formDatosEnvio.noInterior"
                        type="text"
                        class="mt-1 block w-full"
                        required
                      />
                      </div>
                    </div>
                   
                  
                    <div class="mb-2 mb-2 lg:grid grid-cols-7 gap-4 ">
                      <div>
                      <JetLabel for="cp" value="C.P." />
                      <JetInput
                        v-model="formDatosEnvio.cp"
                        id="cp"
                        type="text"
                        class="mt-1 block w-full"
                        required
                      />
                      </div>
                      <div class="col-span-2">
                      <JetLabel for="colonia" value="Colonia" />
                      <JetInput
                        v-model="formDatosEnvio.colonia"
                        id="colonia"
                        type="text"
                        class="mt-1 block w-full"
                        required
                      />
                    </div>
                    <div class="col-span-2">
                       <JetLabel
                        for="municipioDelegacion"
                        value="Municipio/Delegación"
                      />
                     
                      <JetInput
                        v-model="formDatosEnvio.municipioDelegacion"
                        id="municipioDelegacion"
                        type="text"
                        class="mt-1 block w-full"
                        required
                      />
                    </div>

                     <div class="col-span-2">
                      <JetLabel for="estado" value="Estado" />
                    
                      <JetInput
                        v-model="formDatosEnvio.estado"
                        id="estado"
                        type="text"
                        class="mt-1 block w-full"
                        required
                      />
                    </div>

                    </div>
                    
                   
                    <div class="mb-2">
                      <JetLabel
                        for="nombrePersonaRecibir"
                        value="Nombre de la persona que va a recibir"
                      />
                     
                      <JetInput
                        v-model="formDatosEnvio.nombrePersonaRecibir"
                        id="nombrePersonaRecibir"
                        type="text"
                        class="mt-1 block w-full"
                        required
                      />
                    </div>
                    <div class="flex flex-wrap -mx-2 mt-4">
                <div class="p-2 w-full" v-if="false">
                    <div class="relative">
                        <label for="card-element" class="leading-7 text-sm text-gray-600">Datos de la tarjeta <br><span class="text-xs">Por seguridad, no guardamos los datos de tu tarjeta.</span></label>
                        <div id="card-element"></div>
                         <div v-if="errors.stripe" id="payment-message" class="leading-7 text-sm text-red-400">{{errors.stripe}}</div>

                    </div>
                </div>
            </div>

                    <div  class="flex justify-end mt-5">
                      <button
                        class="
                          bg-color-acuatica
                          rounded
                          text-white
                       
                          pb-2
                          pt-2
                          pl-2
                          pr-2
                        "
                         @click="processPayment"
                          v-text="paymentProcessing ? 'Procesando pedido' : 'Realizar pedido'"
                          :disabled='paymentProcessing'
                      >
                       
                      </button>
                    </div>
                </div>
              
              </div>
            </div>
           

          

        </div>
      </section>
      <Contacto/>
    </div>
      
  </div>
</template>

<script >
import { Head } from "@inertiajs/inertia-vue3";
import Modal from "@/Jetstream/Modal.vue";
import ActionMessage from "@/Layouts/ActionMessage.vue";
import NavBarTienda from "@/Layouts/NavBarTienda.vue";
import NavLeft from "@/Layouts/NavLeftDev.vue";
import { Link } from "@inertiajs/inertia-vue3";
import JetInput from "@/Jetstream/Input.vue";
import JetLabel from "@/Jetstream/Label.vue";
import Contacto from "@/Layouts/Contacto.vue";
import { loadStripe } from '@stripe/stripe-js';


export default {
  
  props:["errors"],
  components: {
    Head,
    Modal,
    NavBarTienda,
    NavLeft,
    Link,
    JetInput,
    JetLabel,
    Contacto,
  },
  data() {
    return {
      carrito: [],
      stripe: {},
      cardElement: {},
      paymentProcessing: false,
      paymentMensaje:null, 

      totalCarrito: null,
      totalPrecioCarrito: null,
      formDatosEnvio: {
        nombre: null,
        correo: null,
        telefono: null,
        calle: null,
        noExterior: null,
        noInterior: null,
        cp:null,
        colonia: null,
        municipioDelegacion: null,
        estado: null,
        nombrePersonaRecibir: null,
        total:null,

      },
    };
  },

  async  mounted() {
    if (localStorage.getItem("carrito")) {
      this.carrito = JSON.parse(localStorage.getItem("carrito"));
      this.totalCarrito = JSON.parse(localStorage.getItem("carrito")).length;
    }
    this.calcularPrecioTotal();

     this.stripe = await loadStripe(process.env.MIX_STRIPE_KEY);
            const elements = this.stripe.elements();
            this.cardElement = elements.create('card', {
                classes: {
                    base: 'bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 p-3 leading-8 transition-colors duration-200 ease-in-out'
                }
            });
            this.cardElement.mount('#card-element');
  },
  methods: {

/*

    async processPayment() {
                this.paymentProcessing = true;

               

                const {paymentMethod, error} = await this.stripe.createPaymentMethod(
                    'card', this.cardElement, {
                        billing_details: {
                            name: this.formDatosEnvio.nombre,
                            email: this.formDatosEnvio.correo,
                            address: {
                                line1: this.formDatosEnvio.calle +" " +this.formDatosEnvio.noInterior ,
                                state: this.formDatosEnvio.estado,
                                postal_code: this.formDatosEnvio.cp
                            }
                        }
                    }
                );

             

                if (error) {
                    this.paymentProcessing = false;
                    this.paymentMensaje = error.message;
                } else {
                    this.formDatosEnvio.payment_method_id = paymentMethod.id;
                    this.formDatosEnvio.total = this.totalPrecioCarrito;
                    this.formDatosEnvio.carrito = this.carrito;
                     
                    


                  this.$inertia.visit("/realizar-orden", {
  method: 'post',
  data: { datos: this.formDatosEnvio},
   preserveScroll: true,
                    replace: true ,
                    preserveState: true,

  onError: errors => {
                      this.paymentProcessing = false;
  },
})
                    
                   
                        
                }


            },*/


 processPayment() {
                this.paymentProcessing = true;

               

              
                    this.formDatosEnvio.total = this.totalPrecioCarrito;
                    this.formDatosEnvio.carrito = this.carrito;
                     
                    


                  this.$inertia.visit("/realizar-orden", {
  method: 'post',
  data: { datos: this.formDatosEnvio},
   preserveScroll: true,
                    replace: true ,
                    preserveState: true,

  onError: errors => {
                      this.paymentProcessing = false;
  },
})
                    
                   
                        


            },


    formattedCurrencyValue(precio,cantidad){
         let valor = precio * cantidad;
         if(!valor){ return "0.00"}
            return parseFloat(valor).toFixed(2)
    },
    formattedTotal(valor){
             if(!valor){ return "0.00"}
            return parseFloat(valor).toFixed(2)
    },
    calcularPrecioTotal: function () {
                 this.totalPrecioCarrito = null;
                
                 this.carrito.forEach((item, index) => {
                     this.totalPrecioCarrito += item.precio * item.cantidad;
                 });
                 this.totalPrecioCarrito = this.formattedTotal(this.totalPrecioCarrito);
    },
   
   
  },
};
</script>


