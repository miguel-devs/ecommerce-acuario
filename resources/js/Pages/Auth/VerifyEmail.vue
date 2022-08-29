<script setup>
import { computed } from 'vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';

const props = defineProps({
    status: String,
});

const form = useForm();

const submit = () => {
    form.post(route('verification.send'));
};

const verificationLinkSent = computed(() => props.status === 'verification-link-sent');
</script>

<template>
    <Head title="Verificar correo electronico" />

    <JetAuthenticationCard>
        
        <JetAuthenticationCardLogo/>

        <div class="mt-4 mb-4 p-5 text-sm text-gray-600">
            Aun no has verificado tu correo electronico, revisa tu bandeja de entrada y da click en el enlace para verificar tu correo electronico. Si no recibiste el correo, da click en reenviar verificación.
        </div>

        <div v-if="verificationLinkSent" class="mb-4 font-medium text-sm text-green-600">
            Se envio una nueva verificación al correo electronico que proposionaste.
        </div>

        <form @submit.prevent="submit">
            <div class="mt-4 flex items-center justify-between">
                <JetButton class="bg-sky-500 hover:bg-sky-600" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Reenviar verificacion
                </JetButton>

                <div>
                   

                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="underline text-sm text-gray-600 hover:text-gray-900 ml-2"
                    >
                    Cerrar sesión
                    </Link>
                </div>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
