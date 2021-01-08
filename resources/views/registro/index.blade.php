@extends('layouts.app')
@section('title', 'REGISTRO FICHA') 
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-primary" style="background: #383d81">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="card-title">CREAR FICHA</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="FormularioCrearRegistro" method="POST" onkeydown="return event.key != 'Enter';" action="{{ route('registro.store') }}" novalidate>
                @csrf 
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group" id="cls_fic_facturara">
                                <label class="bmd-label-floating">*Facturar a.-</label>
                                <input type="text" aria-describedby="fic_facturara" class="form-control" id="fic_facturara" name="fic_facturara" autofocus autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_facturara"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group" id="cls_fic_dni">
                                <label class="bmd-label-floating">*DNI.-</label>
                                <input type="number" aria-describedby="fic_dni" class="form-control" id="fic_dni" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_dni"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group" id="cls_per_id">
                                <input type="hidden" id="per_id" name="per_id">
                                <label class="bmd-label-floating">*Propietario.-</label>
                                <input type="text" aria-describedby="fic_propietario" class="form-control" id="fic_propietario" disabled>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_id"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">*Direccion.-</label>
                                <input type="text" aria-describedby="fic_direccion" class="form-control" id="fic_direccion" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">*E-mail.-</label>
                                <input type="email" aria-describedby="fic_email" class="form-control" id="fic_email" disabled>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">*Telefonos.-</label>
                                <input type="text" aria-describedby="fic_telefonos" class="form-control" id="fic_telefonos" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_marca">
                                <label class="bmd-label-floating">*Marca.-</label>
                                <input type="text" aria-describedby="fic_marca" class="form-control" id="fic_marca" name="fic_marca" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_marca"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_placa">
                                <label class="bmd-label-floating">*Placa.-</label>
                                <input type="text" aria-describedby="fic_placa" class="form-control" id="fic_placa" name="fic_placa" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_placa"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_modelo">
                                <label class="bmd-label-floating">*Modelo.-</label>
                                <input type="text" aria-describedby="fic_modelo" class="form-control" id="fic_modelo" name="fic_modelo" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_modelo"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_color">
                                <label class="bmd-label-floating">*Color.-</label>
                                <input type="text" aria-describedby="fic_color" class="form-control" id="fic_color" name="fic_color" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_color"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_km">
                                <label class="bmd-label-floating">*KM.-</label>
                                <input type="text" aria-describedby="fic_km" class="form-control" id="fic_km" name="fic_km" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_km"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_nmotor">
                                <label class="bmd-label-floating">*N° Motor.-</label>
                                <input type="text" aria-describedby="fic_nmotor" class="form-control" id="fic_nmotor" name="fic_nmotor" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_nmotor"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_anio">
                                <label class="bmd-label-floating">*Año.-</label>
                                <input type="text" aria-describedby="fic_anio" class="form-control" id="fic_anio" name="fic_anio" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_anio"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_nchasis">
                                <label class="bmd-label-floating">*N° Chasis.-</label>
                                <input type="text" aria-describedby="fic_nchasis" class="form-control" id="fic_nchasis" name="fic_nchasis" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_nchasis"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-md-12 text-center">
                            <h4><b>TRABAJOS A REALIZAR</b></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="form-group" id="cls_fic_trabajosarealizar">
                                <textarea id="fic_trabajosarealizar"></textarea>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_trabajosarealizar"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4><b>INVENTARIO DE VEHICULO</b></h4>
                        </div>
                    </div>
                    <div class="row pl-lg-5">
                        @foreach($inventario as $ive)
                        <div class="col-4 col-lg-3">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox{{ $ive->ive_id }}" name="fic_inventariovehiculo[]" value="{{ $ive->ive_id }}"> {{ $ive->ive_descripcion }}
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" id="cls_fic_observaciones">
                                <label class="bmd-label-floating">*Observaciones.-</label>
                                <textarea rows="6" aria-describedby="fic_observaciones" class="form-control" id="fic_observaciones" name="fic_observaciones"></textarea>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_observaciones"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h4><b>NIVEL DE COMBUSTIBLE</b></h4>
                        </div>
                    </div>
                    <div class="row pl-lg-5">
                        <div class="col-3 col-lg-1 offset-lg-2">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" id="exampleRadios1" name="fic_nivelcombustible" value="1/8">1/8 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 col-lg-1">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" id="exampleRadios2" name="fic_nivelcombustible" value="1/4">1/4 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 col-lg-1">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" id="exampleRadios3" name="fic_nivelcombustible" value="3/8">3/8 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 col-lg-1">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" id="exampleRadios4" name="fic_nivelcombustible" value="1/2">1/2 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 col-lg-1">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" id="exampleRadios5" name="fic_nivelcombustible" value="5/8">5/8 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 col-lg-1">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" id="exampleRadios6" name="fic_nivelcombustible" value="3/4">3/4 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 col-lg-1">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" id="exampleRadios7" name="fic_nivelcombustible" value="7/8">7/8 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-warning btn-round btn-md pull-right"><i class="material-icons">save</i> Guardar Datos</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalPersona" tabindex="-1" role="">
    <div class="modal-dialog modal-login modal-lg" role="document">
        <div class="card modal-content">
            <div class="card-header card-header-primary text-center" style="background: #383d81">
                <div class="row">
                    <div class="col-11 text-center">
                        <h4 class="card-title">INFORMACION PROPIETARIO</h4>
                    </div>
                    <div class="col-1">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <i class="material-icons" style="color: #ffffff">clear</i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="card-category text-center">Completar la Siguiente Informacion</p>
                <form id="FormularioCrearPersona" method="POST" onkeydown="return event.key != 'Enter';" action="{{ route('persona.store') }}" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group" id="cls_per_dni">
                                <label class="bmd-label-floating">*DNI.-</label>
                                <input type="number" aria-describedby="per_dni" class="form-control" id="per_dni" name="per_dni" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_dni"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="form-group" id="cls_per_nombres">
                                <label class="bmd-label-floating">*Nombres.-</label>
                                <input type="text" aria-describedby="per_nombres" class="form-control" id="per_nombres" name="per_nombres" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_nombres"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group" id="cls_per_apaterno">
                                <label class="bmd-label-floating">*Apellido Paterno.-</label>
                                <input type="text" aria-describedby="per_apaterno" class="form-control" id="per_apaterno" name="per_apaterno" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_apaterno"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group" id="cls_per_amaterno">
                                <label class="bmd-label-floating">*Apellido Materno.-</label>
                                <input type="text" aria-describedby="per_amaterno" class="form-control" id="per_amaterno" name="per_amaterno" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_amaterno"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group" id="cls_per_email">
                                <label class="bmd-label-floating">*E-mail.-</label>
                                <input type="text" aria-describedby="per_email" class="form-control" id="per_email" name="per_email" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_email"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group" id="cls_per_direccion">
                                <label class="bmd-label-floating">*Direccion.-</label>
                                <input type="text" aria-describedby="per_direccion" class="form-control" id="per_direccion" name="per_direccion" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_direccion"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group" id="cls_per_telefonos">
                                <label class="bmd-label-floating">*Telefonos.-</label>
                                <input type="text" aria-describedby="per_telefonos" class="form-control" id="per_telefonos" name="per_telefonos" autocomplete="off">
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_telefonos"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-round btn-md btn-primary pull-right text-center">GUARDAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('page-js-script')
<script type="text/javascript">

    jQuery(document).ready(function($){
        CKEDITOR.replace('fic_trabajosarealizar');
    });

    $("#registro").addClass("active");

    $("#fic_facturara, #per_id, #fic_marca, #fic_placa, #fic_modelo, #fic_color, #fic_km, #fic_nmotor, #fic_anio, #fic_nchasis, #fic_trabajosarealizar, #fic_inventariovehiculo, #fic_observaciones, #fic_nivelcombustible, #per_dni, #per_nombres, #per_apaterno, #per_amaterno, #per_email, #per_direccion, #per_telefonos").on('change keyup', function () {
        limpiarErrores($(this).attr('id')); 
    });

    $('#FormularioCrearRegistro').submit(function(e){
        e.preventDefault();
        var FormularioRegistro = new FormData($(this)[0]);
        FormularioRegistro.append('fic_trabajosarealizar', CKEDITOR.instances.fic_trabajosarealizar.getData());
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            dataType: 'json',
            data: FormularioRegistro,
            processData: false,
            contentType: false,
            success: function (data) 
            {
                alertas(4);
            }
        });
    });

    $("#fic_dni").on( "keydown", function(event) {
        if ($(this).val().length >= 8)
        {
            if (event.which == 13 && !event.shiftKey) {
                event.preventDefault();
                let url = "{{ route('persona.show', 'dni') }}";
                    url = url.replace('dni', $(this).val());
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) 
                    {
                        if(data)
                        {
                            $("#per_id").val(data.per_id);
                            $("#fic_propietario").val(data.per_nombres);
                            $("#fic_direccion").val(data.per_direccion);
                            $("#fic_email").val(data.per_email);
                            $("#fic_telefonos").val(data.per_telefonos);
                            $("#fic_dni").focus();
                        }
                        else
                        {
                            $('#ModalPersona').modal({backdrop: 'static', keyboard: false});
                            $('#ModalPersona').modal('show');
                        }
                        swal.close();
                    }
                });
            }
        }
    });

    $('#ModalPersona').on('shown.bs.modal', function () {
        $('#per_nombres').focus();
        $('#per_dni').val($("#fic_dni").val());
        limpiarFormularioPersona();
    });

    $('#FormularioCrearPersona').submit(function(e){
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
                alertas(4);
                $('#ModalPersona').modal('hide');
                $("#per_dni").val('');
                limpiarFormularioPersona();
                $("#per_id").val(data.per_id);
                $("#fic_propietario").val(data.per_nombres);
                $("#fic_direccion").val(data.per_direccion);
                $("#fic_email").val(data.per_email);
                $("#fic_telefonos").val(data.per_telefonos);
                $("#fic_dni").focus();
            }
        });
    });

    function limpiarFormularioPersona()
    {
        $("#per_nombres").val('');
        $("#per_amaterno").val('');
        $("#per_apaterno").val('');
        $("#per_email").val('');
        $("#per_direccion").val('');
        $("#per_telefonos").val('');
    }

</script>

@stop
@endsection