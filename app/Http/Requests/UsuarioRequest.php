<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'name' => 'required',
            'rol' => 'required|not_in:0',
            'email' => 'required|email',
            'password' => 'sometimes|required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'EL CAMPO NOMBRE ES OBLIGATORIO',
            'rol.required' => 'EL CAMPO ROL ES OBLIGATORIO',
            'rol.not_in' => 'DEBE SELECCIONAR UNA OPCION',
            'email.required' => 'EL CAMPO CORREO ES OBLIGATORIO',
            'email.email' => 'EL CAMPO CORREO ES INVALIDO',
            'password.required' => 'EL CAMPO PASSWORD ES OBLIGATORIO'
        ];
    }
}
