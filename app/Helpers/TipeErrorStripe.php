<?php

namespace App\Helpers;


class TipeErrorStripe
{
    public static function messageError($error)
    {
      $mensaje ="";

      switch($error){
       case "authentication_required":
            $mensaje ="La tarjeta se rechazó porque la transacción requiere autenticación.";
        break; 
        case "approve_with_id":
             $mensaje ="No se puede autorizar el pago.";
        break; 

        
        case "card_not_supported":
           $mensaje ="La tarjeta no admite este tipo de compras.";
        break; 
        case "card_velocity_exceeded":
              $mensaje ="El cliente ha excedido el límite del saldo o del crédito disponible en su tarjeta.";
        break; 
        case "currency_not_supported":
            $mensaje ="La tarjeta no acepta la moneda especificada.";
        break; 
         
        
        case "duplicate_transaction":
           $mensaje ="Hace muy poco se realizó otra transacción por el mismo importe con los mismos datos de tarjeta de crédito.";
        break; 
        case "expired_card":
           $mensaje ="La tarjeta está vencida.";
        break; 
        case "fraudulent":
          $mensaje ="El pago se rechazó porque Stripe sospecha que es fraudulento.   ";
        break; 
        case "incorrect_number":
            $mensaje ="El número de tarjeta no es correcto.";
         break; 

        case "incorrect_cvc":
            $mensaje ="El número de CVC no es correcto.  ";
         break; 

        case "incorrect_pin":
            $mensaje ="El PIN ingresado no es correcto. Este código de rechazo solo se aplica a pagos efectuados con un lector de tarjetas.";
         break; 

        case "incorrect_zip":
            $mensaje ="El código postal no es correcto.";
         break; 

        case "insufficient_funds":
            $mensaje ="No hay fondos suficientes en la tarjeta para hacer la compra. ";
         break; 
        case "invalid_account":
            $mensaje ="La tarjeta o la cuenta a la que está conectada la tarjeta no es válida.";
         break; 
        case "incorrect_number":
            $mensaje ="El número de tarjeta no es correcto.";
         break; 
        case "invalid_amount":
            $mensaje ="El importe del pago no es válido o excede el importe permitido.";
         break; 

        case "invalid_cvc":
            $mensaje ="El número de CVC no es correcto.";
         break; 
         case "invalid_expiry_month":
            $mensaje ="El mes de vencimiento no es válido.   ";
         break; 
         case "invalid_expiry_year":
            $mensaje ="El año de vencimiento no es válido.   ";
         break; 
         case "invalid_number":
            $mensaje ="El número de tarjeta no es correcto.  ";
         break; 
         case "issuer_not_available":
            $mensaje ="No se pudo establecer contacto con el emisor de la tarjeta, así que no se pudo autorizar el pago.";
         break; 
         case "lost_card":
            $mensaje ="El pago se rechazó porque la tarjeta se denunció como extraviada. ";
         break; 
         case "merchant_blacklist":
            $mensaje ="El pago se rechazó porque coincide con un valor de la lista de bloqueo del usuario de Stripe. ";
         break; 
         case "new_account_information_available":
            $mensaje ="La tarjeta o la cuenta a la que está conectada la tarjeta no es válida.   ";
         break; 
         case "not_permitted":
            $mensaje ="El pago no está permitido.    ";
         break; 
         case "offline_pin_required":
            $mensaje ="La tarjeta se rechazó porque se necesita un PIN.  ";
         break; 
        case "online_or_offline_pin_required":
            $mensaje ="La tarjeta se rechazó porque se necesita un PIN.  ";
         break; 
          case "pickup_card":
            $mensaje ="El cliente no puede usar esta tarjeta para efectuar este pago (es posible que haya sido denunciada por extravío o robo).  ";
         break;  
        case "pin_try_exceeded":
            $mensaje ="Se superó el número permitido de intentos de ingreso del PIN. ";
         break;   
        case "processing_error":
            $mensaje ="Se produjo un error al procesar la tarjeta.   ";
         break;   
        case "reenter_transaction":
            $mensaje ="El emisor no pudo procesar el pago por un motivo desconocido. ";
         break; 
         case "restricted_card":
            $mensaje ="El cliente no puede usar esta tarjeta para efectuar este pago (es posible que haya sido denunciada por extravío o robo).";
         break; 

         case "stolen_card":
            $mensaje ="El pago se rechazó porque la tarjeta se denunció como robada. ";
         break; 

        case "testmode_decline":
            $mensaje ="Se utilizó el número de una tarjeta de prueba de Stripe.";
         break; 
        case "withdrawal_count_limit_exceeded":
            $mensaje ="El cliente ha excedido el límite del saldo o del crédito disponible en su tarjeta.    ";
         break; 
         default:
             $mensaje ="La tarjeta se rechazó por un motivo desconocido.";
         

      } 

      return $mensaje;
    }

   
}