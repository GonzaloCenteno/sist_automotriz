<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblficha_fic;
use App\Models\Tblmaterial_mat;
use App\Models\Tblinventariovehiculo_ive;
use App\Http\Requests\FichaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function index()
    {
        return view('registro.index', [
            'inventario' => Tblinventariovehiculo_ive::orderBy('ive_id','asc')->get(),
            'material' => Tblmaterial_mat::orderBy('mat_id','asc')->get()
        ]);
    }

    public function store(FichaRequest $request)
    {
        if(!$request->ajax()) return redirect('/');
        DB::beginTransaction();
        try{
                $sql = Tblficha_fic::orderBy('fic_id','DESC')->take(1)->first();
                if ($sql):
                    $orden = $sql->fic_ordentrabajo + 1;
                else:
                    $orden = 1;
                endif;
            $request['per_id'] = isset($request['per_id']) ? $request['per_id'] : 1;
            $request['user_id'] = Auth::user()->id;
            $request['fic_fecha'] = date('Y-m-d');
            $request['fic_ordentrabajo'] = $orden;
            $ficha = Tblficha_fic::create($request->all());
            if($request['mat_id'] != null):
                foreach ($request['mat_id'] as $i => $data):
                    if($request['fma_cantidad'][$i] !== null || $request['fma_tipo'][$i] !== null || ($request['fma_tipo'][$i] !== null && $request['fma_cantidad'][$i] !== null)):
                        $ficha->materiales()->attach($request['mat_id'][$i],[ 'fma_tipo' => $request['fma_tipo'][$i],'fma_cantidad' => $request['fma_cantidad'][$i] ]);
                    endif;
                endforeach;
            endif;

            DB::commit();
            return $ficha->fic_id;
        } catch (\Exception $ex) {
            DB::rollback();  
            return $ex->getMessage();                
        }
    }

    public function update(FichaRequest $request, $fic_id)
    {
        if(!$request->ajax()) return redirect('/');
        $datos = array();
        DB::beginTransaction();
        try{
            $ficha = Tblficha_fic::find($fic_id);
            $ficha->update($request->all());
            foreach ($request['mat_id'] as $i => $data):
                if($request['fma_cantidad'][$i] !== null || $request['fma_tipo'][$i] !== null || ($request['fma_tipo'][$i] !== null && $request['fma_cantidad'][$i] !== null)):
                    $datos[$request['mat_id'][$i]] = array(
                        'fma_tipo' => $request['fma_tipo'][$i],
                        'fma_cantidad' => $request['fma_cantidad'][$i]
                    );
                endif;
            endforeach;
            $ficha->materiales()->sync($datos);
            DB::commit();
            return $ficha->fic_id;
        } catch (\Exception $ex) {
            DB::rollback();  
            return $ex->getMessage();                
        }
    }
}

// INSERTAR SI LOS DATOS EXISTEN EN EL PIVOT
//$ficha->materiales()->updateExistingPivot($request['mat_id'][$i],[ 'fma_tipo' => $request['fma_tipo'][$i],'fma_cantidad' => $request['fma_cantidad'][$i] ]);
//$ficha->materiales()->sync([1 => [ 'fma_tipo' => 'AAA','fma_cantidad' => 'BBB' ], 2 => [ 'fma_tipo' => '333','fma_cantidad' => '333' ]]);
