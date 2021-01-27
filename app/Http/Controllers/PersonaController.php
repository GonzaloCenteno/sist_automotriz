<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblpersona_per;
use App\Models\Tblficha_fic;
use App\Http\Requests\PersonaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PersonaController extends Controller
{
    public function index()
    {
        return view('persona.index');
    }

    public function create(Request $request)
    {
        return view('persona.create');
    }

    public function store(PersonaRequest $request)
    {
        if(!$request->ajax()) return redirect('/');
        $sql = Tblficha_fic::orderBy('fic_id','DESC')->take(1)->first();
        if ($sql):
            $orden = $sql->fic_ordentrabajo + 1;
        else:
            $orden = 1;
        endif;
        $request['per_documento'] = ($request['per_documento']) ? $request['per_documento'] : $orden;
        return Tblpersona_per::create($request->all());
    }

    public function show(Request $request, $id)
    {
        if($request['tabla'] == 'persona' )
        {
            return $this->crear_tabla_persona($request);
        }
        if($request['busqueda'] == 'persona' )
        {
            return $this->buscar_datos_persona($request, $id);
        }
    }

    public function crear_tabla_persona(Request $request)
    {
        $page = $request['page'];
        $limit = $request['rows'];
        $sidx = $request['sidx'];
        $sord = $request['sord'];
        $start = ($limit * $page) - $limit; 
        if ($start < 0) {
            $start = 0;
        }
        $totalg = Tblpersona_per::count();
        $sql = Tblpersona_per::orderBY($sidx,$sord)->limit($limit)->offset($start)->get();

        $total_pages = 0;
        if (!$sidx) {
            $sidx = 1;
        }
        $count = $totalg;
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        }
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        $Lista = new \stdClass();
        $Lista->page = $page;
        $Lista->total = $total_pages;
        $Lista->records = $count;
        foreach ($sql as $Index => $Datos) {
            $Lista->rows[$Index]['id'] = $Datos->per_id;
            $Lista->rows[$Index]['cell'] = array(
                $Datos->per_id,
                $Datos->per_tipodocumento,
                $Datos->per_documento,
                $Datos->per_razonsocial,
                $Datos->nombre_completo
            );
        }
        return response()->json($Lista);
    }

    public function buscar_datos_persona(Request $request, $per_documento)
    {
        if($per_documento == 'dni'):
            return 0;
        endif;
        
        $persona = Tblpersona_per::where('per_documento',$per_documento)->first();
        if($persona):
            return $persona;
        else:
            return 0;
        endif;
    }

    public function edit($id)
    {
        if(Auth::user()->rol == 'TECNICO')
        {
            return redirect('/registro');
        }
    	return view('persona.edit', [
            'persona' => Tblpersona_per::where('per_id',$id)->first()
        ]);
    }

    public function update(PersonaRequest $request, $per_id)
    {
        $persona = Tblpersona_per::find($per_id);
        $persona->update($request->all());
        return $persona->per_id;
    }

}
