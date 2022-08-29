<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    public static function myRules()
    {
         return [
           'descuento' => 'required',
           'desde' => 'required',
           'hasta' => 'required',
         ];
    }

    public static function myMessages(){
         return [
             'descuento.required' => 'requerido',
             'desde.required' => 'requerido',
             'hasta.required' => 'requerido',
         ];
    }
    public function messages(){
             return $this->myMessages();
    }

    public function rules()
    {
        return $this->myRules();
    }
}
