<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductOptionRequest extends FormRequest
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
           'caracteristicas' => 'required',
         ];
    }

    public static function myMessages(){
         return [
             'caracteristicas.required' => 'requerido',
            
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
