<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import NavBar from "@/Layouts/NavBar.vue";
import { KinesisContainer, KinesisElement } from "vue-kinesis";
import JetActionMessage from "@/Jetstream/ActionMessage.vue";

</script>

<template>
  <Head title="Nosotros" />
  <!-- This example requires Tailwind CSS v2.0+ -->
  <NavBar class="bg-black"/>

<div class="min-h-screen">

  <div class="mt-10 relative flex items-top h-screen sm:items-center sm:pt-0 bg-black">
    <div class="w-1/2 text-white" data-aos="fade-up">
      <p class="text-8xl font-extrabold z-10 text-center mb-3">Acualand.</p>
      <p class="text-center mb-10">
        Productos, servicios de mantenimiento y más para tu acuario.
      </p>
      <div class="w-full flex justify-center">
        <a href="#contacto" class="rounded-lg pl-4 hover:pl-7 pt-2 pr-4 hover:pr-7 pb-2 text-white bg-red-600 font-bold">Contacto</a>
      </div>
    </div>

    <div class="w-1/2">
      <KinesisContainer>
        <KinesisElement
          tag="img"
          src="imagenes/web/beta.png"
          :strength="20"
          transformOrigin="50% 300%"
        />
      </KinesisContainer>
    </div>
  </div>

  <div class="relative flex items-center h-screen sm:items-center sm:pt-0 bg-black">
    <KinesisContainer class="w-full h-screen absolute p-6" event="scroll">
      <KinesisElement :strength="50" axis="y">
        <div class="circle circle-purple"></div>
      </KinesisElement>
      <KinesisElement :strength="80" axis="y">
        <div class="circle circle-purple1"></div>
      </KinesisElement>
      <KinesisElement :strength="80" axis="y">
        <div class="circle circle-purple2"></div>
      </KinesisElement>
      <KinesisElement :strength="100" axis="y">
        <div class="circle circle-purple3"></div>
      </KinesisElement>
    </KinesisContainer>
    <div class="p-2">
      <div class="mb-10">
        <p class="text-4xl font-extrabold z-10 text-center mb-3 text-white">
          Nosotros
        </p>
      </div>
      <div class="w-full h-96 flex items-center flex justify-center relative p-5">
        <div class="w-full flex justify-center">
          <KinesisContainer class="relative w-48 h-56">
            <KinesisElement
              tag="img"
              src="imagenes/web/shark.jpeg"
              :strength="10"
              transformOrigin="50% 300%"
              class="absolute w-48 h-56 z-20 rounded-md"
            />
            <KinesisElement
              tag="img"
              src="imagenes/web/payaso.png"
              :strength="-10"
              type="rotate"
              transformOrigin="50% 300%"
              axis="x"
              class="w-48 h-56 absolute z-10 top-0 rounded-md left-1"
            />
            <KinesisElement
              tag="img"
              src="imagenes/web/beta.png"
              :strength="10"
              type="rotate"
              transformOrigin="50% 300%"
              axis="x"
              class="w-48 h-56 absolute z-10 top-0 rounded-md"
            />
          </KinesisContainer>
        </div>
        <div class="w-full text-center flex justify-center p-5">
          <div class="relative" data-aos="fade-left">
            <p class="text-white text-4xl mb-10 font-bold">
              En acualand, tenemos mas de 20 años de experiencia en el manejo de
              flora y fauna marina.
            </p>
            <p class="text-white font-semibold">
              Manejamos a las especies con el trato que se merecen, pues sabemos
              que son especies delicadas y merecen la mejor atención.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="h-screen sm:items-center pt-10 sm:pt-0 bg-black">
    <div class="mb-10">
      <p class="text-4xl font-extrabold z-10 text-center mb-3 text-white">
        Servicios
      </p>
    </div>

    <div class="w-full flex items-center flex justify-between relative p-10">
      <div class="flex justify-center">
        <div class="rounded-lg shadow-lg bg-gray-900 max-w-sm">
          <a href="#!">
            <img class="rounded-t-lg" src="imagenes/web/acuario.jpg" alt="" />
          </a>
          <div class="p-6">
            <h5 class="text-gray-700 text-xl font-medium mb-2 font-bold">
              Peceras sobre Diseño
            </h5>
            <p class="text-gray-700 text-base mb-4">
              Some quick example text to build on the card title and make up the
              bulk of the card's content.
            </p>
          </div>
        </div>
      </div>

      <div class="flex justify-center">
        <div class="rounded-lg shadow-lg bg-gray-900 max-w-sm">
          <a href="#!">
            <img
              class="rounded-t-lg"
              src="imagenes/web/acuario-2.jpeg"
              alt=""
            />
          </a>
          <div class="p-6">
            <h5 class="text-gray-700 text-xl font-medium mb-2 font-bold">
              Mantenimiento a Domicilio
            </h5>
            <p class="text-gray-700 text-base mb-4">
              Some quick example text to build on the card title and make up the
              bulk of the card's content.
            </p>
          </div>
        </div>
      </div>

      <div class="flex justify-center">
        <div class="rounded-lg shadow-lg bg-gray-900 max-w-sm">
          <a href="#!">
            <img class="rounded-t-lg" src="imagenes/web/anemona.jpg" alt="" />
          </a>
          <div class="p-6">
            <h5 class="text-gray-700 text-xl font-medium mb-2 font-bold">
              Asesoramiento Técnico
            </h5>
            <p class="text-gray-700 text-base mb-4">
              Some quick example text to build on the card title and make up the
              bulk of the card's content.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="contacto" class="sm:items-center pt-10 sm:pt-0 bg-black">
    <KinesisContainer class="w-full absolute p-6" event="scroll">
      <KinesisElement :strength="50" axis="y">
        <div class="circle circle-purple"></div>
      </KinesisElement>
      <KinesisElement :strength="80" axis="y">
        <div class="circle circle-purple1"></div>
      </KinesisElement>
      <KinesisElement :strength="80" axis="y">
        <div class="circle circle-purple2"></div>
      </KinesisElement>
      <KinesisElement :strength="100" axis="y">
        <div class="circle circle-purple3"></div>
      </KinesisElement>
    </KinesisContainer>
    <div class="p-5">
      <p class="text-4xl font-extrabold z-10 text-center mb-3 text-white">
        Contacto
      </p>
      <div class="w-full flex justify-between p-5">
        <div class="w-1/2">
          <p class="text-gray-700 mb-2">Teléfono: 22222222</p>
          <p class="text-gray-700 mb-2">contacto@correo.com</p>
          <p class="text-gray-700">Horarios: 10:00am - 8:00pm L-S</p>
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

</div>
<JetActionMessage :on="true" class="bg-red-200 absolute bottom-0 right-0 z-50"> 
  <div>hola</div>
</JetActionMessage>
</template>

<style scoped>
.circle {
  position: absolute;
  border-radius: 100%;
}

.circle.circle-purple {
  border: 10px solid #f2eafa;
  opacity: 0.1;
  width: 4vw;
  height: 4vw;
  left: 10%;
  top: 25%;
}

.circle.circle-purple1 {
  border: 15px solid #f2eafa;
  opacity: 0.1;
  width: 8vw;
  height: 8vw;
  right: -5%;
  bottom: 17%;
}
.circle.circle-purple2 {
  background-color: #f2eafa;
  opacity: 0.1;
  width: 5vw;
  height: 5vw;
  left: 20%;
  bottom: 20%;
}

.circle.circle-purple3 {
  border: 15px solid #f2eafa;
  opacity: 0.3;
  width: 3vw;
  height: 3vw;
  top: 80%;
  left: 60%;
}
.bg-gray-100 {
  background-color: #f7fafc;
  background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
}

.border-gray-200 {
  border-color: #edf2f7;
  border-color: rgba(237, 242, 247, var(--tw-border-opacity));
}

.text-gray-400 {
  color: #cbd5e0;
  color: rgba(203, 213, 224, var(--tw-text-opacity));
}

.text-gray-500 {
  color: #a0aec0;
  color: rgba(160, 174, 192, var(--tw-text-opacity));
}

.text-gray-600 {
  color: #718096;
  color: rgba(113, 128, 150, var(--tw-text-opacity));
}

.text-gray-700 {
  color: #4a5568;
  color: rgba(74, 85, 104, var(--tw-text-opacity));
}

.text-gray-900 {
  color: #1a202c;
  color: rgba(26, 32, 44, var(--tw-text-opacity));
}

@media (prefers-color-scheme: dark) {
  .dark\:bg-gray-800 {
    background-color: #2d3748;
    background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
  }

  .dark\:bg-gray-900 {
    background-color: #1a202c;
    background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
  }

  .dark\:border-gray-700 {
    border-color: #4a5568;
    border-color: rgba(74, 85, 104, var(--tw-border-opacity));
  }

  .dark\:text-white {
    color: #fff;
    color: rgba(255, 255, 255, var(--tw-text-opacity));
  }

  .dark\:text-gray-400 {
    color: #cbd5e0;
    color: rgba(203, 213, 224, var(--tw-text-opacity));
  }
}
</style>


