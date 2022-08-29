<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
   public static function myRules($imagen)
    {
        if($imagen){
            return [
           'imagen' => 'mimes:jpeg,png|max:10240', //10Mb
           "nombre" => 'required',
           "descripcion" => 'required',
           "precio" => 'required',
           "brand_id" => 'required',
           "category_id" => 'required',
           "detalles" => 'required',
           "activo" => 'required',
          ];
        }
         return [
           "nombre" => 'required',
           "descripcion" => 'required',
           "precio" => 'required',
           "brand_id" => 'required',
           "category_id" => 'required',
           "detalles" => 'required',
           "activo" => 'required',
         ];
    }

    public static function myMessages(){
         return [
           'imagen.max' => 'Maximo 10Mb',
           'imagen.mimes' => 'formato jpeg o png',
           "nombre.required" => 'requerido',
           "descripcion.required" => 'requerido',
           "precio.required" => 'requerido',
           "brand_id.required" => 'requerido',
           "category_id.required" => 'requerido',
           "detalles.required" => 'requerido',
           "activo.required" => 'requerido',
           "imagen.required" => 'requerido'
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
