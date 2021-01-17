<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tblficha_fic;
use App\Models\Tblinventariovehiculo_ive;
use App\Http\Requests\FichaRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function index()
    {
        return view('registro.index', [
            'inventario' => Tblinventariovehiculo_ive::orderBy('ive_id','asc')->get()
        ]);
    }

    public function store(FichaRequest $request)
    {
        if(!$request->ajax()) return redirect('/');
        $request['user_id'] = Auth::user()->id;
        $request['fic_fecha'] = date('Y-m-d');
        $request['fic_inventariovehiculo'] = ($request['fic_inventariovehiculo'] == null || $request['fic_inventariovehiculo'] == '')  ? '' : implode(",", $request['fic_inventariovehiculo']);
        $ficha = Tblficha_fic::create($request->all());
        return $ficha->fic_id;
    }

    public function update(FichaRequest $request, $fic_id)
    {
        if(!$request->ajax()) return redirect('/');
        $inventario = Tblficha_fic::find($fic_id);
        $request['fic_inventariovehiculo'] = ($request['fic_inventariovehiculo'] == null || $request['fic_inventariovehiculo'] == '')  ? '' : implode(",", $request['fic_inventariovehiculo']);
        $inventario->update($request->all());
        return $inventario->fic_id;
    }
}
