<template>
<div>
    <div v-if="position == 'left' " class="w-full flex mb-14">
                <div class="shadow-lg rounded-r-full border-r-2 border-t-2 border-b-2  border-white bg-violet-900 pt-2 pb-2 pl-4 pr-4"> 
                 <p class="text-white text-2xl text-center font-semibold">
                       <slot />
                 </p>
                </div>
                <div class="flex-1">
               <div class="flex items-center w-full h-full ">
                    <hr class="border border-violet-900 w-full">
                </div>
              </div>
    </div>
    <div v-else-if="position == 'right' " class="w-full flex  mb-14">
                 <div class="flex-1">
               <div class="flex items-center w-full h-full ">
                    <hr class="border border-violet-900 w-full">
                </div>
              </div>
                <div class="shadow-lg rounded-l-full border-l-2 border-t-2 border-b-2 border-white bg-violet-900 pt-2 pb-2 pl-4 pr-4"> 
                 <p class="text-white text-2xl text-center font-semibold">
                       <slot />
                 </p>
                </div> 
    </div>
    <div v-else class="w-full flex mb-14">
                <div class="flex-1">
               <div class="flex items-center w-full h-full ">
                    <hr class="border border-violet-900 w-full">
                </div>
              </div>
                <div class="shadow-lg rounded-full border-2 border-white bg-violet-900 pt-2 pb-2 pl-4 pr-4"> 
                 <p class="text-white text-2xl text-center font-semibold">
                       <slot />
                 </p>
                </div>
                <div class="flex-1">
               <div class="flex items-center w-full h-full ">
                    <hr class="border border-violet-900 w-full">
                </div>
              </div>
              
    </div>
    

</div>   
</template>

<script>
export default {
    
    props: {
      position:{
        type: String,
        default: "center",
      }
    }
}
</script>