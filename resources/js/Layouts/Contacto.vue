<template>
	  <section id="contacto" class="relative bg-cover bg-center bg-no-repeat" style="background-image:url(/imagenes/web/contacto.jpg)">
        <div class="bg-black/50 w-full h-full">
         <TitleSeparator class="w-full absolute -top-[1.7rem]">
                  Contacto
        </TitleSeparator> 
        <div class="flex pl-10 pr-10 pt-24 pb-24">
        <div>
                   <img src="/imagenes/logos/logo150-150.png" style="width:150px; height:150px">
       </div>
<div class="w-full flex justify-between p-5">
        <div class="w-1/2">
          <p class="text-white mb-2">Teléfono: 22222222</p>
          <p class="text-white mb-2">contacto@correo.com</p>
          <p class="text-white">Horarios: 10:00am - 8:00pm L-S</p>
        </div>
        <div class="w-1/2 flex justify-center items-center">
          <a href="#"
            ><div
              class="w-10 h-10 mr-5 rounded-lg bg-cover bg-no-repeat bg-center"
              style="background-image: url(imagenes/web/instagram.jpg)"
            ></div
          ></a>
          <a href="#"
            ><div
              class="w-10 h-10 mr-5 rounded-lg bg-cover bg-no-repeat bg-center"
              style="background-image: url(imagenes/web/whattsap.png)"
            ></div
          ></a>
          <a href="#"
            ><div
              class="w-10 h-10 mr-5 rounded-lg bg-cover bg-no-repeat bg-center"
              style="background-image: url(imagenes/web/facebook.jpg)"
            ></div
          ></a>
        </div>
      </div>
        </div>
       </div>
      </section>
</template>
<script setup>
	import TitleSeparator from "@/Layouts/TitleSeparator.vue";

</script>