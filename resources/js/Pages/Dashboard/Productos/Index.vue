<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mis Productos
                </h2>
                <Link :href="route('dashboard.productos.create')" class="bg-blue-400 text-white pl-3 pr-3 pb-2 pt-2 rounded-md">
                    Agregar Producto
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="pr-2 pl-2 pt-2 pb-2 bg-gray-200">
                        <form @submit.prevent="form.get(route('dashboard.productos'))">
                            <div class="flex justify-between ">
                            <div class="flex-wrap md:flex lg:flex gap-5">   
                            <input v-model="form.buscador" type="text" placeholder="Buscador" class="w-64 focus:ring-indigo-500 focus:border-indigo-500 block shadow-sm sm:text-sm border-gray-300 rounded-md" />

                           <select v-model="form.marca"  class="w-64 block px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                  <option disabled value="">escoje una marca</option>
                                  <option v-for="(marca, index) in marcas" :key="index" :value="marca.id">{{marca.nombre}}</option>
                            </select>
                             <select v-model="form.categoria"  class="w-64 block px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option  disabled value="">escoje una categoria</option>
                                <option v-for="(categoria, index) in categorias" :key="index" :value="categoria.id">{{categoria.nombre}}</option>
                            </select>
                            <div>
                                 <div>Productos activos</div>   
                                 <div class="flex">
                                 <div class="flex items-center mr-4">
                                      <label class="mr-3">Todos</label>
                                      <input v-model="form.activo" value="" type="radio"  >
                                 </div>               
                                 <div class="flex items-center mr-4">
                                      <label class="mr-3">Si</label>
                                      <input v-model="form.activo" value="si" type="radio"  >
                                 </div>
                                 <div class="flex items-center">
                                   <label class="mr-3">No</label>
                                   <input v-model="form.activo"  value="no" type="radio" >
                                 </div>
                                 </div>
                            </div>
                            </div>
                            <div class="flex items-center">
                              <button type="submit" :disabled="form.processing" class="bg-sky-500 text-white pl-2 pr-2 rounded-md h-7"> Buscar</button>
                            </div>  
                            </div>
                        </form>
                        
                    </div>

                   
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6 dark:bg-gray-800">
                   Nombre del producto
                </th>
                <th scope="col" class="py-3 px-6">
                    Marca
                </th>
                <th scope="col" class="py-3 px-6 dark:bg-gray-800">
                    Categoria
                </th>
                <th scope="col" class="py-3 px-6">
                    Price
                </th>
                <th scope="col" class="py-3 px-6 dark:bg-gray-800 text-center">
                    Activo
                </th>
                <th scope="col" class="py-3 px-6 dark:bg-gray-800">
                    
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(producto,index) in  productos.data" :key="index" class="border-b border-gray-200 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white dark:bg-gray-800">
                    {{producto.nombre}}
                </th>
                <td class="py-4 px-6">
                 {{producto.brand.nombre}}
                </td>
                <td class="py-4 px-6 dark:bg-gray-800">
                 {{producto.category.nombre}}
                </td>
                <td class="py-4 px-6">
                 <div class="text-sm text-red-300" v-if="producto.offer">
                   <div>Descuento del {{producto.offer.descuento}}%</div> 
                   <div>${{descuento(producto.precio,producto.offer.descuento)}}</div>
                 </div>
                 <div>${{producto.precio}}</div>
                </td>
                <td class="py-4 px-6 dark:bg-gray-800 text-center">
                 {{producto.activo}}
                </td>
                <td class="py-4 px-6">
                    <Link :href="route('dashboard.productos.edit',{producto:producto.id})">editar</Link>
                </td>
            </tr>
          
           
        </tbody>
    </table>
</div>

                </div>
                  <div id="pagination">
                      <Pagination :links="productos"/>
                 </div>
            </div>
        </div>
    </AppLayout>
</template>


<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from "@/Layouts/Pagination.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from '@inertiajs/inertia-vue3'



const props = defineProps(["productos","marcas","categorias",
"filtroBuscador",
"filtroMarca",
"filtroCategoria",
"filtroActivo"]);

    const form = useForm({
        buscador: props.filtroBuscador,
        marca: props.filtroMarca,
        categoria: props.filtroCategoria,
        activo:props.filtroActivo
    });

  
  
   const descuento = (precio,descuento) => {
         let val = (((precio *  descuento) / 100.00));
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

</script>