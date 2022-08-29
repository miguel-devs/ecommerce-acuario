<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  Registrar nuevo producto
                </h2>
                <Link :href="route('dashboard.productos')" class="bg-blue-400 text-white pl-3 pr-3 pb-2 pt-2 rounded-md">
                    Regresar a mis productos
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="pr-2 pl-2 pt-2 pb-2">
                          <div>
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Información del producto </h3>
        <p class="mt-1 text-sm text-gray-600">Esta información se mostra una vez que se active.</p>
      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form  @submit.prevent="submit">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="nombre" class="block text-sm font-medium text-gray-700"> Nombre 
                  <span v-if="errors.nombre" class="text-red-400 text-sm"> {{ errors.nombre }} </span>
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" required v-model="form.nombre" id="nombre" minlength="10"  maxlength="150"  class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" >
                </div>
              </div>
            </div>

            <div>
              <label for="descripcion" class="block text-sm font-medium text-gray-700"> Descripción 
                  <span v-if="errors.descripcion" class="text-red-400 text-sm"> {{ errors.descripcion }} </span>
              </label>
              <div class="mt-1">
                <textarea id="descripcion" required v-model="form.descripcion" maxlength="200"  rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
              </div>
              <p class="mt-2 text-sm text-gray-500">Una breve descripción de tu producto.</p>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="precio" class="block text-sm font-medium text-gray-700">Precio  
                  <span v-if="errors.precio" class="text-red-400 text-sm"> {{ errors.precio }} </span>
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input id="precio" required v-model="form.precio"  type="number" min="0.00" max="10000.00"  step="0.01"  class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" >
                </div>
              </div>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="brand_id" class="block text-sm font-medium text-gray-700">Marca
                  <span v-if="errors.brand_id" class="text-red-400 text-sm"> {{ errors.brand_id }} </span>
                </label>
                <select id="brand_id" required v-model="form.brand_id" autocomplete="brand_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option v-for="(marca,index) in marcas" :key="index" :value="marca.id">{{marca.nombre}}</option>
                </select>
            </div>

            <div class="col-span-6 sm:col-span-3">
                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria
                  <span v-if="errors.category_id" class="text-red-400 text-sm"> {{ errors.category_id }} </span>
                </label>
                <select id="category_id" required v-model="form.category_id" autocomplete="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  <option v-for="(categoria,index) in categorias" :key="index" :value="categoria.id">{{categoria.nombre}}</option>
                </select>
              </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">Imagen principal 
                  <span v-if="errors.imagen" class="text-red-400 text-sm"> {{ errors.imagen }} </span>
                  <span v-if="photoError" class="text-red-400 text-sm"> {{ photoError }} </span>

              </label>
              <div class="mt-1 flex items-center">
                <!-- Profile Photo File Input -->
                <input
                    required
                    ref="photoInput"
                    type="file"
                    class="hidden"
                    accept="image/png, image/jpeg"
                    @change="updatePhotoPreview"
                >
                <!-- Current Profile Photo -->
                <div v-show="! photoPreview" class="inline-block h-12 w-12 rounded-md overflow-hidden bg-gray-100">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                     </svg>
                </div>

                <!-- New Profile Photo Preview -->
                <div v-show="photoPreview" class="mt-2">
                    <span
                        class="block rounded-md w-60  h-60 bg-cover bg-no-repeat bg-center"
                        :style="'background-image: url(\'' + photoPreview + '\');'"
                    />
                </div>
                <button type="button" @click.prevent="selectNewPhoto" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700  hover:outline-none hover:ring-2 hover:ring-offset-2 hover:ring-indigo-500">
                 Seleccionar
                </button>
                 <button
                    v-if="photoPreview"
                    type="button"
                    class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700  hover:outline-none hover:ring-2 hover:ring-offset-2 hover:ring-red-500"
                    @click.prevent="clearPhotoFileInput"
                >
                    Quitar Imagen
                </button> 
             </div>
            </div>


             <div>
              <label for="detalles" class="block text-sm font-medium text-gray-700"> Detalles 
                  <span v-if="errors.detalles" class="text-red-400 text-sm"> {{ errors.detalles }} </span>

              </label>
              <div class="mt-1">
               
                <ckeditor  :editor="editor" v-model="form.detalles" :config="editorConfig"></ckeditor>

             </div>
              <p class="mt-2 text-sm text-gray-500">Describe los detalles de tu producto.</p>
            </div>



            <fieldset>
              <legend class="contents text-base font-medium text-gray-900">Activo
                  <span v-if="errors.activo" class="text-red-400 text-sm"> {{ errors.activo }} </span>

              </legend>
              <p class="text-sm text-gray-500">El producto solo se mostrara si se encuentra activado.</p>
              <div class="mt-4 space-y-4">
            
                <div class="flex items-center">
                  <input id="siActivo" required  v-model="form.activo" value="si" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                  <label for="siActivo" class="ml-3 block text-sm font-medium text-gray-700"> Si</label>
                </div>
                <div class="flex items-center">
                  <input id="noActivo" required  v-model="form.activo" value="no" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                  <label for="noActivo" class="ml-3 block text-sm font-medium text-gray-700"> No </label>
                </div>
              </div>
            </fieldset>

            

          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Guardar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


                        
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>


<script setup>
import { ref } from 'vue';

import AppLayout from '@/Layouts/AppLayout.vue';
import Pagination from "@/Layouts/Pagination.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from '@inertiajs/inertia-vue3'
 import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
  import '@ckeditor/ckeditor5-build-classic/build/translations/es';


const props = defineProps(["categorias","marcas","errors"]);

 

 const editor = ClassicEditor;
  const editorConfig = {
                language:'es',
                toolbar: [ 'bold', 'italic', 'heading', 'link' , 'bulletedList', 'numberedList','|',
                           'insertTable','|', 'blockQuote','|','undo', 'redo'  ]
            };


const photoPreview = ref(null);
const photoInput = ref(null);
const photoError = ref(null);

   const form = useForm({
        nombre:null,
        descripcion:null,
        precio:null,
        imagen: null,
        brand_id:null,
        category_id:null,
        detalles:null,
        activo:null
        
    });

const submit = () => {
    if (photoInput.value) {
        form.imagen = photoInput.value.files[0];
    }
    form.post(route('dashboard.productos.store'), {
        preserveScroll: true,
        onSuccess: () => clearPhotoFileInput(),
    });
};



const selectNewPhoto = () => {
    photoInput.value.click();
};

 const validateImage = (type) =>{
    let formatImage = ["image/jpeg","image/png"];
    if(formatImage.includes(type)){
      return true;
    }
  }

const updatePhotoPreview = () => {
    const photo = photoInput.value.files[0];
    photoError.value = null;
 
    if (! photo) return;
    if(!validateImage(photo.type)){
      FileInputInvalid();
      return;  
    } 
    const reader = new FileReader();

    reader.onload = (e) => {
        photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
};

const deletePhoto = () => {
    /*
    Inertia.delete(route('current-user-photo.destroy'), {
        preserveScroll: true,
        onSuccess: () => {
            photoPreview.value = null;
            clearPhotoFileInput();
        },
    });*/
};

const clearPhotoFileInput = () => {
    if (photoInput.value?.value) {
        photoPreview.value = null;
        photoInput.value.value = null;
    }
};

const FileInputInvalid = () =>{
       photoError.value = "formato jpeg o png";
} 
 

</script>