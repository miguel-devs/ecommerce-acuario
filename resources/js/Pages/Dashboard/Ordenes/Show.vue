<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link } from "@inertiajs/inertia-vue3";
  import { Inertia } from '@inertiajs/inertia';

const prop = defineProps({
    orden: Array,
});

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="w-full flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               Detalles de la Orden: {{orden.id}}
            </h2>
            <div v-if="orden.status == 'pendiente'">
            <div class="flex justify-center">
            <form @submit.prevent='Inertia.put(route("dashboard.ordenes.update",{orden:orden.id,status:"entregado"}))'>    
            <button class="bg-orange-500 text-white pt-1 pb-1 pl-3 pr-3 rounded-md text-white font-bold">
                {{orden.status}}
            </button>
            </form>
            </div>
            <div class="text-sm text-red-300">Da click, para cambiar el status del pedido</div>
            </div>
            
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class=" bg-white overflow-hidden shadow-xl sm:rounded-lg">
                   <div class="flex w-full mb-4 border-b border-gray-200 bg-gray-200 p-5">

                    <div class="w-1/2">
                    <div class="text-xl font-bold text-gray-900 mb-2">
                        <p class="text-center">Datos del cliente</p>
                    </div>
                    <div>
                        <p class="text-sm text-center text-gray-800">Nombre del cliente: {{orden.nombre}}</p>
                        <p class="text-sm text-center text-gray-800">Telefono del cliente: {{orden.telefono}}</p>
                        <p class="text-sm text-center text-gray-800">Correo del cliente: {{orden.correo}}</p>

                    </div>
                    </div>

                    <div class="w-1/2">
                    <div class="text-xl font-bold text-gray-900 mb-2">
                        <p class="text-center">Datos de envio</p>
                    </div>
                    <div>
                        <p class="text-sm text-center text-gray-800">Calle: {{orden.calle}}</p>
                        <p class="text-sm text-center text-gray-800">No. Exterior: {{orden.noExterior}}</p>
                        <p v-if="!orden.noInterior" class="text-sm text-gray-800">No. Interior: {{orden.noInterior}}</p>
                        <p class="text-sm text-center text-gray-800">Colonia: {{orden.colonia}}</p>
                        <p class="text-sm text-center text-gray-800">Municipio o Delegación: {{orden.municipioDelegacion}}</p>
                        <p class="text-sm text-center text-gray-800">Estado: {{orden.estado}}</p>
                        <p class="text-sm text-center text-gray-800">Quien recibe: {{orden.nombrePersonaRecibir}}</p>
                    </div>
                    </div>

                   </div>
                   <div class="overflow-x-auto">
                         <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6 ">
                    Id
                </th>
                <th scope="col" class="py-3 px-6 ">
                    Imagen
                </th>
                <th scope="col" class="py-3 px-6 ">
                    Descripcion del producto
                </th>
                
                <th scope="col" class="py-3 px-6 ">
                    Cantidad
                </th>
                <th scope="col" class="py-3 px-6">
                    Precio
                </th>
                
            </tr>
        </thead>
        <tbody>
            <tr v-for="(orderdetail,index) in  orden.orders_detail" :key="index" class="border-t border-gray-200 dark:border-gray-700">
                <th class="py-4 px-6 text-sky-600 ">
                    {{orderdetail.id}}
                </th>
                <th class="py-4 px-6 text-sky-600 ">
                    <img  :src="`/imagenes/productos/${orderdetail.product_order[0].imagen}`" style="width:50px; height:50px;" />
                </th>
                <th class="py-4 px-6 text-gray-800 ">
                    {{orderdetail.descripcion}}
                </th>
                <td class="py-4 px-6 text-center">
                    {{orderdetail.cantidad}}
                </td>
                <td class="py-4 px-6 dark:bg-gray-800">
                    ${{orderdetail.precio}}
                </td>
               
            </tr>
          
           
        </tbody>
    </table>
    
                   </div>
                   <div class="p-5 bg-gray-200 rounded-b-lg">
    <p class="text-end"><span class="font-bold">Total:</span> ${{orden.total}}</p>
    </div>
                   <div>
              
                   </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>