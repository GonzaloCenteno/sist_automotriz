<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuario.index');
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(UsuarioRequest $request)
    {
        if(!$request->ajax()) return redirect('/');
        $request['password'] = Hash::make($request['password']);
        $usuario = User::create($request->all());
        return $usuario->id;
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

        if($request['estados'] != '0')
        {
            $totalg = User::count();
            $sql = User::orderBY($sidx,$sord)->limit($limit)->offset($start)->get();
        }
        else
        {
            $totalg = User::onlyTrashed()->count();
            $sql = User::orderBY($sidx,$sord)->limit($limit)->offset($start)->onlyTrashed()->get();
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
            $Lista->rows[$Index]['id'] = $Datos->id;
            $Lista->rows[$Index]['cell'] = array(
                $Datos->id,
                $Datos->name,
                $Datos->email,
                $Datos->rol,
                Carbon::parse($Datos->created_at)->format('Y-m-d'),
                ($Datos->deleted_at == '') ? 
                    '<button type="button" onclick="cambiar_estado('.$Datos->id.',\''.$Datos->name.'\',0)" class="btn btn-success btn-xs btn-block">ACTIVO</button>' : 
                    '<button type="button" onclick="cambiar_estado('.$Datos->id.',\''.$Datos->name.'\',1)" class="btn btn-warning btn-xs btn-block">ACTIVAR</button>',
            );
        }
        return response()->json($Lista);
    }

    public function edit($id)
    {
    	return view('usuario.edit', [
            'usuario' => User::where('id',$id)->first()
        ]);
    }

    public function update(UsuarioRequest $request, $id)
    {
        $usuario = User::find($id);
        if($request['password_text'] != '')
        {
            $request['password'] = Hash::make($request['password_text']);
        }
        $usuario->update($request->all());
        return $usuario->id;
    }

    public function destroy(Request $request)
    {
        if($request['tipo'] == 1)
        {
            return User::where('id',$request['id'])->restore();
        }
        else
        {
            return User::where('id',$request['id'])->delete();
        }
    }
}
