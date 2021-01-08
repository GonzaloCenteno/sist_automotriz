<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'emp_nombre' => 'required',
            'emp_titulo' => 'required',
            'emp_direccion' => 'required',
            'emp_telefono' => 'required',
            'emp_correo' => 'required|email',
            'emp_web' => 'required|url',
            'emp_horario' => 'required',
            'emp_descripcion' => 'required',
            'emp_imagen' => 'mimes:jpg,jpeg,bmp,png'
        ];
    }

    public function messages()
    {
        return [
            'emp_nombre.required' => 'EL CAMPO NOMBRE ES OBLIGATORIO',
            'emp_titulo.required' => 'EL CAMPO TITULO ES OBLIGATORIO',
            'emp_direccion.required' => 'EL CAMPO DIRECCION ES OBLIGATORIO',
            'emp_telefono.required' => 'EL CAMPO TELEFONO ES OBLIGATORIO',
            'emp_correo.required' => 'EL CAMPO CORREO ES OBLIGATORIO',
            'emp_correo.email' => 'EL CAMPO CORREO ES INVALIDO',
            'emp_web.required' => 'EL CAMPO PAGINA WEB ES OBLIGATORIO',
            'emp_web.url' => 'EL FORMATO PAGINA WEB ES INVALIDO',
            'emp_horario.required' => 'EL CAMPO HORARIO ES OBLIGATORIO',
            'emp_descripcion.required' => 'EL CAMPO DESCRIPCION ES OBLIGATORIO',
            'emp_imagen.mimes' => 'LA IMAGEN DEBE SER UN ARCHIVO CON FORMATO JPG, JPEG, BMP, PNG.'
        ];
    }
}
