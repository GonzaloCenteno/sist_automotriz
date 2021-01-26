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
            'per_documento' => 'sometimes|required|numeric|unique:tblpersona_per|digits_between:'.$this->get('count').','.$this->get('count'),
            'per_tipodocumento' => 'required',
            'per_razonsocial' => $this->get('per_tipodocumento') == 'DNI' ? 'sometimes' : 'required',
            'per_nombres' => $this->get('per_tipodocumento') == 'RUC' ? 'sometimes' : 'required',
            'per_apaterno' => $this->get('per_tipodocumento') == 'RUC' ? 'sometimes' : 'required',
            'per_amaterno' => $this->get('per_tipodocumento') == 'RUC' ? 'sometimes' : 'required',
            // 'per_email' => 'required|email',
            // 'per_telefonos' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'per_documento.required' => 'EL CAMPO DNI ES OBLIGATORIO',
            'per_documento.digits_between' => 'EL CAMPO DNI DEBE TENER '.$this->get('count').' CARACTERES',
            'per_documento.numeric' => 'EL CAMPO DNI DEBE SER UN NUMERO',
            'per_documento.unique' => 'ESTE REGISTRO YA FUE INGRESADO',
            'per_nombres.required' => 'EL CAMPO NOMBRES ES OBLIGATORIO',
            'per_apaterno.required' => 'EL CAMPO APELLIDO PATERNO ES OBLIGATORIO',
            'per_amaterno.required' => 'EL CAMPO APELLIDO MATERNO ES OBLIGATORIO',
            // 'per_email.required' => 'EL CAMPO CORREO ES OBLIGATORIO',
            // 'per_email.email' => 'EL CAMPO CORREO ES INVALIDO',
            // 'per_telefonos.required' => 'EL CAMPO TELEFONOS ES OBLIGATORIO',
            'per_tipodocumento.required' => 'EL CAMPO TIPO DOCUMENTO ES OBLIGATORIO',
            'per_razonsocial.required' => 'EL CAMPO RAZON SOCIAL ES OBLIGATORIO'
        ];
    }
}
