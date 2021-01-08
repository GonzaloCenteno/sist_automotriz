<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblempresa_emp;
use App\Http\Requests\EmpresaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmpresaController extends Controller
{
    public function index()
    {
        return view('empresa.edit', [
            'empresa' => Tblempresa_emp::first()
        ]);
    }

    public function update(EmpresaRequest $request, $emp_id)
    {
        if(!$request->ajax()) return redirect('/');
        $empresa = Tblempresa_emp::find($emp_id);
        $imagen = $this->agregar_imagen($request->file('emp_imagen'));
        if($imagen)
        {
            $empresa->update([
                'emp_nombre' => $request['emp_nombre'],
                'emp_titulo' => $request['emp_titulo'],
                'emp_imagen' => $imagen, 
                'emp_direccion'=> $request['emp_direccion'],
                'emp_telefono'=> $request['emp_telefono'],
                'emp_correo'=> $request['emp_correo'],
                'emp_web'=> $request['emp_web'],
                'emp_horario'=> $request['emp_horario'],
                'emp_descripcion'=> $request['emp_descripcion'],
            ]);
        }
        else
        {
            $empresa->update($request->all());
        }
        return $empresa->emp_id;
    }

    private function agregar_imagen($imagen){
        if($imagen)
        {
            $bandera = Str::random(12);
            $filename = $imagen->getClientOriginalName();
            $fileserver = $bandera.'_'.$filename;
            $imagen->move(public_path('img/'), htmlentities($fileserver));
            return 'img/'.$fileserver;
        }
        else
        {
            return false;
        }
    }
}
