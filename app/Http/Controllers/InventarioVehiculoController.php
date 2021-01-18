<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblinventariovehiculo_ive;
use App\Http\Requests\InventarioVehiculoRequest;
use Illuminate\Support\Facades\DB;

class InventarioVehiculoController extends Controller
{
    public function index()
    {
        return view('inventario_vehiculo.index');
    }

    public function create()
    {
        return view('inventario_vehiculo.create');
    }

    public function store(InventarioVehiculoRequest $request)
    {
        if(!$request->ajax()) return redirect('/');
        $inventario = Tblinventariovehiculo_ive::create($request->all());
        return $inventario->ive_id;
    }

    public function show(Request $request,$id)
    {
        $page = $request['page'];
        $limit = $request['rows'];
        $sidx = $request['sidx'];
        $sord = $request['sord'];
        $start = ($limit * $page) - $limit; 
        if ($start < 0) {
            $start = 0;
        }
        $totalg = Tblinventariovehiculo_ive::count();
        $sql = Tblinventariovehiculo_ive::orderBY($sidx,$sord)->limit($limit)->offset($start)->get();

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
            $Lista->rows[$Index]['id'] = $Datos->ive_id;
            $Lista->rows[$Index]['cell'] = array(
                $Datos->ive_id,
                $Datos->ive_descripcion,
                '<button class="btn btn-danger btn-sm btn-fab btn-round py-0 my-0" onClick="fn_eliminar_inventario('.$Datos->ive_id.')"><i class="material-icons">clear</i></button>',
            );
        }
        return response()->json($Lista);
    }

    public function edit($id)
    {
    	return view('inventario_vehiculo.edit', [
            'inventario' => Tblinventariovehiculo_ive::where('ive_id',$id)->first()
        ]);
    }

    public function update(InventarioVehiculoRequest $request, $ive_id)
    {
        $inventario = Tblinventariovehiculo_ive::find($ive_id);
        $inventario->update($request->all());
        return $inventario->ive_id;
    }

    public function destroy(Request $request)
    {
        return Tblinventariovehiculo_ive::where('ive_id',$request['ive_id'])->delete();
    }
}
