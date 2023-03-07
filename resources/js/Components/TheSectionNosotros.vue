<template>
  <section id="section-nosotros" class="relative h-screen">
    <TitleSeparator class="w-full absolute -top-[1.7rem]">
      Nosotros
    </TitleSeparator>
    <div class="bg-black text-white h-full">

      <div class="md:grid md:grid-cols-2 lg:grid lg:grid-cols-2 h-full ">

        <div class="flex justify-center items-center h-full p-16	">
          <div class="p-5">
            <p class="text-center  text-4xl ">Mantenimiento de acuarios marinos y de arrecife, fabricamos
              sobre diseño acuarios, arrecifes y más.</p>
            <p class="text-center text-3xl mt-4">Instalaciones residenciales y comerciales.</p>
            <p class="text-center mt-5">Tenemos más de 30 años de experiencia.</p>
            <div>
              <p class="text-center">Si quieres cotizar un servicio o producto, escríbenos a whatsapp , con gusto te
                atenderemos.</p>

              <div class="flex justify-center mt-5">
                <div class="w-40 rounded-lg pl-4 pt-2 pr-4 pb-2 text-white bg-transparent border border-white font-bold">
                  <a href="https://wa.me/5561102814?text=Hola, quiero hacer una cotización." target="_blank" class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                      <path
                        d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                    </svg>
                    <span class="ml-2">WhatsApp</span>
                  </a>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="hidden md:block lg:block w-full h-full">
          <div class="h-full w-full flex justify-center items-center text-center">
            <div class="image-mantenimiento block">

              <img class="rounded w-80" src="imagenes/web/mantenimiento.jpg" alt="mantenimiento" title="mantenimiento">
              <div class="mt-5 p-4">
                <p>Mantenimiento de acuarios 🐠🐡</p>
              </div>

            </div>

            <div class="image-mantenimiento hidden">
              <div class="flex justify-center">
                   <img class="rounded w-96" src="imagenes/web/mantenimiento-2.jpg" alt="mantenimiento" title="mantenimiento">
              </div>
              <div class="mt-5 p-4">
                <p>Tiburón bambú (Chiloscyllium punctatum)</p>
              </div>
            </div>

            <div class="image-mantenimiento hidden">
              <div class="flex justify-center">
                <img class="rounded w-96" src="imagenes/web/mantenimiento-3.jpg" alt="mantenimiento" title="mantenimiento">
              </div>
              <div class="mt-5 p-4">
                <p>Si deseas tener un arrecife artificial, fabricamos las piezas más espectaculares de acuerdo al tamaño de tu proyecto</p>
              </div>
            </div>

            <div class="image-mantenimiento hidden">
              <div class="flex justify-center">            
              <img class="rounded w-96" src="imagenes/web/mantenimiento-4.jpg" alt="mantenimiento" title="mantenimiento">
              </div>
              <div class="mt-5 p-4">
                <p>Si deseas tener un arrecife artificial, fabricamos las piezas más espectaculares de acuerdo al tamaño de tu proyecto</p>
              </div>
            </div>
            <div class="image-mantenimiento hidden">
              <div class="flex justify-center">
              <img class="rounded w-96" src="imagenes/web/mantenimiento-5.jpg" alt="mantenimiento" title="mantenimiento">
              </div>
              <div class="mt-5 p-4">
                <p>Sabías que el 50% de los peces mueren durante el primer mes en cautiverio debido al estrés generado por una mala captura y/o aclimatación?
                   Te recomendamos tener tu acuario con los parámetros adecuados antes de introducir peces nuevos.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</template>
    
<script>
import { Link } from "@inertiajs/inertia-vue3";
import TitleSeparator from "@/Layouts/TitleSeparator.vue";

export default {
  components: {
    TitleSeparator,
    Link,
  },
  data() {
    return {
      seleccionador: 0
    }
  },
  mounted() {
   this.rotarImagenes();

  },
  methods: {
    rotarImagenes() {
      let self = this;
      let imagenes = document.getElementsByClassName("image-mantenimiento");
      let totalImagenes = imagenes.length;
      let anterior = null;
      let time = 8000;
      let changeTime = self.seleccionador + 1;
      setInterval(function () {

        if (self.seleccionador == 0) {

          imagenes[self.seleccionador].classList.replace("block", "hidden");
          imagenes[1].classList.replace("hidden", "block");

        } else if (self.seleccionador < totalImagenes) {

          imagenes[self.seleccionador].classList.replace("hidden", "block");
          imagenes[anterior].classList.replace("block", "hidden");

        } else {

          self.seleccionador = 0;
          anterior = null;

          imagenes[self.seleccionador].classList.replace("hidden", "block");
          imagenes[totalImagenes - 1].classList.replace("block", "hidden");
        }


        self.seleccionador++;
        anterior = self.seleccionador - 1;

      }, time);

    }
  }
}
</script>
    