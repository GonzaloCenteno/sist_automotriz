<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FichaRequest extends FormRequest
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
            // 'fic_facturara' => 'required',
            'per_id' => 'sometimes|required',
            'fic_marca' => 'required',
            'fic_placa' => 'required',
            'fic_modelo' => 'required',
            'fic_color' => 'required',
            'fic_km' => 'required',
            'fic_nmotor' => 'required',
            'fic_anio' => 'required',
            'fic_nchasis' => 'required',
            'fic_trabajosarealizar' => 'required',
            'fic_observaciones' => 'required',
            'fic_nivelcombustible' => 'required'
        ];
    }

    public function messages()
    {
        return [
            // 'fic_facturara.required' => 'EL CAMPO FACTURAR A ES OBLIGATORIO',
            'per_id.required' => 'EL CAMPO PROPIETARIO ES OBLIGATORIO',
            'fic_marca.required' => 'EL CAMPO MARCA ES OBLIGATORIO',
            'fic_placa.required' => 'EL CAMPO PLACA ES OBLIGATORIO',
            'fic_modelo.required' => 'EL CAMPO MODELO ES OBLIGATORIO',
            'fic_color.required' => 'EL CAMPO COLOR ES OBLIGATORIO',
            'fic_km.required' => 'EL CAMPO KM ES OBLIGATORIO',
            'fic_nmotor.required' => 'EL CAMPO N° MOTOR ES OBLIGATORIO',
            'fic_anio.required' => 'EL CAMPO AÑO ES OBLIGATORIO',
            'fic_nchasis.required' => 'EL CAMPO N° CHASIS ES OBLIGATORIO',
            'fic_trabajosarealizar.required' => 'EL CAMPO TRABAJOS A REALIZAR ES OBLIGATORIO',
            'fic_observaciones.required' => 'EL CAMPO OBSERVACIONES ES OBLIGATORIO',
            'fic_nivelcombustible.required' => 'DEBE SELECCIONAR UN NIVEL DE COMBUSTIBLE'
        ];
    }
}
