<template>
  <AppLayout title="Dashboard">
    <template #header>
      <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Producto: {{producto.nombre}}
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
                            <input type="text" v-model="form.nombre" id="nombre" minlength="10"  maxlength="150"  class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" >
                          </div>
                        </div>
                      </div>

                      <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700"> Descripción 
                        <span v-if="errors.descripcion" class="text-red-400 text-sm"> {{ errors.descripcion }} </span>
                        </label>
                        <div class="mt-1">
                          <textarea id="descripcion" v-model="form.descripcion" maxlength="200"  rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" ></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Una breve descripción de tu producto.</p>
                      </div>

                      <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                          <label for="precio" class="block text-sm font-medium text-gray-700">Precio  
                          <span v-if="errors.precio" class="text-red-400 text-sm"> {{ errors.precio }} </span>
                          </label>
                          <div class="mt-1 flex rounded-md shadow-sm">
                            <input id="precio" v-model="form.precio"  type="number" min="0.00" max="10000.00"  step="0.01"  class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" >
                          </div>
                        </div>
                      </div>

                      <div class="col-span-6 sm:col-span-3">
                        <label for="brand_id" class="block text-sm font-medium text-gray-700">Marca
                        <span v-if="errors.brand_id" class="text-red-400 text-sm"> {{ errors.brand_id }} </span>
                        </label>
                        <select id="brand_id" v-model="form.brand_id" autocomplete="brand_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                          <option v-for="(marca,index) in marcas" :key="index" :value="marca.id">{{marca.nombre}}</option>
                        </select>
                      </div>

                      <div class="col-span-6 sm:col-span-3">
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Categoria
                        <span v-if="errors.category_id" class="text-red-400 text-sm"> {{ errors.category_id }} </span>
                        </label>
                        <select id="category_id" v-model="form.category_id" autocomplete="category_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                          <option v-for="(categoria,index) in categorias" :key="index" :value="categoria.id">{{categoria.nombre}}</option>
                        </select>
                      </div>

                      <div>
                        <label class="block text-sm font-medium text-gray-700">Imagen principal 
                       <span v-if="photoError" class="text-red-400 text-sm"> {{ photoError }} </span>
                        </label>
                        <div class="mt-1 flex items-center">
                          <!-- Profile Photo File Input -->
                          <input
                          ref="photoInput"
                          type="file"
                          class="hidden"
                          accept="image/png, image/jpeg"
                          @change="updatePhotoPreview"
                          >
                          <!-- Current Profile Photo -->
                          <div v-show="! photoPreview" class="mt-2">
                            <span
                            class="block rounded-md w-60  h-60 bg-cover bg-no-repeat bg-center"
                            :style="'background-image: url(\'/imagenes/productos/' + producto.imagen + '\');'"
                            />
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
                          <input id="siActivo"  v-model="form.activo" value="si" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                          <label for="siActivo" class="ml-3 block text-sm font-medium text-gray-700"> Si</label>
                        </div>
                        <div class="flex items-center">
                          <input id="noActivo"  v-model="form.activo" value="no" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
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


        <div class="hidden sm:block" aria-hidden="true">
          <div class="py-5">
            <div class="border-t border-gray-200"></div>
          </div>
        </div>

        <div class="mt-10 sm:mt-0">
          <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
              <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Catalogo de imagenes</h3>
                <p class="mt-1 text-sm text-gray-600">Usted puede agregar un catalogo de imagenes para su producto</p>
              </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
              <form @submit.prevent="submitCatalogoImagenes" >
                <div class="shadow overflow-hidden sm:rounded-md">
                  <div class="px-4 py-5 bg-white sm:p-6">
                   <div>
                    <label class="block text-sm font-medium text-gray-700">Catalogo de imagenes</label>
                    
                        <UploadImages 
                        @changed="handleImages" 
                        uploadMsg="Cargar o arrastra y suelta las imagenes con formato PNG, JPG de menos de 10MB"
                        :max="5"
                        maxError="Solo puedes cargar 5 archivos a la vez"
                        fileError="images files only accepted"
                         clearAll="remover todas las imagenes" 
                        />


                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Guardar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="mt-10 border-t border-gray-200" v-if="producto.image_products">
        <div class="mt-5">
          <p class="text-center text-lg text-gray-900">Catalogo de imagenes</p>
        </div>
        <div class="grid grid-cols-2 lg:grid-cols-5 gap-6">
          <div class=" mt-3 bg-white rounded-md  p-1 cursor-pointer shadow-xl border border-slate-100" v-for="(imageproduct,index) in producto.image_products" :key="index">

            <div class="flex justify-center">
             <img style="width:150px; height:150px" :src="`/imagenes/productos/${imageproduct.nombre}`" @click="imgPreview = imageproduct.nombre"/>
           </div> 
           <div class="flex justify-center mt-2">
            <button @click="delateModalImage(imageproduct.id)" class="bg-red-500 px-3 py-1 text-white rounded-md">Borrar</button>
          </div>

        </div>
      </div>
    </div>


    <div class="hidden sm:block" aria-hidden="true">
      <div class="py-5">
        <div class="border-t border-gray-200"></div>
      </div>
    </div>

    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Opciones de producto</h3>
            <p class="mt-1 text-sm text-gray-600">Usted puede agregar diferentes caracteristicas del producto por ejemplo, otros colores.</p>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form @submit.prevent="submitFormOpcionesProducto">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class="col-span-6 sm:col-span-3">
                    <label for="caracteristicas" class="block text-sm font-medium text-gray-700">Caracteristica
                      <span v-if="errors.caracteristicas" class="text-red-400 text-sm"> {{ errors.caracteristicas }} </span>
                    </label>
                    <input type="text" v-model="formOpcionesProducto.caracteristicas" id="caracteristicas" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                </div>
              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="border-t border-gray-200 mt-10">
      <div class="bg-gray-50 p-3">
        <p class="text-center">Opciones de producto</p>
      </div>
      <table class="mt-5 mb-5 w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
          <tr>
            <th scope="col" class="py-3 px-6 dark:bg-gray-800">
              id
            </th>
            <th scope="col" class="py-3 px-6">
              Caracteristica
            </th>
            <th scope="col" class="py-3 px-6 dark:bg-gray-800">
              Editar
            </th>
            <th scope="col" class="py-3 px-6">
              Eliminar
            </th>

          </tr>
        </thead>
        <tbody>
          <tr v-for="(opcion,index) in  producto.product_options" :key="index" class="border-b border-gray-200 dark:border-gray-700">
            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white dark:bg-gray-800">
              {{opcion.id}}
            </th>
            <td class="py-4 px-6">
              {{opcion.caracteristicas}}
            </td>
            <td class="py-4 px-6 dark:bg-gray-800">
              <p class="cursor-pointer" @click="showModalEditOption(opcion)">editar</p>
            </td>

            <td class="py-4 px-6">
              <p class="cursor-pointer" @click="showModalDelateOption(opcion)">eliminar</p>
            </td>
          </tr>


        </tbody>
      </table>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
      <div class="py-5">
        <div class="border-t border-gray-200"></div>
      </div>
    </div>

    <div class="mt-10 sm:mt-0">
      <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
          <div class="px-4 sm:px-0">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Descuento</h3>
            <p class="mt-1 text-sm text-gray-600">Decide si es el momento para agregar un descuento a tu producto.</p>
          </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
          <form @submit.prevent="submitFormDescuentoProducto">
            <div class="shadow overflow-hidden sm:rounded-md">
              <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                  <div class=" sm:col-span-3">
                    <label for="descuento" class="block text-sm font-medium text-gray-700">Descuento 
                      <span v-if="errors.descuento" class="text-red-400 text-sm"> {{ errors.descuento }} </span>
                    </label>
                    <select id="descuento" v-model="formDescuentoProducto.descuento" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
                      <option :value="null">Selecciona un porcentaje</option>
                      <option value="5">5%</option>
                      <option value="10">10%</option>
                      <option value="15">15%</option>
                      <option value="20">20%</option>
                      <option value="25">25%</option>
                      <option value="30">30%</option>
                      <option value="35">35%</option>
                      <option value="40">40%</option>
                      <option value="45">45%</option>
                      <option value="50">50%</option>
                    </select>


                  </div>
                </div>
                <div class="grid grid-cols-6 gap-6">
                  <div class=" sm:col-span-6">
                    <p class="text-center">Lanzar Oferta</p>
                  </div>
                  <div class=" sm:col-span-3">
                    <label for="desde" class="block text-sm font-medium text-gray-700">Desde
                      <span v-if="errors.desde" class="text-red-400 text-sm"> {{ errors.desde }} </span>
                    </label>
                    <input type="date" v-model="formDescuentoProducto.desde" id="desde"   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>
                  <div class=" sm:col-span-3">
                    <label for="hasta" class="block text-sm font-medium text-gray-700">Hasta
                      <span v-if="errors.hasta" class="text-red-400 text-sm"> {{ errors.hasta }} </span>

                    </label>
                    <input type="date" v-model="formDescuentoProducto.hasta" id="hasta"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                  </div>

                </div>


              </div>
              <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Guardar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="border-t border-gray-200 mt-10">
      {{producto.offer}}
      <div class="bg-gray-50 p-3">
        <p class="text-center">Descuentos de producto</p>
      </div>
      <table class="mt-5 mb-5 w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
          <tr>
            <th scope="col" class="py-3 px-6 dark:bg-gray-800">
              id
            </th>
            <th scope="col" class="py-3 px-6">
              Descuento
            </th>
            <th scope="col" class="py-3 px-6">
              Desde
            </th>
            <th scope="col" class="py-3 px-6">
              Hasta
            </th>
            <th scope="col" class="py-3 px-6 dark:bg-gray-800">
              Editar
            </th>
            <th scope="col" class="py-3 px-6">
              Eliminar
            </th>

          </tr>
        </thead>
        <tbody>
          <tr v-for="(oferta,index) in  producto.product_offers" :key="index" class="border-b border-gray-200 dark:border-gray-700">
            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white dark:bg-gray-800">
              {{oferta.id}}
            </th>
            <td class="py-4 px-6">
              {{oferta.descuento}}
            </td> 
            <td class="py-4 px-6">
              {{oferta.desde}}
            </td>
            <td class="py-4 px-6">
              {{oferta.hasta}}
            </td>
            <td class="py-4 px-6 dark:bg-gray-800">
              <p class="cursor-pointer" @click="showModalOffer(oferta)">editar</p>
            </td>

            <td class="py-4 px-6">
              <p class="cursor-pointer" @click="showModalDelateOffer(oferta)">eliminar</p>
            </td>
          </tr>


        </tbody>
      </table>
    </div>
    
  </div>
</div>
</div>
</div>

<Modal :show="dalateImagenModal"  @close="dalateImagenModal = false">
  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
    <div class="sm:flex sm:items-start">
      <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
        <!-- Heroicon name: outline/exclamation -->
        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
      </div>
      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Eliminar Imagen</h3>
        <div class="mt-2">
          <p class="text-sm text-gray-500">¿Estas seguro que quieres eliminar esta imagen? Esta informacion sera eliminada y no podra recuperarse.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
    <button @click="deleteImage" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-700 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Eliminar</button>
    <button @click="dalateImagenModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
  </div>
</Modal>

<Modal :show="editOpcionModal"  @close="editOpcionModal = false">
  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
    <div class="sm:flex sm:items-start">

      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Editar Opcion</h3>
      </div>
    </div>
  </div>
  <div class="bg-gray-50 px-4 py-3 sm:px-6 ">


    <div class="grid grid-cols-6 gap-6 p-2">

      <div class=" sm:col-span-3">
        <label class="block text-sm font-medium text-gray-700">Caracteristicas</label>
        <input type="text" v-model="formEditOpcionesProducto.caracteristicas"   
               class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
      </div>

    </div>
    <div class="p-3 flex justify-end">
      <button  @click="submitEditFormOtions" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Guardar</button>
      <button @click="editOpcionModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
    </div>
  </div>
</Modal>

<Modal :show="delateOpcionModal"  @close="delateOpcionModal = false">
   <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
    <div class="sm:flex sm:items-start">
      <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
        <!-- Heroicon name: outline/exclamation -->
        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
      </div>
      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Eliminar Opcion</h3>
        <div class="mt-2">
          <p class="text-sm text-gray-500">
              ¿Estas seguro que quieres eliminar esta caracteristica? Esta información sera eliminada y no podra recuperarse.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
    <button @click="deleteOpcion" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-700 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Eliminar</button>
    <button @click="delateOpcionModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
  </div>
</Modal>

<Modal :show="editOfferModal"  @close="editOfferModal = false">
  <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
    <div class="sm:flex sm:items-start">

      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Editar Descuento</h3>
      </div>
    </div>
  </div>
  <div class="bg-gray-50 px-4 py-3 sm:px-6 ">

    <div class=" sm:col-span-3 p-2">
      <label for="descuento" class="block text-sm font-medium text-gray-700">Descuento</label>
      <select id="descuento" v-model="formEditOffer.descuento" autocomplete="country-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" >
        <option :value="null">Selecciona un porcentaje</option>
        <option value="5">5%</option>
        <option value="10">10%</option>
        <option value="15">15%</option>
        <option value="20">20%</option>
        <option value="25">25%</option>
        <option value="30">30%</option>
        <option value="35">35%</option>
        <option value="40">40%</option>
        <option value="45">45%</option>
        <option value="50">50%</option>
      </select>


    </div>

    <div class="grid grid-cols-6 gap-6 p-2">

      <div class=" sm:col-span-3">
        <label for="desde" class="block text-sm font-medium text-gray-700">Desde</label>
        <input type="date" v-model="formEditOffer.desde" id="desde"   class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
      </div>
      <div class=" sm:col-span-3">
        <label for="hasta" class="block text-sm font-medium text-gray-700">Hasta</label>
        <input type="date" v-model="formEditOffer.hasta" id="hasta"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
      </div>

    </div>
    <div class="p-3 flex justify-end">
      <button  @click="submitEditOffer" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Guardar</button>
      <button @click="editOfferModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
    </div>
  </div>
</Modal>

<Modal :show="delateOfferModal"  @close="delateOfferModal = false">
   <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
    <div class="sm:flex sm:items-start">
      <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
        <!-- Heroicon name: outline/exclamation -->
        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
        </svg>
      </div>
      <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Eliminar Descuento</h3>
        <div class="mt-2">
          <p class="text-sm text-gray-500">
              ¿Estas seguro que quieres eliminar este Descuento? Esta informacion sera eliminada y no podra recuperarse.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
    <button @click="deleteOffer" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-700 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Eliminar</button>
    <button @click="delateOfferModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
  </div>
</Modal>

</AppLayout>
</template>


<script setup>
  import { ref } from 'vue';

  import AppLayout from '@/Layouts/AppLayout.vue';
  import Pagination from "@/Layouts/Pagination.vue";
  import { Link } from "@inertiajs/inertia-vue3";
  import { useForm } from '@inertiajs/inertia-vue3'
  import  Modal from '@/Jetstream/Modal.vue';
  import { Inertia } from '@inertiajs/inertia';
  import UploadImages from "@/Components/vue-upload-drop-images"
  import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
  import '@ckeditor/ckeditor5-build-classic/build/translations/es';


  const props = defineProps(["producto","categorias","marcas","errors"]);
  const editor = ClassicEditor;
  const editorConfig = {
                language:'es',
                toolbar: [ 'bold', 'italic', 'heading', 'link' , 'bulletedList', 'numberedList','|',
                           'insertTable','|', 'blockQuote','|','undo', 'redo'  ]
            };
  const photoPreview = ref(null);
  const photoInput = ref(null);
  const dalateImagenModal = ref(false);
  const producto = props.producto[0];
  const photoError = ref(null);

  const form = useForm({
    nombre:producto.nombre,
    descripcion:producto.descripcion,
    precio:producto.precio,
    imagen: null,
    brand_id:producto.brand_id,
    category_id:producto.category_id,
    detalles:producto.detalles,
    activo:producto.activo,
  });

  const submit = () =>{
     
     form.post(route("dashboard.productos.update",{producto:producto.id}), {
      preserveScroll: true,
      replace: true ,
      preserveState: false,

    });
  }


/*----- Acciones Imagen Principal -----*/

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

    if (! photo) return;
    if(!validateImage(photo.type)){
      FileInputInvalid();
      return;  
    } 
    const reader = new FileReader();
    form.imagen = photo;

    reader.onload = (e) => {
      photoPreview.value = e.target.result;
    };

    reader.readAsDataURL(photo);
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

/*---- Catalogo de imagenes ------*/

 const errorCatalogoImagenes = ref(true);  
  const formDelateImage = useForm({
    image:null
  });

  const formCatalogoImagenes = useForm({
        imagenes:null,
  });

 const handleImages = (files)=>{
           formCatalogoImagenes.imagenes = files;
 }

 const submitCatalogoImagenes = () => {
     
     formCatalogoImagenes.post(route("store.producto.images",{producto:producto.id}), {
          preserveScroll: true,
          replace: true ,
          preserveState: false,
          onSuccess: () => formCatalogoImagenes.reset(),
      });
  
  }
  const delateModalImage = (id) =>{
    formDelateImage.image = id;
    dalateImagenModal.value = true;
  };

  const deleteImage = () => {
    formDelateImage.delete(route("delate.producto.image"), {
      preserveScroll: true,
      replace: true ,
      preserveState: false,
      onSuccess: () => formDelateImage.reset('image'),

    });
  };
  
  
  


  /*------------ ofertas------------*/

  const editOfferId = ref(null);
  const editOfferModal = ref(false);
  const delateOfferModal = ref(false);

  const formEditOffer = useForm({
    id:null,
    descuento:null,
    desde:null,
    hasta:null,
  });

  const showModalOffer = (oferta) =>{
    editOfferId.value       = oferta.id;
    formEditOffer.id        = oferta.id;
    formEditOffer.descuento = oferta.descuento;
    formEditOffer.desde     = oferta.desde;
    formEditOffer.hasta     = oferta.hasta;
    editOfferModal.value    = true;
  }

  const submitEditOffer = () => {
    formEditOffer.put(route("dashboard.update.descuento",{producto:producto.id,offer:editOfferId.value}), {
      preserveScroll: true,
      replace: true ,
      preserveState: false,
      onSuccess: () => formEditOffer.reset(),

    });
  };

  const formDescuentoProducto = useForm({
    descuento:null,
    desde:null,
    hasta:null,
  });

  const submitFormDescuentoProducto = () =>{
    formDescuentoProducto.post(route('dashboard.productos.store.descuento',{producto:producto.id}), {
      preserveScroll: true,
      replace: true ,
      preserveState: false,
      onSuccess: () => formDescuentoProducto.reset('descuento'),
    })
  }

  const showModalDelateOffer = (oferta) =>{
      editOfferId.value = oferta.id;
      delateOfferModal.value = true;
  }

  const deleteOffer = () =>{
     Inertia.delete(route("dashboard.offer.delete",{offer:editOfferId.value}), {
      preserveScroll: true,
      replace: true ,
      preserveState: false,
     
    });
  }



 

/*------------ Opciones producto------------*/

  
  const editOpcionModal = ref(false);
  const delateOpcionModal = ref(false);
  const opcionModalId = ref(null);

  
  const formOpcionesProducto = useForm({
    caracteristicas:null,
  });

  const submitFormOpcionesProducto = () => {
    formOpcionesProducto.post(route('dashboard.producto.store.opciones',{producto:producto.id}), {
      preserveScroll: true,
      replace: true ,
      preserveState: false,
      onSuccess: () => formOpcionesProducto.reset('caracteristicas'),
    })
  };


  const formEditOpcionesProducto = useForm({
    caracteristicas:null,
  });

  const showModalEditOption = (opcion) =>{
      editOpcionModal.value = true;
      opcionModalId.value   = opcion.id;
      formEditOpcionesProducto.caracteristicas = opcion.caracteristicas;
  }
  const submitEditFormOtions = () => {
    formEditOpcionesProducto.put(route('dashboard.producto.update.opciones',{productOption:opcionModalId.value}), {
      preserveScroll: true,
      replace: true ,
      preserveState: false,
      onSuccess: () => formOpcionesProducto.reset('caracteristicas'),
    })
  };

  const showModalDelateOption = (opcion) =>{
        opcionModalId.value   = opcion.id;
        delateOpcionModal.value = true;
  }

   const deleteOpcion = () =>{
     Inertia.delete(route("dashboard.opcion.delete",{productOption:opcionModalId.value}), {
      preserveScroll: true,
      replace: true ,
      preserveState: false,
    });
  }
</script>