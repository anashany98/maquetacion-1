<?php

/*
|--------------------------------------------------------------------------
| Validaciones del formulario de la sección FAQ's
|--------------------------------------------------------------------------
|
| **authorize: determina si el usuario debe estar autorizado para enviar el formulario. 
|
| **rules: recoge las normas que se deben cumplir para validar el formulario. Los errores son 
|   devueltos en forma de objeto JSON en un error 422.
| 
| **messages: mensajes personalizados de error.
|    
*/

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'name' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'nif'=>'required',
            'cp'=>'required',
            'address'=>'required',
            'ciudad'=>'required',
        ];
    }

    public function messages()
    {
        return [
            
            'name.required' => 'El nombre es obligatorio',
            'nif.require'=>'El NIF es obligatorio',
            'telefono.require'=>'El NIF es obligatorio',
            'email.require'=>'El NIF es obligatorio',
            'cp.require'=>'El NIF es obligatorio',
            'address.required'=>'La direccion es obligatoria',
            'ciudad.required'=>'La ciudad es obligatoria',
        ];
    }
}