<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CuentaRequest extends FormRequest
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
            'email' => ['required','email', Rule::unique('users')->ignore($this->micuentum,'id')],
            'password' => 'sometimes|required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'EL CAMPO NOMBRE ES OBLIGATORIO',
            'email.required' => 'EL CAMPO CORREO ES OBLIGATORIO',
            'email.email' => 'EL CAMPO CORREO ES INVALIDO',
            'password.required' => 'EL CAMPO PASSWORD ES OBLIGATORIO'
        ];
    }
}
