<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArchivoRequest extends FormRequest
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
            'archivo.*' => 'required|mimes:pdf,jpg,jpeg,bmp,png',
        ];
    }

    public function messages()
    {
        return [
            'archivo.*.required' => 'EL CAMPO ARCHIVO ES OBLIGATORIO',
            'archivo.*.mimes' => 'LOS ARCHIVOS DEBEN TENER UN FORMATO JPG, JPEG, BMP, PNG, PDF.'
        ];
    }
}
