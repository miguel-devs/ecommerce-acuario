<template>
  <!-- This example requires Tailwind CSS v2.0+ -->

  <Head title="Inicio" />
  <NavBarTienda :totalCarritoProps="totalCarrito" :propLinksInicio="true" />

  <div v-show="$page.props.flash.message"
    class="fixed bottom-0 p-1 right-4 z-50  mb-4 text-sm bg-white text-slate-700 border border-gray-300 shadow-md rounded-lg "
    role="alert">
    <div class="relative h-5">
      <div class="absolute top-0 right-0">
        <svg @click="$page.props.flash.message = null" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer"
          fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round"
            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
      </div>
    </div>
    <div class="font-medium p-2">
      {{ $page.props.flash.message }}

      <Link :href="route('tienda')" class="text-sky-500 ">Ir a la tienda</Link>
    </div>
  </div>

  <div class="min-h-screen relative  bg-sky-600 ">
    <NavLeft />
    <section class="w-full bg-white h-screen bg-cover bg-center bg-no-repeat"
      style="background-image:url(/imagenes/web/anemona.jpg)">
      <div class="w-full h-full flex justify-center items-center bg-black/50">


        <div>
          <p class="text-6xl font-extrabold  text-center mb-10 text-white">En Aquatic Depot tenemos los productos,
            accesorios y más para tu acuario.</p>
          <div class="w-full flex justify-center">
            <Link :href="route('tienda')"
              class="rounded-lg pl-4 pt-2 pr-4 pb-2 text-white bg-transparent border border-white font-bold">Tienda</Link>
          </div>
        </div>

      </div>

    </section>
    <section class="min-h-screen bg-gray-50 relative">

      <TitleSeparator class="w-full absolute -top-[1.7rem]">
        Productos
      </TitleSeparator>

      <div id="productos" class="pl-10 pr-10 pt-20 pb-20 ">
        <div  v-if="productosAleatorios.length > 0">
         <ListarProductos :productos=productosAleatorios> </ListarProductos>
        </div>
        <div v-else class="h-96 w-full flex justify-center items-center">
           <TheEmptyProducts></TheEmptyProducts>
        </div>

        <div v-if="productosMasVendidos.length > 0" class="pl-10 pr-10 pt-20 pb-20">
          <div class="border-b-2 border-gray-200  mb-20">
            <p class="bg-red-500 rounded-md text-white text-4xl text-center mb-5">Más vendidos</p>
          </div>
          <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 justify-items-center content-center">
            <div class="mr-5 bg-white rounded-md border border-gray-200 shadow-md p-2 relative"
              v-for="(productoMasVendido, index ) in productosMasVendidos" :key="index">
              <div v-if="productoMasVendido.product_order[0].offer"
                class="absolute rounded-full bg-sky-700 text-white p-1 text-sm h-8 w-8 flex justify-center items-center">
                {{ productoMasVendido.product_order[0].offer.descuento }}%
              </div>
              <div class="w-full flex justify-center">
                <img :src="`/imagenes/productos/${productoMasVendido.product_order[0].imagen}`"
                  style="width:150px; height:150px;" />
              </div>
              <p class="text-xs text-center">{{ productoMasVendido.product_order[0].nombre }}</p>
              <div class="flex justify-center">
                <Link
                  :href="route('ver-productos-categoria', { categoria: productoMasVendido.product_order[0].category.url_clean })"
                  class="text-xs text-gray-400">{{ productoMasVendido.product_order[0].category.nombre }}</Link>
              </div>

              <div v-if="productoMasVendido.product_order[0].offer">
                <p class="text-xs text-center text-gray-400 line-through">${{ productoMasVendido.product_order[0].precio }}
                </p>

                <p class="text-xs text-center text-sky-600">
                  ${{ descuento(productoMasVendido.product_order[0].precio, productoMasVendido.product_order[0].offer.descuento) }}
                </p>
              </div>
              <div v-else>
                <p class="text-xs text-center text-sky-600">${{ productoMasVendido.product_order[0].precio }}</p>
              </diV>


              <div class="flex justify-center p-2">
                <Link class="bg-sky-400 pt-1 pb-1 pl-4 pr-4 text-white rounded-md "
                  :href="route('ver-producto', { product: productoMasVendido.product_id })">
                Añadir
                </Link>
              </div>
            </div>
          </div>
        </div>


      </div>

    </section>

    <TheSectionNosotros></TheSectionNosotros>

    <TheSectionCategorias></TheSectionCategorias>

    <section id="section-marcas" class="relative bg-white">
      <TitleSeparator class="w-full absolute -top-[1.7rem]">
        Marcas Destacadas
      </TitleSeparator>
      <div class="flex justify-center items-center p-10">
        <div class="bg-white rounded-md">
          <div class="grid grid-cols-2 gap-6 lg:grid-cols-4 justify-items-center ">
            <Link href="/productos/marca/aquaforest"><img class="mb-20" src="/imagenes/web/acuaforest.jpg"
              data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="100"></Link>
            <Link href="/productos/marca/aquaillumination"><img class="mb-20" src="/imagenes/web/aquaillumination.jpg"
              data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="200"></Link>
            <Link href="/productos/marca/ecotech-marine"><img class="mb-20" src="/imagenes/web/ecotech.jpg"
              data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300"></Link>
            <Link href="/productos/marca/red-sea"><img class="mb-20" src="/imagenes/web/redsea.jpg" data-aos="fade-up"
              data-aos-anchor-placement="top-bottom" data-aos-delay="400"></Link>
          </div>
          <div class="grid gap-6  grid-cols-2 justify-items-center">
            <Link href="/productos/marca/sicce"><img class="mb-20" src="/imagenes/web/sicce.jpg" data-aos="fade-up"
              data-aos-anchor-placement="top-bottom" data-aos-delay="100"></Link>
            <Link href="/productos/marca/neptune-systems"><img class="mb-20" src="/imagenes/web/neptunesystem.jpg"
              data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="200"></Link>
          </div>

        </div>
      </div>
    </section>
    <Contacto></Contacto>


  </div>
</template>

<script >
import { Head } from "@inertiajs/inertia-vue3";
import NavBarTienda from "@/Layouts/NavBarTienda.vue";
import NavLeft from "@/Layouts/NavLeftDev.vue";
import { Link } from "@inertiajs/inertia-vue3";
import TitleSeparator from "@/Layouts/TitleSeparator.vue";
import Contacto from "@/Layouts/Contacto.vue";
import TheSectionCategorias from "@/Components/TheSectionCategorias.vue";
import TheEmptyProducts from "@/Layouts/TheEmptyProducts.vue";
import TheSectionNosotros from "@/Components/TheSectionNosotros.vue";
import ListarProductos from "@/Components/ListarProductos.vue";


export default {
  components: {
    Head,
    NavBarTienda,
    NavLeft,
    Link,
    TitleSeparator,
    TheEmptyProducts,
    Contacto,
    TheSectionCategorias,
    TheSectionNosotros,
    ListarProductos
  },
  props: {
    productosCarrito: Object,
  }, data() {
    return {
      totalCarrito: null,
      productosAleatorios: [],
      productosMasVendidos: [],
      productosCategorias: []
    }
  },
  mounted() {
    if (localStorage.getItem("carrito")) {
      this.totalCarrito = JSON.parse(localStorage.getItem("carrito")).length;
    }
    this.ProdAleatorios();
    this.ProdMasVendidos();
  },

  methods: {
    descuento(precio, descuento) {
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
    ProdAleatorios() {
      axios
        .get(`/api/productos/random/10`)
        .then(response => {
          this.productosAleatorios = response.data;

          if (response.data.length > 0) {
            // this.loadSearchProduct = false;
            //this.productosEncontrados = response.data;
          } else {
            // this.loadSearchProduct = false;  
            // this.productosEncontrados = null;
            // this.notFoundProduct = true;
          }
        });
    },
    ProdMasVendidos() {
      axios.get(`/api/productos/masvendidos/10`)
        .then(response => {
          this.productosMasVendidos = response.data;

          if (response.data.length > 0) {
            // this.loadSearchProduct = false;
            //this.productosEncontrados = response.data;
          } else {
            // this.loadSearchProduct = false;  
            // this.productosEncontrados = null;
            // this.notFoundProduct = true;
          }
        });
    },

  },

};
</script>


