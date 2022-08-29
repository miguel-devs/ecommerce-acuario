<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link } from "@inertiajs/inertia-vue3";
import Pagination from "@/Layouts/Pagination.vue";

defineProps({
    ordenes: Array,
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ordenes clientes
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-t-lg">
                   <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6 dark:bg-gray-800">
                    Id
                </th>
                <th scope="col" class="py-3 px-6 dark:bg-gray-800">
                    Nombre del cliente
                </th>
                
                <th scope="col" class="py-3 px-6 dark:bg-gray-800">
                    Telefono
                </th>
                <th scope="col" class="py-3 px-6">
                    Correo
                </th>
                <th scope="col" class="py-3 px-6 dark:bg-gray-800r">
                    Total
                </th>
                <th scope="col" class="py-3 px-6 dark:bg-gray-800">
                    Estatus
                </th>
                <th scope="col" class="py-3 px-6 dark:bg-gray-800">
                    Fecha de pedido
                </th>
                <th scope="col" class="py-3 px-6 dark:bg-gray-800">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(orden,index) in  ordenes.data" :key="index" class="border-t border-gray-200 dark:border-gray-700">
                <th class="py-4 px-6 text-sky-600 ">
                    {{orden.id}}
                </th>
                <th class="py-4 px-6 text-gray-800 ">
                    {{orden.nombre}}
                </th>
                <td class="py-4 px-6">
                 {{orden.telefono}}
                </td>
                <td class="py-4 px-6 dark:bg-gray-800">
                 {{orden.correo}}
                </td>
                <td class="py-4 px-6">
                 ${{orden.total}}
                </td>
                <td class="py-4 px-6 dark:bg-gray-800 ">
                 <div v-if="orden.status == 'pendiente'" class="text-orange-500">{{orden.status}}</div>
                 <div v-else class="text-green-500">{{orden.status}}</div>
                </td>
                <td class="py-4 px-6 dark:bg-gray-800 ">
                 {{orden.created_at}}
                </td>
                <td class="py-4 px-6">
                    <Link :href="route('dashboard.ordenes.show',{orden:orden.id})">ver pedido</Link>
                </td>
            </tr>
          
           
        </tbody>
    </table>
                </div>
                 <div id="pagination">
                      <Pagination :links="ordenes"/>
                 </div>
            </div>
            
        </div>
    </AppLayout>
</template>
