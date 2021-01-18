@extends('layouts.app')
@section('title', 'EDITAR FICHA') 
@section('content')
<div class="row" id="PaginaCabecera">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-primary" style="background: #383d81">
                <div class="row align-items-center">
                    <div class="col-3">
                        <h4 class="card-title">MODIFICAR FICHA</h4>
                    </div>
                    <div class="col-5">
                        <h6 class="mb-0">| HECHO POR: {{ $ficha->usuario->name }} |</h6>
                    </div>
                    <div class="col-4">
                        <h6 class="mb-0">| FECHA Y HORA: {{ $ficha->created_at }} |</h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form id="FormularioModificarRegistro" method="POST" onkeydown="return event.key != 'Enter';" action="{{ route('registro.update', $ficha->fic_id) }}" novalidate>
                @csrf
                @method('PUT')
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group" id="cls_fic_facturara">
                                <label class="control-label">*Facturar a.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_facturara" name="fic_facturara" autocomplete="off" value="{{ $ficha->fic_facturara }}" />
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_facturara"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <a type="button" href="{{ route('download',$ficha->fic_id) }}" class="btn btn-danger btn-round text-white btn-md pull-right {{ ($ficha->fic_adjunto == null) ? 'disabled' : '' }}"><i class="material-icons">download</i> Descargar</a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div id="cls_fic_adjunto">
                                <label class="bmd-label-floating">*Adjunto.-</label>
                                <input type="file" id="fic_adjunto" name="fic_adjunto"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_adjunto"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group" id="cls_fic_documento">
                                <label class="control-label">*DNI/RUC.-</label>
                                <input type="number" class="form-control text-uppercase" id="fic_documento" name="fic_documento" autocomplete="off" value="{{ $ficha->persona->per_documento }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_documento"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="form-group" id="cls_per_id">
                                <input type="hidden" id="per_id" name="per_id" value="{{ $ficha->persona->per_id }}">
                                <label class="control-label">*Propietario.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_propietario" disabled value="{{ $ficha->persona->nombre_completo }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_id"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group">
                                <label class="control-label">*E-mail.-</label>
                                <input type="email" class="form-control text-uppercase" id="fic_email" disabled value="{{ $ficha->persona->per_email }}" />
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label class="control-label">*Telefonos.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_telefonos" disabled value="{{ $ficha->persona->per_telefonos }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_marca">
                                <label class="control-label">*Marca.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_marca" name="fic_marca" autocomplete="off" value="{{ $ficha->fic_marca }}" />
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_marca"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_placa">
                                <label class="control-label">*Placa.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_placa" name="fic_placa" autocomplete="off" value="{{ $ficha->fic_placa }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_placa"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_modelo">
                                <label class="control-label">*Modelo.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_modelo" name="fic_modelo" autocomplete="off" value="{{ $ficha->fic_modelo }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_modelo"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_color">
                                <label class="control-label">*Color.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_color" name="fic_color" autocomplete="off" value="{{ $ficha->fic_color }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_color"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_km">
                                <label class="control-label">*KM.-</label>
                                <input type="number" class="form-control text-uppercase" id="fic_km" name="fic_km" autocomplete="off" value="{{ $ficha->fic_km }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_km"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_nmotor">
                                <label class="control-label">*N° Motor.-</label>
                                <input type="number" class="form-control text-uppercase" id="fic_nmotor" name="fic_nmotor" autocomplete="off" value="{{ $ficha->fic_nmotor }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_nmotor"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_anio">
                                <label class="control-label">*Año.-</label>
                                <input type="number" class="form-control text-uppercase" id="fic_anio" name="fic_anio" autocomplete="off" value="{{ $ficha->fic_anio }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_anio"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_nchasis">
                                <label class="control-label">*N° Chasis.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_nchasis" name="fic_nchasis" autocomplete="off" value="{{ $ficha->fic_nchasis }}"/>
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
                                <textarea id="fic_trabajosarealizar">{!! $ficha->fic_trabajosarealizar !!}</textarea>
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
                                    <input class="form-check-input btn_checkbox" type="checkbox" id="inlineCheckbox{{ $ive->ive_id }}" name="fic_inventariovehiculo[]" value="{{ $ive->ive_id }}" {{ ($ive->valor == 1) ? 'checked' : '' }} > {{ $ive->ive_descripcion }}
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
                                <label class="control-label">*Observaciones.-</label>
                                <textarea rows="6" aria-describedby="fic_observaciones" class="form-control text-uppercase" id="fic_observaciones" name="fic_observaciones">{{ $ficha->fic_observaciones }}</textarea>
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
                    <div class="row pl-lg-5" id="cls_fic_nivelcombustible">
                        <div class="col-3 col-lg-1 offset-lg-2">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input btn_radio" type="radio" id="exampleRadios1" name="fic_nivelcombustible" value="1/8" {{ $ficha->fic_nivelcombustible == '1/8' ? 'checked' : '' }}>1/8 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 col-lg-1">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input btn_radio" type="radio" id="exampleRadios2" name="fic_nivelcombustible" value="1/4" {{ $ficha->fic_nivelcombustible == '1/4' ? 'checked' : ''  }}>1/4 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 col-lg-1">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input btn_radio" type="radio" id="exampleRadios3" name="fic_nivelcombustible" value="3/8" {{ $ficha->fic_nivelcombustible == '3/8' ? 'checked' : ''  }}>3/8 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 col-lg-1">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input btn_radio" type="radio" id="exampleRadios4" name="fic_nivelcombustible" value="1/2" {{ $ficha->fic_nivelcombustible == '1/2' ? 'checked' : ''  }}>1/2 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 col-lg-1">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input btn_radio" type="radio" id="exampleRadios5" name="fic_nivelcombustible" value="5/8" {{ $ficha->fic_nivelcombustible == '5/8' ? 'checked' : ''  }}>5/8 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 col-lg-1">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input btn_radio" type="radio" id="exampleRadios6" name="fic_nivelcombustible" value="3/4" {{ $ficha->fic_nivelcombustible == '3/4' ? 'checked' : ''  }}>3/4 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-3 col-lg-1">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label">
                                    <input class="form-check-input btn_radio" type="radio" id="exampleRadios7" name="fic_nivelcombustible" value="7/8" {{ $ficha->fic_nivelcombustible == '7/8' ? 'checked' : ''  }}>7/8 
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <span class="material-icons form-control-feedback">clear</span>
                        <span class="invalid-feedback text-center" role="alert" id="error_fic_nivelcombustible"><strong></strong></span>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-warning btn-round btn-md pull-right"><i class="material-icons">edit</i> Modificar Datos</button>
                    <a href="{{ route('ficha.index') }}" class="btn btn-danger btn-round btn-md pull-right"><i class="material-icons">clear</i> Salir</a>
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
                        <button type="button" onclick="resetarCampos()" class="close" data-dismiss="modal" aria-hidden="true">
                          <i class="material-icons" style="color: #ffffff">clear</i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p class="card-category text-center">Completar la Siguiente Informacion</p>
                <form id="FormularioCrearPersona" method="POST" action="{{ route('persona.store') }}" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group" id="cls_per_documento">
                                <label class="control-label" id="tipo_documento"></label>
                                <input type="number" class="form-control text-uppercase" id="per_documento" name="per_documento" autocomplete="off"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_documento"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-9 informacion_empresa">
                            <div class="form-group" id="cls_per_razonsocial">
                                <label class="control-label">*Razon Social.-</label>
                                <input type="text" class="form-control text-uppercase" id="per_razonsocial" name="per_razonsocial" autocomplete="off"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_razonsocial"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-9 informacion_persona">
                            <div class="form-group" id="cls_per_nombres">
                                <label class="control-label">*Nombres.-</label>
                                <input type="text" class="form-control text-uppercase" id="per_nombres" name="per_nombres" autocomplete="off"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_nombres"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row informacion_persona">
                        <div class="col-6">
                            <div class="form-group" id="cls_per_apaterno">
                                <label class="control-label">*Apellido Paterno.-</label>
                                <input type="text" class="form-control text-uppercase" id="per_apaterno" name="per_apaterno" autocomplete="off"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_apaterno"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group" id="cls_per_amaterno">
                                <label class="control-label">*Apellido Materno.-</label>
                                <input type="text" class="form-control text-uppercase" id="per_amaterno" name="per_amaterno" autocomplete="off"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_amaterno"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group" id="cls_per_email">
                                <label class="control-label">*E-mail.-</label>
                                <input type="text" class="form-control text-uppercase" id="per_email" name="per_email" autocomplete="off"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_email"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group" id="cls_per_telefonos">
                                <label class="control-label">*Telefonos.-</label>
                                <input type="number" class="form-control text-uppercase" id="per_telefonos" name="per_telefonos" autocomplete="off"/>
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

    $("#fichas").addClass("active");

    $("#fic_facturara, #fic_marca, #fic_placa, #fic_modelo, #fic_color, #fic_km, #fic_nmotor, #fic_anio, #fic_nchasis, #fic_trabajosarealizar, #fic_observaciones, #fic_nivelcombustible, #per_documento, #per_nombres, #per_apaterno, #per_amaterno, #per_email, #per_telefonos, #per_razonsocial").on('focus', function () {
        limpiarErrores($(this).attr('id')); 
    });

    $("#per_id").on('change', function() {
        limpiarErrores($(this).attr('id')); 
    });

    $('.btn_radio').change(function(){
        $("#error_fic_nivelcombustible").hide();
        $("#error_fic_nivelcombustible").text('');
        $("#cls_fic_nivelcombustible").removeClass('has-danger');
    });

    $('#FormularioModificarRegistro').submit(function(e){
        e.preventDefault();
        var FormularioRegistro = new FormData($(this)[0]);
        FormularioRegistro.append('fic_trabajosarealizar', CKEDITOR.instances.fic_trabajosarealizar.getData());

        for ( instance in CKEDITOR.instances )
            CKEDITOR.instances[instance].updateElement();
        
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            dataType: 'json',
            data: FormularioRegistro,
            processData: false,
            contentType: false,
            success: function (data) 
            {
                alertas(2,'ficha');
            }
        });
    });

    $("#fic_documento").on( "keydown", function(event) {
        var documento = $(this);
        if (documento.val().length >= 8)
        {
            if (event.which == 13 && !event.shiftKey) {
                event.preventDefault();
                let url = "{{ route('persona.show', 'dni') }}";
                    url = url.replace('dni', documento.val());
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) 
                    {
                        if(data)
                        {
                            $("#per_id").val(data.per_id).trigger("change");
                            $("#fic_propietario").val(data.nombre_completo);
                            $("#fic_email").val(data.per_email);
                            $("#fic_telefonos").val(data.per_telefonos);
                            $("#fic_documento").focus();
                        }
                        else
                        {
                            if(documento.val().length == 8 || documento.val().length == 11)
                            {
                                $('#ModalPersona').modal({backdrop: 'static', keyboard: false});
                                $('#ModalPersona').modal('show');
                            }
                        }
                        swal.close();
                    }
                });
            }
        }
    });

    $('#ModalPersona').on('shown.bs.modal', function () {
        $('#per_documento').val($("#fic_documento").val());
        if($("#fic_documento").val().length == 8)
        {
            $("#tipo_documento").text("*DNI.-");
            $('#per_nombres').focus();
            $(".informacion_persona").show();
            $(".informacion_empresa").hide();
        }
        else
        {
            $("#tipo_documento").text("*RUC.-");
            $('#per_razonsocial').focus();
            $(".informacion_persona").hide();
            $(".informacion_empresa").show();
        }
        limpiarFormularioPersona();
    });

    $('#FormularioCrearPersona').submit(function(e){
        e.preventDefault();
        var FormularioRegistro = new FormData($(this)[0]);
        FormularioRegistro.append('count', $("#fic_documento").val().length);
        FormularioRegistro.append('per_tipodocumento', ($("#fic_documento").val().length == 8) ? 'DNI' : 'RUC');

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
                $('#ModalPersona').modal('hide');
                $("#per_documento").val('');
                limpiarFormularioPersona();
                $("#per_id").val(data.per_id);
                $("#fic_propietario").val(data.per_nombres);
                $("#fic_email").val(data.per_email);
                $("#fic_telefonos").val(data.per_telefonos);
                $("#fic_marca").focus();
            }
        });
    });

    $("#fic_documento").keyup(function(){
        if ($(this).val().length == 0) 
        {
            resetarCampos();
        }
    });

    $("#fic_documento").on("click", function () {
       $(this).select();
    });

    function resetarCampos()
    {
        $("#per_id").val('');
        $("#fic_propietario").val('');
        $("#fic_email").val('');
        $("#fic_telefonos").val('');
    }

    function limpiarFormularioPersona()
    {
        $("#per_razonsocial").val('');
        $("#per_nombres").val('');
        $("#per_amaterno").val('');
        $("#per_apaterno").val('');
        $("#per_email").val('');
        $("#per_telefonos").val('');
    }

    function descargar_archivo(fic_id)
    {
        window.open('/ficha/'+fic_id+'?donwload=adjunto');
    }

</script>

@stop
@endsection