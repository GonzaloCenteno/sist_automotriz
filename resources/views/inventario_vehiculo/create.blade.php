@extends('layouts.app')
@section('title', 'INVENTARIO VEHICULO') 
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-primary" style="background: #383d81">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="card-title">CREAR INVENTARIO</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="FormularioCrearInventario" method="POST" onkeydown="return event.key != 'Enter';" action="{{ route('inventario_vehiculo.store') }}">
                @csrf 
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group" id="cls_ive_descripcion">
                                <label class="control-label">*Descripcion.-</label>
                                <input type="text" class="form-control text-uppercase" id="ive_descripcion" name="ive_descripcion"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_ive_descripcion"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-round btn-sm pull-right"><i class="material-icons">save</i> Guardar Datos</button>
                    <a href="{{ route('inventario_vehiculo.index') }}" class="btn btn-danger btn-round btn-sm pull-right"><i class="material-icons">clear</i> Salir</a>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('page-js-script')
<script type="text/javascript">

    $("#inventario_vehiculo").addClass("active");

    $("#ive_descripcion").on('focus', function () {
        limpiarErrores($(this).attr('id'));
    });

    $('#FormularioCrearInventario').submit(function(e){
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
                alertas(2,'inventario_vehiculo');
            }
        });
    });

</script>

@stop
@endsection