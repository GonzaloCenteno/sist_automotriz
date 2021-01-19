<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblmaterial_mat;
use App\Http\Requests\MaterialRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    public function index()
    {
        return view('material.index');
    }

    public function create()
    {
        return view('material.create');
    }

    public function store(MaterialRequest $request)
    {
        if(!$request->ajax()) return redirect('/');
        $material = Tblmaterial_mat::create($request->all());
        return $material->mat_id;
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
        $totalg = Tblmaterial_mat::count();
        $sql = Tblmaterial_mat::orderBY($sidx,$sord)->limit($limit)->offset($start)->get();

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
            $Lista->rows[$Index]['id'] = $Datos->mat_id;
            $Lista->rows[$Index]['cell'] = array(
                $Datos->mat_id,
                $Datos->mat_descripcion,
                '<button class="btn btn-danger btn-sm btn-fab btn-round py-0 my-0" onClick="fn_eliminar_material('.$Datos->mat_id.')"><i class="material-icons">clear</i></button>',
            );
        }
        return response()->json($Lista);
    }

    public function edit($id)
    {
        if(Auth::user()->rol == 'TECNICO')
        {
            return redirect('/registro');
        }
    	return view('material.edit', [
            'material' => Tblmaterial_mat::where('mat_id',$id)->first()
        ]);
    }

    public function update(MaterialRequest $request, $mat_id)
    {
        $material = Tblmaterial_mat::find($mat_id);
        $material->update($request->all());
        return $material->mat_id;
    }

    public function destroy(Request $request)
    {
        return Tblmaterial_mat::where('mat_id',$request['mat_id'])->delete();
    }
}
