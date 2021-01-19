<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MaterialRequest extends FormRequest
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
            'mat_descripcion' => ['required', Rule::unique('tblmaterial_mat')->ignore($this->material,'mat_id')]
        ];
    }

    public function messages()
    {
        return [
            'mat_descripcion.required' => 'EL CAMPO DESCRIPCION ES OBLIGATORIO',
            'mat_descripcion.unique' => 'ESTE REGISTRO YA FUE INGRESADO'
        ];
    }
}
