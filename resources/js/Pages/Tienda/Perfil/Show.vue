<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import DeleteUserForm from '@/Pages/Tienda/Perfil/Partials/DeleteUserForm.vue';
import JetSectionBorder from '@/Jetstream/SectionBorder.vue';
import LogoutOtherBrowserSessionsForm from '@/Pages/Tienda/Perfil/Partials/LogoutOtherBrowserSessionsForm.vue';
import TwoFactorAuthenticationForm from '@/Pages/Tienda/Perfil/Partials/TwoFactorAuthenticationForm.vue';
import UpdatePasswordForm from '@/Pages/Tienda/Perfil/Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from '@/Pages/Tienda/Perfil/Partials/UpdateProfileInformationForm.vue';
import { Head } from "@inertiajs/inertia-vue3";
import NavBarTienda from "@/Layouts/NavBarTienda.vue";
import NavLeft from "@/Layouts/NavLeftDev.vue";
import TitleSeparator from "@/Layouts/TitleSeparator.vue";

defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
});
</script>

<template>
         <Head title="Perfil" />
        <div class="min-h-screen relative">
    <NavBarTienda />
    <div class="w-full h-full relative ">
      <NavLeft />
            <section class="w-full min-h-screen bg-sky-700 bg-cover bg-center bg-no-repeat pt-20 pl-10 pr-10 pb-5">

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div v-if="$page.props.jetstream.canUpdateProfileInformation" class="bg-white  p-2 rounded-t-md border-b border-gray-300">
                    <UpdateProfileInformationForm :user="$page.props.user" />

                </div>

                <div v-if="$page.props.jetstream.canUpdatePassword" class="bg-white  p-2 border-b border-gray-300">
                    <UpdatePasswordForm class="mt-10 sm:mt-0" />

                </div>

                

                <LogoutOtherBrowserSessionsForm :sessions="sessions" class="bg-white  p-2 border-b border-gray-300" />

                <template v-if="$page.props.jetstream.hasAccountDeletionFeatures" >

                    <DeleteUserForm class="mt-10 sm:mt-0 bg-white  p-2 rounded-b-md" />
                </template>
            </div>
        </div>
        </section>
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
        </div>
    </div>
</template>
