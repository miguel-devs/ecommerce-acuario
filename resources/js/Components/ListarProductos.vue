<template>
<div
          class="h-1/2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4  content-center overflow-x">
          <div v-for="(producto, index) in productos" :key="index"
            class="bg-white border border-gray-100 p-2 rounded-md shadow-md relative">
            <div v-if="producto.offer"
              class="absolute rounded-full bg-sky-700 text-white p-1 text-sm h-8 w-8 flex justify-center items-center">
              {{ producto.offer.descuento }}%
            </div>
            <div class="w-full flex justify-center">
            <img :src="`/imagenes/productos/${producto.imagen}`" class="object-contain h-48 w-96" />
            </div>

            <p class="text-sm text-center">{{ producto.nombre }}</p>
            <div class="flex justify-center">
              <Link :href="route('ver-productos-categoria', { categoria: producto.url_categoria })"
                class="text-sm text-center text-gray-400">{{ producto.nombre_categoria }}</Link>
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

</template>


<script >
import { Link } from '@inertiajs/inertia-vue3';

export default {
  props: {
    productos: Object,

  },
  components: {
    Link,
    
  },
  data() {
    return {
      totalCarrito: null,

    };
  },
  mounted() {
    if (localStorage.getItem("carrito")) {
      this.totalCarrito = JSON.parse(localStorage.getItem("carrito")).length;
    }
  },
  methods: {
    descuento(precio, descuento) {
      let val = (((precio * descuento) / 100));
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