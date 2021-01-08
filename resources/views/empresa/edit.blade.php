@extends('layouts.app')
@section('title', 'ADMINISTRACION EMPRESA') 
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-primary" style="background: #383d81">
                <h4 class="card-title">Editar Informacion Empresa</h4>
                <p class="card-category">Datos Informativos de la Empresa</p>
            </div>
            <div class="card-body">
                <form id="FormulariosModificarEmpresa" method="POST" onkeydown="return event.key != 'Enter';" action="{{ route('empresa.update', $empresa->emp_id) }}">
                @csrf 
                @method('PUT')
                    <div class="row">
                        <div class="col-8">
                            <div class="row">
                                <div class="col-12">
                                  <div class="form-group" id="cls_emp_nombre">
                                      <label class="bmd-label-floating">*Nombre.-</label>
                                      <input type="text" aria-describedby="emp_nombre" class="form-control" id="emp_nombre" name="emp_nombre" value="{{ $empresa->emp_nombre }}">
                                      <span class="material-icons form-control-feedback">clear</span>
                                      <span class="invalid-feedback" role="alert" id="error_emp_nombre"><strong></strong></span>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group" id="cls_emp_titulo">
                                      <label class="bmd-label-floating">*Titulo.-</label>
                                      <input type="text" aria-describedby="emp_titulo" class="form-control" id="emp_titulo" name="emp_titulo" value="{{ $empresa->emp_titulo }}">
                                      <span class="material-icons form-control-feedback">clear</span>
                                      <span class="invalid-feedback" role="alert" id="error_emp_titulo"><strong></strong></span>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group" id="cls_emp_direccion">
                                      <label class="bmd-label-floating">*Direccion.-</label>
                                      <input type="text" aria-describedby="emp_direccion" class="form-control" id="emp_direccion" name="emp_direccion" value="{{ $empresa->emp_direccion }}">
                                      <span class="material-icons form-control-feedback">clear</span>
                                      <span class="invalid-feedback" role="alert" id="error_emp_direccion"><strong></strong></span>
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="col-md-12 text-center align-self-center">
                                <div class="row">
                                    <div class="col-12">
                                        <img src="{{ asset($empresa->emp_imagen) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                              <div id="cls_emp_telefono">
                                  <label class="bmd-label-floating">Imagen.-</label>
                                  <input type="file" id="emp_imagen" name="emp_imagen" accept="image/*">
                                  <span class="invalid-feedback" role="alert" id="error_emp_imagen"><strong></strong></span>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" id="cls_emp_telefono">
                              <label class="bmd-label-floating">*Telefono.-</label>
                              <input type="text" aria-describedby="emp_telefono" class="form-control" id="emp_telefono" name="emp_telefono" value="{{ $empresa->emp_telefono }}">
                              <span class="material-icons form-control-feedback">clear</span>
                              <span class="invalid-feedback" role="alert" id="error_emp_telefono"><strong></strong></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group" id="cls_emp_correo">
                              <label class="bmd-label-floating">*Correo.-</label>
                              <input type="email" aria-describedby="emp_correo" class="form-control" id="emp_correo" name="emp_correo" value="{{ $empresa->emp_correo }}">
                              <span class="material-icons form-control-feedback">clear</span>
                              <span class="invalid-feedback" role="alert" id="error_emp_correo"><strong></strong></span>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group" id="cls_emp_web">
                              <label class="bmd-label-floating">*Pagina Web.-</label>
                              <input type="text" aria-describedby="emp_web" class="form-control" id="emp_web" name="emp_web" value="{{ $empresa->emp_web }}">
                              <span class="material-icons form-control-feedback">clear</span>
                              <span class="invalid-feedback" role="alert" id="error_emp_web"><strong></strong></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group" id="cls_emp_horario">
                              <label class="bmd-label-floating">*Horarios.-</label>
                              <input type="text" aria-describedby="emp_horario" class="form-control" id="emp_horario" name="emp_horario" value="{{ $empresa->emp_horario }}">
                              <span class="material-icons form-control-feedback">clear</span>
                              <span class="invalid-feedback" role="alert" id="error_emp_horario"><strong></strong></span>
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="form-group" id="cls_emp_descripcion">
                              <label class="bmd-label-floating">*Descripcion.-</label>
                              <textarea rows="6" aria-describedby="emp_descripcion" class="form-control" id="emp_descripcion" name="emp_descripcion">{{ $empresa->emp_descripcion }}</textarea>
                              <span class="material-icons form-control-feedback">clear</span>
                              <span class="invalid-feedback" role="alert" id="error_emp_descripcion"><strong></strong></span>
                          </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning btn-round btn-sm pull-right"><i class="material-icons">save</i> Guardar Datos</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@section('page-js-script')
<script type="text/javascript">

    $("#empresa").addClass("active");

    $("#emp_nombre, #emp_titulo, #emp_direccion, #emp_telefono, #emp_correo, #emp_web, #emp_horario, #emp_descripcion, #emp_imagen").on('change keyup', function () {
        limpiarErrores($(this).attr('id'));
        $(this).attr('id').blur(); 
    });

    $('#FormulariosModificarEmpresa').submit(function(e){
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
                alertas(2,'empresa');
            }
        });
    });
</script>

@stop
@endsection