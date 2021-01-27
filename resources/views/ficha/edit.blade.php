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
                        <div class="col-12">
                            <div class="form-group">
                                <label class="control-label">*FACTURAR A.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_facturara" name="fic_facturara" autocomplete="off" value="{{ $ficha->fic_facturara }}" />
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
                                <label class="control-label">*PROPIETARIO.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_propietario" disabled value="{{ $ficha->persona->nombre_completo }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_id"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group">
                                <label class="control-label">*E-MAIL.-</label>
                                <input type="email" class="form-control text-uppercase" id="fic_email" disabled value="{{ $ficha->persona->per_email }}" />
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label class="control-label">*TELEFONOS.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_telefonos" disabled value="{{ $ficha->persona->per_telefonos }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_marca">
                                <label class="control-label">*MARCA.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_marca" name="fic_marca" autocomplete="off" value="{{ $ficha->fic_marca }}" />
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_marca"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_placa">
                                <label class="control-label">*PLACA.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_placa" name="fic_placa" autocomplete="off" value="{{ $ficha->fic_placa }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_placa"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_modelo">
                                <label class="control-label">*MODELO.-</label>
                                <input type="text" class="form-control text-uppercase" id="fic_modelo" name="fic_modelo" autocomplete="off" value="{{ $ficha->fic_modelo }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_modelo"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_color">
                                <label class="control-label">*COLOR.-</label>
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
                                <label class="control-label">*N° MOTOR.-</label>
                                <input type="number" class="form-control text-uppercase" id="fic_nmotor" name="fic_nmotor" autocomplete="off" value="{{ $ficha->fic_nmotor }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_nmotor"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_anio">
                                <label class="control-label">*AÑO.-</label>
                                <input type="number" class="form-control text-uppercase" id="fic_anio" name="fic_anio" autocomplete="off" value="{{ $ficha->fic_anio }}"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_fic_anio"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group" id="cls_fic_nchasis">
                                <label class="control-label">*N° CHASIS.-</label>
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
                    <table class="table table-xs table-hover table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center"><h4><b>MATERIALES UTILIZADOS</b></h4></th>
                                <th class="text-center"><h4><b>TIPO O GRADO</b></h4></th>
                                <th class="text-center"><h4><b>CANTIDAD</b></h4></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($materiales as $mat)
                                <tr>
                                    <td>{{ $mat->mat_descripcion }}</td>
                                    <td>
                                        <input type="hidden" name="mat_id[]" value="{{ $mat->mat_id }}">
                                        <input type="text" class="form-control text-uppercase text-center" value="{{ $mat->fma_tipo }}" name="fma_tipo[]" autocomplete="off"/>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control text-uppercase text-center" value="{{ $mat->fma_cantidad }}" name="fma_cantidad[]" autocomplete="off"/>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                    <button type="submit" class="btn btn-warning btn-block btn-round btn-md pull-right"><i class="material-icons">edit</i> Modificar Datos Ficha</button>
                    <div class="clearfix"></div>
                </form>
            </div>
            <hr>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4><b>SUBIR ARCHIVOS ADJUNTOS</b></h4>
                    </div>
                </div>
                <form id="FormularioCrearArchivo" method="POST" action="{{ route('archivo.store') }}" novalidate>
                    @csrf
                    <div class="row" id="cls_archivo">
                        <div class="col-12 text-center">
                            <input type="hidden" name="identificador" value="{{ $ficha->fic_id }}">  
                            <input type="hidden" name="ficha" value="{{ $ficha->fic_ordentrabajo }}">  
                            <input type="file" multiple id="archivo" name="archivo[]" accept="image/jpeg,image/gif,image/png,application/pdf,image/x-eps">
                            <span class="material-icons form-control-feedback">clear</span>
                            <span class="invalid-feedback" role="alert" id="error_archivo"><strong></strong></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group text-center">
                                <button type="submit" id="btn_guardar_adjuntos" class="btn btn-round btn-block btn-md btn-primary pull-right text-center"><i class="material-icons">save</i> GUARDAR ARCHIVOS ADJUNTOS</button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group text-center">
                                <a href="{{ route('ficha.index') }}" class="btn btn-block btn-danger btn-round btn-md pull-right"><i class="material-icons">clear</i> Salir</a>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12">         
                        <div class="form-group" id="contenedor">
                          <table id="tabla_archivos"></table>
                          <div id="paginador_tabla_archivos"></div>                         
                      </div>                                
                    </div>
                </div>  
            </div>
            <hr>
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
                <p class="card-category text-center">COMPLETAR LA SIGUIENTE INFORMACION</p>
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
                                <label class="control-label">*RAZON SOCIAL.-</label>
                                <input type="text" class="form-control text-uppercase" id="per_razonsocial" name="per_razonsocial" autocomplete="off"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_razonsocial"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-9 informacion_persona">
                            <div class="form-group" id="cls_per_nombres">
                                <label class="control-label">*NOMBRES.-</label>
                                <input type="text" class="form-control text-uppercase" id="per_nombres" name="per_nombres" autocomplete="off"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_nombres"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row informacion_persona">
                        <div class="col-6">
                            <div class="form-group" id="cls_per_apaterno">
                                <label class="control-label">*APELLIDO PATERNO.-</label>
                                <input type="text" class="form-control text-uppercase" id="per_apaterno" name="per_apaterno" autocomplete="off"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_apaterno"><strong></strong></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group" id="cls_per_amaterno">
                                <label class="control-label">*APELLIDO MATERNO.-</label>
                                <input type="text" class="form-control text-uppercase" id="per_amaterno" name="per_amaterno" autocomplete="off"/>
                                <span class="material-icons form-control-feedback">clear</span>
                                <span class="invalid-feedback" role="alert" id="error_per_amaterno"><strong></strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="form-group">
                                <label class="control-label">*E-MAIL.-</label>
                                <input type="text" class="form-control text-uppercase" id="per_email" name="per_email" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label class="control-label">*TELEFONOS.-</label>
                                <input type="number" class="form-control text-uppercase" id="per_telefonos" name="per_telefonos" autocomplete="off"/>
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

<div class="modal fade" id="ModalVerArchivos" tabindex="-1" role="">
    <div class="modal-dialog modal-login modal-lg" role="document">
        <div class="card modal-content">
            <div class="card-header card-header-primary text-center" style="background: #383d81">
                <div class="row">
                    <div class="col-11 text-center">
                        <h4 class="card-title">VISOR DOCUMENTOS</h4>
                    </div>
                    <div class="col-1">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <i class="material-icons" style="color: #ffffff">clear</i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <iframe id="ver_archivo" style="width:100%; height:500px;" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

@section('page-js-script')
<script type="text/javascript">

    jQuery(document).ready(function($){
        CKEDITOR.replace('fic_trabajosarealizar');
        $("#btn_guardar_adjuntos").prop("disabled", true);

        var url_laravel = "{{ route('archivo.show', 'id') }}";
                url_laravel = url_laravel.replace('id', {{ $ficha->fic_id }});

        jQuery("#tabla_archivos").jqGrid({
            url: url_laravel,
            datatype: 'json', mtype: 'GET',
            height: 'auto', autowidth: true,
            toolbarfilter: true,
            forceFit:true,  
            colNames: ['#','BORRAR','ARCHIVO','NOMBRE','FECHA CREACION'],
            rowNum: 20, sortname: 'far_id', sortorder: 'asc', viewrecords: true, caption: 'LISTADO ARCHIVOS ADJUNTOS', align: "center",
            colModel: [
                {name: 'far_id', index: 'far_id', align: 'center',width: 6, hidden:true},
                {name: 'borrar', index: 'borrar', align: 'center', width: 5, sortable:false},
                {name: 'archivo', index: 'archivo', align: 'center', width: 8, sortable:false},
                {name: 'nombre', index: 'nombre', align: 'left', width: 40, sortable:false},
                {name: 'fecha', index: 'fecha', align: 'center', width: 10, sortable:false}
            ],
            pager: '#paginador_tabla_archivos',
            rowList: [20, 30, 40, 50],
            gridComplete: function () {
                var idarray = jQuery('#tabla_archivos').jqGrid('getDataIDs');
                if (idarray.length > 0) {
                var firstid = jQuery('#tabla_archivos').jqGrid('getDataIDs')[0];
                        $("#tabla_archivos").setSelection(firstid);    
                    }
            }
        });
    });

    $("#fichas").addClass("active");

    $("#fic_marca, #fic_placa, #fic_modelo, #fic_color, #fic_km, #fic_nmotor, #fic_anio, #fic_nchasis, #fic_trabajosarealizar, #fic_observaciones, #fic_nivelcombustible, #per_documento, #per_nombres, #per_apaterno, #per_amaterno, #per_razonsocial").on('focus', function () {
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

    $("#archivo").change(function() {
        $("#btn_guardar_adjuntos").prop("disabled", false);
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
                    data: {
                        busqueda:'persona'
                    },
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

    $('#FormularioCrearArchivo').submit(function(e){
        var url_laravel = "{{ route('archivo.show', 'id') }}";
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
                url_laravel = url_laravel.replace('id', data);
                alertas(4);
                jQuery("#tabla_archivos").jqGrid('setGridParam', {
                    url: url_laravel
                }).trigger('reloadGrid');
                $("#btn_guardar_adjuntos").prop("disabled", true);
                $("#archivo").val('');
            }
        });
    });

    function fn_ver_archivos(arc_id)
    {
        let url_laravel = "{{ route('ficha.show', 'id') }}";
        url_laravel = url_laravel.replace('id', arc_id);
        $('#ModalVerArchivos').modal({backdrop: 'static', keyboard: false});
        $('#ModalVerArchivos').modal('show');
        $('#ver_archivo').attr('src',url_laravel+'?archivo=ver_adjunto');
    }

    function fn_eliminar_archivo(fic_id, far_id, arc_id, arc_nombre, arc_url)
    {
        let url_destroy = "{{ route('archivo.destroy', 'id') }}";
                url_destroy = url_destroy.replace('id', far_id);
        swal({
            title: '¿QUIERE ELIMINAR ESTE ARCHIVO?',
            html: "<b>"+arc_nombre+"</b>",
            type: 'warning',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ACEPTAR',
            cancelButtonText: 'CANCELAR',
            confirmButtonClass: 'btn btn-outline-primary btn-sm',
            cancelButtonClass: 'btn btn-outline-danger btn-sm',
            showCancelButton: true,
            buttonsStyling: false,
            allowOutsideClick: false,
            allowEscapeKey:false,
            allowEnterKey:false,
            reverseButtons: true
        }).then(function(result) {
            if(result)
            {
                $.ajax({
                    url: url_destroy,
                    type: 'POST',
                    data:
                    {
                        _method: 'delete',
                        arc_id:arc_id,
                        arc_url:arc_url
                    },
                    success: function(data) 
                    {
                        let url_show = "{{ route('archivo.show', 'id') }}";
                        url_show = url_show.replace('id', fic_id);
                        alertas(4);
                        jQuery("#tabla_archivos").jqGrid('setGridParam', {
                            url: url_show
                        }).trigger('reloadGrid');
                    }
                });
            }
        });
    }

</script>

@stop
@endsection