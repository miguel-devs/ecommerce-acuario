<template>
  <!-- This example requires Tailwind CSS v2.0+ -->

  <Head title="Tienda" />

  <div class="min-h-screen relative">
    <NavBarTienda :totalCarritoProps="totalCarrito" />
    <NavLeft />

    <section class="w-full min-h-screen bg-sky-600 pt-20 pl-10 pr-10 pb-10">
      <div class="w-full bg-white rounded-md shadow-md pt-6">
        <nav aria-label="Breadcrumb" class="mb-4">
          <ol role="list" class="max-w-2xl mx-auto px-4 flex items-center space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
            <li>
              <div class="flex items-center">
                <Link :href="route('inicio')" class="text-sm font-medium text-sky-700">Aquatic Depot
                </Link>
              </div>
            </li>

            <li class="text-sm">
              <div class="flex items-center">
                <span class="text-gray-300 ml-4 mr-4">\</span>
                <Link :href="
                  route('ver-productos-categoria', { categoria: urlCategoria })" aria-current="page"
                  class="font-medium text-gray-500 hover:text-gray-600">
                {{ nombreCategoria }}
                </Link>

              </div>
            </li>

            <li class="text-sm">
              <div class="flex">
                <span class="text-gray-300 ml-4 mr-4">\</span>
                <Link :href="
                  route('ver-productos-marca', { marca: urlMarca })
                " aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">
                {{ nombreMarca }}
                </Link>
              </div>
            </li>
          </ol>
        </nav>
        <!-- Image gallery -->

        <div class="w-full h-96 pt-2 pb-2 pl-4 pr-4 grid grid-flow-col grid-cols-4 gap-4">
          <div v-if="product.image_products" class=" h-96 p-2 overflow-y-auto scroll scroll-track scroll-thumb">
            <div  v-for="(imageproduct, index) in product.image_products" :key="index" class="mt-3 bg-white rounded-md flex justify-center p-1 cursor-pointer shadow-xl border border-slate-100">
              <img :src="`/imagenes/productos/${imageproduct.nombre}`" @click="imgPreview = imageproduct.nombre" />
            </div>
          </div>
          <div v-if="product.image_products" class=" h-96 col-span-3 flex justify-center">
            <div class="lg:w-2/5 aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
              <img v-if="imgPreview" :src="`/imagenes/productos/${imgPreview}`" :alt="product.nombre"
                class="w-full h-full object-center object-cover" />
              <img v-else :src="`/imagenes/productos/${product.imagen}`" :alt="product.nombre"
                class="w-full h-full object-center object-cover" />
            </div>
          </div>
          <div v-else class=" h-96 col-span-4 flex justify-center">
            <div class="lg:w-2/5 aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
              <img v-if="imgPreview" :src="`/imagenes/productos/${imgPreview}`" :alt="product.nombre"
                class="w-full h-full object-center object-cover" />
              <img v-else :src="`/imagenes/productos/${product.imagen}`" :alt="product.nombre"
                class="w-full h-full object-center object-cover" />
            </div>
          </div>
        </div>


        <!-- Product info -->
        <div class="
                  max-w-2xl
                  mx-auto
                  pt-10
                  pb-16
                  px-4
                  sm:px-6
                  lg:max-w-7xl
                  lg:pt-16
                  lg:pb-24
                  lg:px-8
                  lg:grid
                  lg:grid-cols-3
                  lg:grid-rows-[auto,auto,1fr]
                  lg:gap-x-8
                ">
          <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
            <h1 class="
                      text-2xl
                      font-extrabold
                      tracking-tight
                      text-gray-900
                      sm:text-3xl
                    ">
              {{ product.nombre }}
            </h1>
          </div>

          <!-- Options -->
          <div class="mt-4 lg:mt-0 lg:row-span-3">
            <h2 class="sr-only">Información del producto</h2>


            <div v-if="descuento">
              <p class="text-sky-500 text-sm">Producto con el {{ descuento }}% de descuento</p>
              <p class="text-sm text-gray-400 line-through">${{ product.precio }}</p>
              <p class="text-3xl text-gray-900">${{ descuentoFunction(product.precio, descuento) }}</p>
            </div>
            <div v-else>
              <p class="text-3xl text-gray-900">${{ product.precio }}</p>
            </div>

            <div class="mt-5">

              <div v-if="tipoProductoActive">
                <div v-for="(tipo, index) in tipoProducto" :key="index" class="mb-2">
                  <span>{{ product.nombre }} / {{ tipo.caracteristicas }}</span>
                  <div class="flex items-center mt-2 w-full ">
                    <button type="button" @click="minus(index)"
                      class="bg-white border border-slate-200 rounded-md shadow-md text-slate-500 h-6 w-6 rounded m-1"><i
                        class="fa-solid fa-minus m-1"></i></button>
                    <div class="w-1/2 bg-gray-100 rounded-full">
                      <input :data-product-option="tipo.id" :value="cantidad[index]"
                        class="w-full tipo-producto text-center bg-transparent border-transparent focus:border-transparent focus:ring-0"
                        type="text" min="0" placeholder="cantidad" readonly />
                    </div>
                    <button type="button" @click="more(index)"
                      class="bg-white border border-slate-200 rounded-md shadow-md text-slate-500 h-6 w-6 rounded m-1"><i
                        class="fa-solid fa-plus m-1"></i></button>
                  </div>
                </div>
              </div>
              <div v-else>
                <div class="mb-2">
                  <span>{{ product.nombre }}</span>
                  <div class="flex items-center mt-2 w-full">
                    <button type="button" @click="minus(0)"
                      class="bg-white border border-slate-200 rounded-md shadow-md text-slate-500 h-6 w-6 rounded m-1"><i
                        class="fa-solid fa-minus m-1"></i></button>
                    <div class="w-1/2 bg-gray-100 rounded-full">
                      <input :value="cantidad[0]"
                        class="w-full text-center bg-transparent border-transparent focus:border-transparent focus:ring-0"
                        type="text" min="0" placeholder="cantidad" readonly />
                    </div>
                    <button type="button" @click="more(0)"
                      class="bg-white border border-slate-200 rounded-md shadow-md text-slate-500 h-6 w-6 rounded m-1"><i
                        class="fa-solid fa-plus m-1"></i></button>
                  </div>
                </div>
              </div>

            </div>



            <!-- Sizes -->
            <div v-if="tipoProductoActive">
              <button v-if="desabilitarButton" class="mt-10 w-full bg-sky-600 shadow-md rounded-md py-3
                      px-8 flex items-center justify-center text-base font-medium text-white  cursor-not-allowed">
                Agregar al carrito
              </button>
              <button v-else @click="anyadirProductoConTipoCarrito" class="mt-10 w-full bg-sky-600 shadow-md rounded-md py-3
                      px-8 flex items-center justify-center text-base font-medium text-white ">
                Agregar al carrito
              </button>

            </div>
            <div v-else>
              <button v-if="desabilitarButton" class="mt-10 w-full bg-sky-600 shadow-md rounded-md py-3
                      px-8 flex items-center justify-center text-base font-medium text-white  cursor-not-allowed"
                :disabled="desabilitarButton">
                Agregar al carrito
              </button>
              <button v-else @click="anyadirProductoCarrito" class="mt-10 w-full bg-sky-600 shadow-md rounded-md py-3
                      px-8 flex items-center justify-center text-base font-medium text-white">
                Agregar al carrito
              </button>
            </div>
          </div>

          <div class="
                    py-10
                    lg:pt-6
                    lg:pb-16
                    lg:col-start-1
                    lg:col-span-2
                    lg:border-r
                    lg:border-gray-200
                    lg:pr-8
                  ">
            <!-- Description and details -->
            <div>
              <h3 class="sr-only">Descripción</h3>

              <div class="space-y-6">
                <p class="text-base text-gray-900">
                  {{ product.descripcion }}
                </p>
              </div>
            </div>

            <div class="mt-10">
              <h2 class="text-sm font-medium text-gray-900">Detalles</h2>

              <div class="mt-4 space-y-6 text-sm text-gray-600" v-html="product.detalles"></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <ActionMessage :on="active">
      <div class="bg-sky-700 pt-1 pb-4 p-2 fixed bottom-5 right-5 rounded-md">
        <div class="relative h-5">
          <i class="absolute right-0 cursor-pointer fa-solid fa-circle-xmark text-white" @click="active = false"></i>
        </div>
        <p class="text-white pl-10 pr-10">{{ messageCarrito }}
          <Link class="text-white font-bold" :href="route('verMiCarrito')">Ver mi carrito</Link>
        </p>
      </div>

    </ActionMessage>
  </div>
</template>

<script >
import { Head } from "@inertiajs/inertia-vue3";
import ActionMessage from "@/Layouts/ActionMessage.vue";
import NavBarTienda from "@/Layouts/NavBarTienda.vue";
import NavLeft from "@/Layouts/NavLeftDev.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
  props: ["productProp"],
  components: {
    Head,
    NavBarTienda,
    NavLeft,
    Link,
    ActionMessage,
  },
  data() {
    return {
      carrito: [],
      product: [],

      nombreCategoria: "",
      urlCategoria: "",
      nombreMarca: "",
      urlMarca: "",

      descuento: null,

      tipoProducto: [],

      imgPreview: null,
      active: false,
      messageCarrito: "",
      totalCarrito: 0,
      tipoProductoActive: false,
      desabilitarButton: true,
      cantidades: [],
      cantidad: [],
    };
  },


  mounted() {
    this.product = this.productProp[0];

    this.nombreCategoria = this.product.category.nombre;
    this.urlCategoria = this.product.category.url_clean;
    this.nombreMarca = this.product.brand.nombre;
    this.urlMarca = this.product.brand.url_clean;

    if (this.product.offer) {
      this.descuento = this.product.offer.descuento;
    }

    if (this.product.product_options) {
      this.tipoProducto = this.product.product_options;
    }
    if (JSON.parse(localStorage.getItem("carrito"))) {
      this.carrito = JSON.parse(localStorage.getItem("carrito"));
      if (this.carrito.length > 0) {
        this.totalCarrito = JSON.parse(localStorage.getItem("carrito")).length;
      }
    }

    if (this.tipoProducto.length > 0) {
      this.tipoProductoActive = true;
      this.tipoProducto.forEach((value, index) => {
        this.cantidad[index] = 0;
      });
    } else {
      this.cantidad[0] = 0;
    }
  },
  created() {
    this.messageCarrito = "Producto guardado en el carrito";

  },
  methods: {
    habilitarBotton() {
      this.desabilitarButton = true;
      this.cantidad.forEach((item, index) => {
        if (this.cantidad[index] > 0) {
          this.desabilitarButton = false;
        }
      });
    },
    descuentoFunction(precio, descuento) {
      let val = (((precio * descuento) / 100.00));
      val = precio - val;

      let xsd = val.toString().split('.')

      if (xsd.length === 1) {
        val = val.toString() + '.00'
        return val
      }
      if (xsd.length > 1) {
        if (xsd[1].length < 2) {
          val = val.toString() + '0'
        }
        return val
      }

    },

    more: function (index) {
      this.cantidad[index]++
      this.habilitarBotton();

    },

    minus: function (index) {
      if (this.cantidad[index] <= 0) return;
      this.cantidad[index]--
      this.habilitarBotton();
    },

    anyadirProductoCarrito() {

      if (this.cantidad[0] > 0) {

        let precioVar = this.product.offer ? this.descuentoFunction(this.product.precio, this.product.offer.descuento) : this.product.precio;
        this.carrito.push({
          id: this.product.id,
          nombre: this.product.nombre,
          imagen: this.product.imagen,
          precio: precioVar,
          cantidad: this.cantidad[0]
        });

        this.limpiarCantidad();

        const parsed = JSON.stringify(this.carrito);
        localStorage.setItem("carrito", parsed);
        this.active = true;
        this.totalCarrito++;
      }
    },

    anyadirProductoConTipoCarrito() {


      this.tipoProducto.forEach((item, index) => {
        let cantidadProducto = document.querySelector('input[data-product-option="' + item.id + '"]').value;
        if (cantidadProducto > 0) {

          let precioVar = this.product.offer ? this.descuentoFunction(this.product.precio, this.product.offer.descuento) : this.product.precio;

          this.carrito.push({
            id: this.product.id,
            tipoProductoId: item.id,
            descripcionTipoProducto: item.caracteristicas,
            nombre: this.product.nombre,
            precio: precioVar,
            imagen: this.product.imagen,
            cantidad: cantidadProducto,
          });
          this.totalCarrito++;
        }

      })
      this.limpiarCantidad();
      this.active = true;

      const parsed = JSON.stringify(this.carrito);
      localStorage.setItem("carrito", parsed);
    },

    limpiarCantidad() {
      this.cantidad.forEach((value, index) => {
        this.cantidad[index] = 0;
      });
      this.desabilitarButton = true;
    },



  },
};
</script>


