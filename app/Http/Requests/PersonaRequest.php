<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'per_dni' => 'required|numeric|unique:tblpersona_per|digits_between:8,8',
            'per_nombres' => 'required',
            'per_apaterno' => 'required',
            'per_amaterno' => 'required',
            'per_email' => 'required|email',
            'per_telefonos' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'per_dni.required' => 'EL CAMPO DNI ES OBLIGATORIO',
            'per_dni.digits_between' => 'EL CAMPO DNI DEBE TENER 8',
            'per_dni.numeric' => 'EL CAMPO DNI DEBE SER UN NUMERO',
            'per_dni.unique' => 'ESTE REGISTRO YA FUE INGRESADO',
            'per_nombres.required' => 'EL CAMPO NOMBRES ES OBLIGATORIO',
            'per_apaterno.required' => 'EL CAMPO APELLIDO PATERNO ES OBLIGATORIO',
            'per_amaterno.required' => 'EL CAMPO APELLIDO MATERNO ES OBLIGATORIO',
            'per_email.required' => 'EL CAMPO CORREO ES OBLIGATORIO',
            'per_email.email' => 'EL CAMPO CORREO ES INVALIDO',
            'per_telefonos.required' => 'EL CAMPO TELEFONOS ES OBLIGATORIO'
        ];
    }
}
