<template>
     <div class="bg-white flex justify-between p-5 mb-4 rounded-md shadow-md">
            <div>
              <div class="flex justify-center">
              <div v-if="!stepOne" class="h-10 w-10 p-2 text-center rounded-full bg-sky-600 shadow-md text-white font-bold">
                  <span>1</span>
              </div>
              <div v-else class=" h-10 w-10 p-2 text-center rounded-full bg-sky-600 shadow-md text-white font-bold">
                <i class="fa-solid fa-check"></i>
              </div>
              
              </div>
              <p class="text-sky-600 font-bold">Mi carrito</p>
            </div>

            <div>
              <div class="flex justify-center">
              <div v-if="!stepTwo" class="h-10 w-10 p-2 text-center rounded-full bg-sky-600 shadow-md text-white font-bold">
                  <span>2</span>
              </div>
              <div v-else class=" h-10 w-10 p-2 text-center rounded-full bg-sky-600 shadow-md text-white font-bold">
                <i class="fa-solid fa-check"></i>
              </div>
              </div>
              <p class="text-sky-600  font-bold">Datos envio</p> 
            </div> 
            <div><div class="flex justify-center">
              <div v-if="!stepThree" class="h-10 w-10 p-2 text-center rounded-full bg-sky-600 shadow-md text-white font-bold">
                  <span>3</span>
              </div>
               <div v-else class=" h-10 w-10 p-2 text-center rounded-full bg-sky-600 shadow-md text-white font-bold">
                <i class="fa-solid fa-check"></i>
              </div>
              </div>
              <p class="text-sky-600  font-bold">Confirmación de orden</p>
            </div> 

          </div>
</template>
<script>
export default {
    props: {
     stepOne:{
        type:Boolean,
        default:false
     },
     stepTwo:{
        type:Boolean,
        default:false
     },
     stepThree:{
        type:Boolean,
        default:false
     }, 
    },
}
</script>