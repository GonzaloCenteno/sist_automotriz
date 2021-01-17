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
        return Tblpersona_per::create($request->all());
    }

    public function show(Request $request,$per_documento)
    {
        $persona = Tblpersona_per::where('per_documento',$per_documento)->first();
        if($persona):
            return $persona;
        else:
            return 0;
        endif;
    }

    public function edit($id)
    {
    	
    }

    public function update(PersonaRequest $request, $id)
    {
        
    }

}
