<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblpersona_per;
use App\Http\Requests\PersonaRequest;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        
    }

    public function store(PersonaRequest $request)
    {
        if(!$request->ajax()) return redirect('/');
        $persona = Tblpersona_per::create($request->all());
        return response()->json([
            'per_id' => $persona->per_id,
            'per_nombres' => $persona->NombreCompleto,
            'per_direccion' => $persona->per_direccion,
            'per_email' => $persona->per_email,
            'per_telefonos' => $persona->per_telefonos
        ]);
    }

    public function show(Request $request,$per_dni)
    {
        $persona = Tblpersona_per::where('per_dni',$per_dni)->first();
        if($persona)
        {
            return response()->json([
                'per_id' => $persona->per_id,
                'per_nombres' => $persona->NombreCompleto,
                'per_direccion' => $persona->per_direccion,
                'per_email' => $persona->per_email,
                'per_telefonos' => $persona->per_telefonos
            ]);
        }
        else
        {
            return 0;
        }
    }

    public function edit($id)
    {
    	
    }

    public function update(PersonaRequest $request, $id)
    {
        
    }

}
