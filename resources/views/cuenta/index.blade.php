@extends('layouts.app')
@section('title', 'MI CUENTA') 
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-primary" style="background: #383d81">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="card-title">EDITAR PERFIL</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="FormularioEditarCuenta" method="POST" onkeydown="return event.key != 'Enter';" action="{{ route('micuenta.update', $usuario->id) }}" novalidate>
                @csrf 
                @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group" id="cls_name">
                                <label class="control-label">*Nombres y Apellidos.-</label>
                                <input type="text" class="form-control text-uppercase" id="name" name="name" value="{{ $usuario->name }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_name"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group" id="cls_email">
                                <label class="control-label">*Email.-</label>
                                <input type="text" class="form-control text-uppercase" id="email" name="email" value="{{ $usuario->email }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_email"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group" id="cls_password">
                                <label class="control-label">*Password.-</label>
                                <input type="password" class="form-control text-uppercase" id="password_text" name="password_text"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_password"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-round btn-sm pull-right"><i class="material-icons">save</i> Modificar Datos</button>
                </form>
            </div>
        </div>
    </div>
</div>
@section('page-js-script')
<script type="text/javascript">

    $("#usuarios").addClass("active");

    $("#name, #email, #rol, #password_text").on('focus', function () {
        limpiarErrores($(this).attr('id'));
    });

    $('#FormularioEditarCuenta').submit(function(e){
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
                alertas(2,'micuenta');
            }
        });
    });

</script>

@stop
@endsection