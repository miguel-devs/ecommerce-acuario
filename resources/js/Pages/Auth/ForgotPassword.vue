<script setup>
import { Head,Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

defineProps({
    status: String,
});

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(route('password.email'));
};
</script>

<template>
    <Head title="Olvide mi contraseña" />

    <JetAuthenticationCard>
           
        <JetAuthenticationCardLogo/>

        <div class="mb-4 text-sm text-gray-600">
            ¿Olvidaste tu contraseña? Ingresa tu correo electrónico, para restablecer tu contraseña.
        </div>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            Hemos enviado un correo para restablecer tu contraseña.
        </div>

        <JetValidationErrors class="mb-4" />

        <form @submit.prevent="submit">
            <div>
                <JetLabel for="email" value="Correo" />
                <JetInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')" class="mr-4 underline text-sm text-gray-600 hover:text-gray-900">
                    Iniciar sesión
                </Link>
                <JetButton class="bg-sky-500 hover:bg-sky-600" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                   Enviar
                </JetButton>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
