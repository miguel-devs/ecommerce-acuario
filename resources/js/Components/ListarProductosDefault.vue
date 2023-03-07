<template>
    <div class="mt-6 pl-4 pr-4 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">

<div v-for="(producto, index) in productos" :key="index" class="group relative">
  <div v-if="producto.offer"
    class="absolute rounded-full bg-sky-700 text-white p-1 text-sm h-8 w-8 flex justify-center items-center">
    {{ producto.offer.descuento }}%
  </div>
  <div
    class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
    <img :src="`/imagenes/productos/${producto.imagen}`" alt="Front of men&#039;s Basic Tee in black."
      class="w-full h-full object-center object-cover lg:w-full lg:h-full" />
  </div>
  <div class="mt-4 flex justify-between">
    <div>
      <h3 class="text-sm text-gray-700">
        <Link :href="route('ver-producto', { product: producto.id })">
        <span aria-hidden="true" class="absolute inset-0"></span>
        {{ producto.nombre }}
        </Link>
      </h3>
      <p class="mt-1 text-sm text-gray-500">{{ producto.nombre_marca }}</p>
    </div>
    <div v-if="producto.offer">
      <p class="text-sm font-medium text-gray-400 line-through">${{ producto.precio }}</p>
      <p class="text-sm font-medium text-gray-900">
        ${{ descuento(producto.precio, producto.offer.descuento) }}
      </p>
    </div>
    <div v-else>
      <p class="text-sm font-medium text-gray-900">${{ producto.precio }}</p>
    </diV>
  </div>
</div>


<!-- More products... -->
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


