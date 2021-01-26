<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblarchivo_arc;
use App\Models\Tblfichaarchivo_far;
use App\Http\Requests\ArchivoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use File;

class ArchivoController extends Controller
{
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
        $totalg = Tblfichaarchivo_far::with('archivos')->where('fic_id',$id)->count();
        $sql = Tblfichaarchivo_far::with('archivos')->where('fic_id',$id)->orderBY($sidx,$sord)->limit($limit)->offset($start)->get();

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
        $pdf = asset('img/ico-pdf.png');
        $img = asset('img/imagen.jpg');
        foreach ($sql as $Index => $Datos) {
            $Lista->rows[$Index]['id'] = $Datos->far_id;
            $Lista->rows[$Index]['cell'] = array(
                $Datos->far_id,
                '<button class="btn btn-danger btn-sm btn-fab btn-round py-0 my-0" onClick="fn_eliminar_archivo('.$Datos->fic_id.','.$Datos->far_id.','.$Datos->archivos[0]->arc_id.',\''.$Datos->archivos[0]->arc_nombre.'\',\''.$Datos->archivos[0]->arc_url.'\')"><i class="material-icons">clear</i></button>',
                ($Datos->archivos[0]->arc_tipo == 'application/pdf') ? '<img onclick="fn_ver_archivos('.$Datos->archivos[0]->arc_id.')" src="'.$pdf.'" class="img-fluid" width="40%">' : '<img onclick="fn_ver_archivos('.$Datos->archivos[0]->arc_id.')" src="'.$img.'" class="img-fluid" width="70%">',
                $Datos->archivos[0]->arc_nombre,
                Carbon::parse($Datos->archivos[0]->created_at)->format('Y-m-d')
            );
        }
        return response()->json($Lista);
    }

    public function store(ArchivoRequest $request)
    {
        DB::beginTransaction();
        try{
            if($request->hasFile('archivo'))
            { 
                foreach($request->archivo as $file)
                {
                    $nombre = htmlentities($file->getClientOriginalName());
                    $tipo = $file->getClientMimeType();
                    $nomb_ascii = preg_replace('/\&(.)[^;]*;/', '\\1', $nombre);
                    $file->move(public_path('adjuntos/'.$request['ficha']), $nomb_ascii);

                    $Archivos               = new Tblarchivo_arc;
                    $Archivos->arc_nombre   = strtoupper($nomb_ascii);
                    $Archivos->arc_tipo     = $tipo;
                    $Archivos->arc_url      = 'adjuntos/'.$request['ficha'].'/'.$nomb_ascii;
                    $Archivos->save();

                    $Archivos->fichas()->attach($request['identificador']);
                }
            }
            DB::commit();
            return $request['identificador'];

        } catch (\Exception $ex) {
            DB::rollback();
            return $ex->getMessage(); 
        }
    }

    public function destroy(Request $request, $id)
    {
        DB::beginTransaction();
        try{
            Tblfichaarchivo_far::where('far_id',$id)->delete();
            Tblarchivo_arc::where('arc_id',$request['arc_id'])->delete();
            File::delete($request['arc_url']);

            DB::commit();
            return 1;

        } catch (\Exception $ex) {
            DB::rollback();
            return $ex->getMessage(); 
        }
    }
}
