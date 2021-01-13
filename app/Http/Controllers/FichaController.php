<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tblficha_fic;
use Carbon\Carbon;
use App\Models\Tblpersona_per;
use App\Models\Tblempresa_emp;
use App\Models\Tblinventariovehiculo_ive;
use Illuminate\Support\Facades\Auth;

class FichaController extends Controller
{
    public function index()
    {
        return view('ficha.index');
    }

    public function show(Request $request,$id)
    {
        if ($id > 0) 
        {
            if($request['reporte'] == 'ficha')
            {
                return $this->imprimir_reporte_ficha($request, $id);
            }   
        }
        else
        {
            if($request['busqueda'] == 'propietarios' )
            {
                return $this->buscar_datos_propietarios($request);
            }
            if($request['busqueda'] == 'placas' )
            {
                return $this->buscar_datos_placas($request);
            }
            if($request['grid'] == 'fichas')
            {
                return $this->cargar_tabla_fichas($request);
            }
        }
    }

    public function cargar_tabla_fichas(Request $request)
    {
        $page = $request['page'];
        $limit = $request['rows'];
        $sidx = $request['sidx'];
        $sord = $request['sord'];
        $start = ($limit * $page) - $limit; 
        if ($start < 0) {
            $start = 0;
        }

        if($request['propietario'] != 0 && $request['placa'] == '0' && $request['fecha_inicio'] == '0' && $request['fecha_fin'] == '0')
        {
            $totalg = Tblficha_fic::where('per_id',$request['propietario'])->count();
            $sql = Tblficha_fic::where('per_id',$request['propietario'])->orderBY($sidx,$sord)->limit($limit)->offset($start)->get();
        }
        else if($request['propietario'] == 0 && $request['placa'] != '0' && $request['fecha_inicio'] == '0' && $request['fecha_fin'] == '0')
        {
            $totalg = Tblficha_fic::where('fic_placa',$request['placa'])->count();
            $sql = Tblficha_fic::where('fic_placa',$request['placa'])->orderBY($sidx,$sord)->limit($limit)->offset($start)->get();
        }
        else if($request['propietario'] != 0 && $request['placa'] != '0' && $request['fecha_inicio'] == '0' && $request['fecha_fin'] == '0')
        {
            $totalg = Tblficha_fic::where([['per_id',$request['propietario']],['fic_placa',$request['placa']]])->count();
            $sql = Tblficha_fic::where([['per_id',$request['propietario']],['fic_placa',$request['placa']]])->orderBY($sidx,$sord)->limit($limit)->offset($start)->get();
        }
        else if($request['propietario'] != 0 && $request['placa'] != '0' && $request['fecha_inicio'] != '0' && $request['fecha_fin'] != '0')
        {
            $totalg = Tblficha_fic::where([['per_id',$request['propietario']],['fic_placa',$request['placa']]])->whereBetween('fic_fecha', [$request['fecha_inicio'], $request['fecha_fin']])->count();
            $sql = Tblficha_fic::where([['per_id',$request['propietario']],['fic_placa',$request['placa']]])->whereBetween('fic_fecha', [$request['fecha_inicio'], $request['fecha_fin']])->orderBY($sidx,$sord)->limit($limit)->offset($start)->get();
        }
        else if($request['propietario'] == 0 && $request['placa'] == '0' && $request['fecha_inicio'] != '0' && $request['fecha_fin'] != '0')
        {
            $totalg = Tblficha_fic::whereBetween('fic_fecha', [$request['fecha_inicio'], $request['fecha_fin']])->count();
            $sql = Tblficha_fic::whereBetween('fic_fecha', [$request['fecha_inicio'], $request['fecha_fin']])->orderBY($sidx,$sord)->limit($limit)->offset($start)->get();
        }
        else if($request['propietario'] != 0 && $request['placa'] == '0' && $request['fecha_inicio'] != '0' && $request['fecha_fin'] != '0')
        {
            $totalg = Tblficha_fic::where('per_id',$request['propietario'])->whereBetween('fic_fecha', [$request['fecha_inicio'], $request['fecha_fin']])->count();
            $sql = Tblficha_fic::where('per_id',$request['propietario'])->whereBetween('fic_fecha', [$request['fecha_inicio'], $request['fecha_fin']])->orderBY($sidx,$sord)->limit($limit)->offset($start)->get();
        }
        else if($request['propietario'] == 0 && $request['placa'] != '0' && $request['fecha_inicio'] != '0' && $request['fecha_fin'] != '0')
        {
            $totalg = Tblficha_fic::where('fic_placa',$request['placa'])->whereBetween('fic_fecha', [$request['fecha_inicio'], $request['fecha_fin']])->count();
            $sql = Tblficha_fic::where('fic_placa',$request['placa'])->whereBetween('fic_fecha', [$request['fecha_inicio'], $request['fecha_fin']])->orderBY($sidx,$sord)->limit($limit)->offset($start)->get();
        }
        else
        {
            $totalg = Tblficha_fic::count();
            $sql = Tblficha_fic::orderBY($sidx,$sord)->limit($limit)->offset($start)->get();
        }
        
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
            $Lista->rows[$Index]['id'] = $Datos->fic_id;
            $Lista->rows[$Index]['cell'] = array(
                $Datos->fic_id,
                '<button class="btn btn-default btn-sm btn-fab btn-round py-0 my-0" onClick="fn_imprimir('.$Datos->fic_id.')"><i class="material-icons">print</i></button>',
                $Datos->fic_facturara,
                $Datos->persona->NombreCompleto,
                Carbon::parse($Datos->fic_fecha)->format('Y-m-d'),
                $Datos->fic_marca,
                $Datos->fic_placa,
                $Datos->fic_modelo
            );
        }
        return response()->json($Lista); 
    }

    public function buscar_datos_propietarios(Request $request)
    {
        $nombre = preg_replace('/\s+/', ' ', strtoupper($request['nombre']));

        $consulta="";$iniciador=0;
        $descripcion = explode(" ", $nombre);
        foreach($descripcion as $desc)
        {
            if($iniciador==1)
            {
                $consulta.=" AND ";
            }
            if($desc!="")
            {
                $consulta.="concat_ws(' ',UPPER(per_nombres),UPPER(per_apaterno),UPPER(per_amaterno),per_dni) like '%$desc%'";
            }
            if($iniciador==0)
            {
                $iniciador=1;
            }
        }

        $Consulta = Tblpersona_per::whereRaw($consulta)->get();        
        $todo = array();
        foreach ($Consulta as $Datos) {
            $Lista = new \stdClass();
            $Lista->per_id = $Datos->per_id;
            $Lista->propietario = trim($Datos->per_dni.' - '.$Datos->per_nombres.' '.$Datos->per_apaterno.' '.$Datos->per_amaterno);
            array_push($todo, $Lista);
        }
        return response()->json($todo);
    }

    public function buscar_datos_placas(Request $request)
    {
        $data = strtoupper($request['placa']);
        $Consulta = DB::select("select `fic_placa` from `tblficha_fic` where `fic_placa` like '%$data%' group by `fic_placa`");       
        $todo = array();
        foreach ($Consulta as $Datos) {
            $Lista = new \stdClass();
            $Lista->fic_placa = $Datos->fic_placa;
            array_push($todo, $Lista);
        }
        return response()->json($todo);
    }

    public function imprimir_reporte_ficha(Request $request, $id)
    {
        if(Auth::user()->rol == 'TECNICO')
        {
            return redirect('/registro');
        }

        $sql = Tblficha_fic::where('fic_id',$id)->first();
        $empresa = Tblempresa_emp::first();
        $data = DB::select("SELECT ive_descripcion FROM tblinventariovehiculo_ive where ive_id in (".$sql->fic_inventariovehiculo.")");
        foreach ($data as $arr){ 
            $arr_final[] = $arr->ive_descripcion;
        }
        $inventario = implode( ' - ', $arr_final);
        if ($sql->count() > 0) 
        {
            $view = \View::make('reportes.vw_ficha',compact('sql','empresa','inventario'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view)->setPaper('a4');
            return $pdf->stream("FICHA-".$id.".pdf");
        }
        else
        {
            return "NO SE ENCONTRARON DATOS";
        }
    }

}
