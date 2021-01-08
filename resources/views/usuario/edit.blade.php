@extends('layouts.app')
@section('title', 'ADMINISTRACION USUARIOS') 
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-primary" style="background: #383d81">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="card-title">EDITAR USUARIO</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="FormularioEditarUsuario" method="POST" onkeydown="return event.key != 'Enter';" action="{{ route('usuario.update', $usuario->id) }}" novalidate>
                @csrf 
                @method('PUT')
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group" id="cls_name">
                                <label class="bmd-label-floating">*Nombres y Apellidos.-</label>
                                <input type="text" aria-describedby="name" class="form-control" id="name" name="name" value="{{ $usuario->name }}">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_name"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group" id="cls_rol">
                                <select id="rol" name="rol" class="form-control" aria-describedby="rol">
                                    <option value="0">*Seleccionar Rol.-</option>
                                    <option value="ADM" {{ 'ADMINISTRADOR' == $usuario->rol ? 'selected' : '' }}>ADMINISTRADOR</option>  
                                    <option value="TEC" {{ 'TECNICO' == $usuario->rol ? 'selected' : '' }}>TECNICO</option>
                                </select>  
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_rol"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group" id="cls_email">
                                <label class="bmd-label-floating">*Email.-</label>
                                <input type="email" aria-describedby="email" class="form-control" id="email" name="email" value="{{ $usuario->email }}">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_email"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group" id="cls_password_text">
                                <label class="bmd-label-floating">*Password.-</label>
                                <input type="password" aria-describedby="password_text" class="form-control" id="password_text" name="password_text">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_password_text"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-round btn-sm pull-right"><i class="material-icons">save</i> Modificar Datos</button>
                    <a href="{{ route('usuario.index') }}" class="btn btn-danger btn-round btn-sm pull-right"><i class="material-icons">clear</i> Salir</a>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('page-js-script')
<script type="text/javascript">

    $("#usuarios").addClass("active");

    $("#name, #email, #rol, #password_text").on('change keyup', function () {
        limpiarErrores($(this).attr('id'));
        $(this).attr('id').blur(); 
    });

    $('#FormularioEditarUsuario').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            dataType: 'json',
            data: new FormData($(this)[0]),
            processData: false,
            contentType: false,
            success: function (data) 
            {
                alertas(2,'usuario');
            }
        });
    });

</script>

@stop
@endsection