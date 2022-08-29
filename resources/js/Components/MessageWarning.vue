<template>
 <div v-show="messageWarning"
        class="fixed bottom-0 p-1 right-4 z-50  mb-4 text-sm bg-orange-300 text-orange-700 border border-gray-300 shadow-md rounded-lg "
                    role="alert"
                >
                <div class="relative h-5">
                  <div class="absolute top-0 right-0">
                     <svg @click="messageWarning = null" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                  </div>
                </div>
                <div class="font-medium p-2">
                        {{ messageWarning }}
                </div>
     </div>
</template>
<script>
  export default {
    props: {
     messageWarning: String,
     default:null
    },
  }
</script>