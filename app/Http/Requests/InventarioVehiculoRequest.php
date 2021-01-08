<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InventarioVehiculoRequest extends FormRequest
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
            'ive_descripcion' => ['required', Rule::unique('tblinventariovehiculo_ive')->ignore($this->inventario_vehiculo,'ive_id')]
        ];
    }

    public function messages()
    {
        return [
            'ive_descripcion.required' => 'EL CAMPO DESCRIPCION ES OBLIGATORIO',
            'ive_descripcion.unique' => 'ESTE REGISTRO YA FUE INGRESADO'
        ];
    }
}
