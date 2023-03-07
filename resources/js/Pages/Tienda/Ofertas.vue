<template>
  <!-- This example requires Tailwind CSS v2.0+ -->

  <Head title="Ofertas" />

  <div class="min-h-screen relative">
    <NavBarTienda :totalCarritoProps="totalCarrito" />
    <NavLeft />
    <section class="w-full min-h-screen bg-sky-600 pt-20 pl-10 pr-10 pb-10">
      <div class="bg-white rounded-md shadow-md pt-6">
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

                <Link :href="route('ofertas')" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">
                Ofertas
                </Link>
              </div>
            </li>


          </ol>
        </nav>
        <div v-if="productos.data.length >0 "> 

          <div
          class="h-1/2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4  content-center overflow-x">
          <div v-for="(producto, index) in productos.data" :key="index"
            class="bg-white border border-gray-100 p-2 rounded-md shadow-md relative">
            <div v-if="producto.descuento"
              class="absolute rounded-full bg-sky-700 text-white p-1 text-sm h-8 w-8 flex justify-center items-center">
              {{ producto.descuento }}%
            </div>
            <div class="w-full flex justify-center">
            <img :src="`/imagenes/productos/${producto.imagen}`" class="object-contain h-48 w-96" />
            </div>



            <p class="text-sm text-center">{{ producto.nombre }}</p>
            <div class="flex justify-center">
              <Link :href="route('ver-productos-categoria', { categoria:producto.url_categoria})"
                class="text-sm text-center text-gray-400">{{ producto.nombre_categoria}}</Link>
            </div>
            <div v-if="producto.offer">
              <p class="text-xs text-center text-gray-400 line-through">${{ producto.precio }}</p>

              <p class="text-xs text-center text-sky-600">
                ${{ descuento(producto.precio, producto.offer.descuento) }}
              </p>
            </div>
            <div v-else>
              <p class="text-xs text-center text-sky-600">${{ producto.precio }}</p>
            </diV>
            <div class="w-full flex justify-center p-2">
              <Link :href="route('ver-producto', { product: producto.id })"
                class="bg-sky-400 pt-1 pb-1 pl-4 pr-4 text-white rounded-md ">Añadir al carrito</Link>
            </div>
          </div>

        </div>
        <div id="pagination">
              <Pagination :links="productos" />
        </div>
        </div>
        <div v-else class="h-96 w-full flex justify-center items-center">
           <TheEmptyProducts></TheEmptyProducts>
        </div>

      </div>
      
    </section>
    <Contacto />
  </div>
</template>

<script >
import { Head } from "@inertiajs/inertia-vue3";
import NavBarTienda from "@/Layouts/NavBarTienda.vue";
import NavLeft from "@/Layouts/NavLeftDev.vue";
import Pagination from "@/Layouts/Pagination.vue";
import { Link } from '@inertiajs/inertia-vue3';
import TitleSeparator from "@/Layouts/TitleSeparator.vue";
import Contacto from "@/Layouts/Contacto.vue";
import TheEmptyProducts from "@/Layouts/TheEmptyProducts.vue";

export default {
  props: {
    productos: Object,
    brand: Object,
    category: Object
  },
  components: {
    Head,
    Link,
    NavBarTienda,
    NavLeft,
    Pagination,
    TitleSeparator,
    Contacto,
    TheEmptyProducts
  },
  data() {
    return {
      totalCarrito: null,
      nombreCategoria: "",
      urlCategoria: "",
      nombreMarca: "",
      urlMarca: "",
    };
  },
  mounted() {
    if (this.category) {
      this.nombreCategoria = this.category[0].nombre;
      this.urlCategoria = this.category[0].url_clean;
    }
    if (this.brand) {
      this.nombreMarca = this.brand[0].nombre;
      this.urlMarca = this.brand[0].url_clean;
    }
    if (localStorage.getItem("carrito")) {
      this.totalCarrito = JSON.parse(localStorage.getItem("carrito")).length;
    }
    console.log(this.productos);
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

    }
  },
};
</script>


