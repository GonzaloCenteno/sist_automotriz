<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\CuentaRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CuentaController extends Controller
{
    public function index()
    {
        return view('cuenta.index', [
            'usuario' => User::where('id',Auth::user()->id)->first()
        ]);
    }

    public function update(CuentaRequest $request, $id)
    {
        $usuario = User::find($id);
        if($request['password_text'] != '')
        {
            $request['password'] = Hash::make($request['password_text']);
        }
        $usuario->update($request->all());
        return $usuario->id;
    }
}
