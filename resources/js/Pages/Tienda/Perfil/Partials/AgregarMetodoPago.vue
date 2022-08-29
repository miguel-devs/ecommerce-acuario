<template>
	<div>
		<input v-model="form.cardHolderName" type="text">
 
<!-- Stripe Elements Placeholder -->
<div id="card-element"></div>
 <div v-if="message">{{message}}</div>

<button id="card-button" @click="submit" >
   Verificar tarjeta
</button>


	</div>
</template>

<script  setup>
import { onMounted, ref, reactive, computed} from 'vue';
import { loadStripe } from '@stripe/stripe-js'
import { useForm } from '@inertiajs/inertia-vue3';
import process from "process";


let stripe = reactive({})
let cardElement = reactive({})
let message = ref(null);
const props = defineProps({
	"intent":Object
});

let paymentProcessing = ref(false);
onMounted(async () => {


    stripe = await loadStripe("pk_test_51LWwkIDZKIRPs7tlcUWcAeyLqB3918I2YNsPwVREdzQEWSpItAW4QfKzeEGZrzgWWehTwucrjuo72wjH60BEnw6I00EGfjSCoX")        

    let elements = stripe.elements();

    cardElement = elements.create('card', {
        classes: {
            base: 'bg-gray-100 rounded border border-gray-300 focus:border-indigo-500 text-base outline-none text-gray-700 p-3 leading-8 transition-colors duration-200 ease-in-out'
        }
    });

    cardElement.mount('#card-element');

});

	

const form = useForm({
     cardHolderName:'',
});



const submit = () => {
	
stripe.confirmCardSetup(props.intent.client_secret, {
    payment_method: {
      card: cardElement,
      billing_details: {
       name: form.cardHolderName
      },
    },
  })
  .then(function(result) {
    // Handle result.error or result.setupIntent
    console.log(result);
    if(result.error){
       message.value = result.error.message;
    }else if(result.setupIntent){
       
    }
  });

 
}
 


</script>
