<template>
  <!-- This example requires Tailwind CSS v2.0+ -->

  <Head title="Tienda" />

  <div class="min-h-screen relative">
    <NavBarTienda :totalCarritoProps="totalCarrito" />
    <NavLeft />
    <section class="w-full min-h-screen bg-sky-600 pt-20 pl-10 pr-10 pb-10">
      <div class="bg-white bg-white rounded-md shadow-md pt-6 pb-6">
        <nav aria-label="Breadcrumb" class="mb-4">
          <ol role="list" class="max-w-2xl mx-auto px-4 flex items-center space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
            <li>
              <div class="flex items-center">
                <Link :href="route('inicio')" class="text-sm font-medium text-sky-700">Aquatic Depot
                </Link>

              </div>
            </li>

            <li v-if="nombreCategoria" class="text-sm">
              <div class="flex items-center">
                <span class="text-gray-300 ml-4 mr-4">\</span>
                <Link :href="
                  route('ver-productos-categoria', { categoria: urlCategoria })" aria-current="page"
                  class="font-medium text-gray-500 hover:text-gray-600">
                {{ nombreCategoria }}
                </Link>

              </div>
            </li>

            <li v-if="nombreMarca" class="text-sm">
              <div class="flex items-center">

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

        <div v-if="productos.data.length >0 "> 
          <ListarProductos :productos = productos.data></ListarProductos>

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
import Contacto from "@/Layouts/Contacto.vue";
import TheEmptyProducts from "@/Layouts/TheEmptyProducts.vue";
import ListarProductos from "@/Components/ListarProductos.vue";

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
    Contacto,
    TheEmptyProducts,
    ListarProductos
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

    console.log(this.productos.data);
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


