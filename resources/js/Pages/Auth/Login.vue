<script setup>
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template >
    
    <Head title="Iniciar sesión" />
   
    <JetAuthenticationCard >
        <JetValidationErrors class="mb-4" />
        <JetAuthenticationCardLogo/>


        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

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

            <div class="mt-4">
                <JetLabel for="password" value="Contraseña" />
                <JetInput
                    id="password"
                    v-model="form.password"
                    type="password"
                    class="mt-1 block w-full"
                    required
                    autocomplete="current-password"
                />
            </div>

            

            <div class="mt-4">
                <div class="mb-4">
                <div>    
                <Link :href="route('register')" class="text-center underline text-sm text-gray-600 hover:text-gray-900">
                    Registrarme
                </Link>
                </div>
                <div>
                <Link v-if="canResetPassword" :href="route('password.request')" class="underline text-sm text-gray-600 hover:text-gray-900">
                    ¿Olvidaste tu contraseña?
                </Link>
                </div>
                </div>
                <div>
                <div class="flex justify-center">    
                <JetButton class="ml-4 bg-sky-500 hover:bg-sky-600" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Iniciar sesión
                </JetButton>
                </div>
                </div>
            </div>
        </form>
    </JetAuthenticationCard>
</template>
