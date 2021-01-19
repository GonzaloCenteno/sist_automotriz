@extends('layouts.app')
@section('title', 'MATERIALES') 
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-primary" style="background: #383d81">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="card-title">CREAR MATERIAL</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="FormularioCrearMaterial" method="POST" action="{{ route('material.store') }}">
                @csrf 
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group" id="cls_mat_descripcion">
                                <label class="control-label">*Descripcion.-</label>
                                <input type="text" class="form-control text-uppercase" id="mat_descripcion" name="mat_descripcion"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_mat_descripcion"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-round btn-sm pull-right"><i class="material-icons">save</i> Guardar Datos</button>
                    <a href="{{ route('material.index') }}" class="btn btn-danger btn-round btn-sm pull-right"><i class="material-icons">clear</i> Salir</a>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('page-js-script')
<script type="text/javascript">

    $("#material").addClass("active");

    $("#mat_descripcion").on('focus', function () {
        limpiarErrores($(this).attr('id'));
    });

    $('#FormularioCrearMaterial').submit(function(e){
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
                alertas(2,'material');
            }
        });
    });

</script>

@stop
@endsection