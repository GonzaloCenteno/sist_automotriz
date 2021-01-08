@extends('layouts.app')
@section('title', 'ADMINISTRACION USUARIOS') 
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-primary" style="background: #383d81">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="card-title">Ver Informacion - Usuarios</h4>
                    </div>
                    <div class="col-1 text-right">
                        <a href="{{ route('usuario.create') }}" class="btn btn-danger btn-fab btn-round py-0 my-0" style="background-color: #5B5B5B"><i class="material-icons">add</i></a>
                    </div>
                    <div class="col-2 text-right">
                        <input id="marcador" type="checkbox" checked data-toggle="toggle" data-onstyle="default" data-offstyle="danger" data-size="sm" data-on="ACTIVOS" data-off="DE BAJA">                                             
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-12">         
                    <div class="form-group" id="contenedor">
                      <table id="tabla_usuarios"></table>
                      <div id="paginador_tabla_usuarios"></div>                         
                  </div>                                
                </div>
            </div>
        </div>
    </div>
</div>
@section('page-js-script')
<script type="text/javascript">

    $("#usuarios").addClass("active");

    jQuery("#tabla_usuarios").jqGrid({
        url: 'usuario/1',
        datatype: 'json', mtype: 'GET',
        height: '400px', autowidth: true,
        toolbarfilter: true,
        forceFit:true,  
        colNames: ['#','NOMBRE','EMAIL','ROL','FECHA CREACION','ESTADO'],
        rowNum: 20, sortname: 'id', sortorder: 'asc', viewrecords: true, caption: 'LISTADO DE USUARIOS', align: "center",
        colModel: [
            {name: 'id', index: 'id', align: 'center',width: 2},
            {name: 'name', index: 'name', align: 'left', width: 20},
            {name: 'email', index: 'email', align: 'left', width: 15},
            {name: 'rol', index: 'rol', align: 'left', width: 15},
            {name: 'created_at', index: 'created_at', align: 'center', width: 10},
            {name: 'deleted_at', index: 'deleted_at', align: 'center', width: 10, sortable:false}
        ],
        pager: '#paginador_tabla_usuarios',
        rowList: [20, 30, 40, 50],
        gridComplete: function () {
            var idarray = jQuery('#tabla_usuarios').jqGrid('getDataIDs');
            if (idarray.length > 0) {
            var firstid = jQuery('#tabla_usuarios').jqGrid('getDataIDs')[0];
                    $("#tabla_usuarios").setSelection(firstid);    
                }
        },
        onSelectRow: function (Id){},
        ondblClickRow: function (Id){
            let url = "{{ route('usuario.edit', 'id') }}";
                url = url.replace('id', Id);
                window.location.href = url;
        }
    });

    $(window).on('resize.jqGrid', function () {
        $("#tabla_usuarios").jqGrid('setGridWidth', $("#contenedor").width());
    });

    $('#marcador').change(function(){
        if($(this).prop('checked'))
        {
            jQuery("#tabla_usuarios").jqGrid('setGridParam', {
                url: 'usuario/1?estados=1'
            }).trigger('reloadGrid');
        }
        else
        {
            jQuery("#tabla_usuarios").jqGrid('setGridParam', {
                url: 'usuario/1?estados=0'
            }).trigger('reloadGrid');
        }
    });

    function cambiar_estado(id, nombre, estado)
    {
        if(estado === 1)
        {
            $.ajax({
                url: 'usuario/destroy',
                type: 'POST',
                data:
                {
                    _method: 'delete',
                    id:id,
                    tipo:estado
                },
                success: function(data) 
                {
                    jQuery("#tabla_usuarios").jqGrid('setGridParam', {
                        url: 'usuario/1?estados=0'
                    }).trigger('reloadGrid');
                    swal.close();
                }
            });
        }
        else
        {
            swal({
                title: '¿QUIERE DAR DE BAJA A ESTE USUARIO?',
                html: "<b>"+nombre+"</b>",
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
                        url: 'usuario/destroy',
                        type: 'POST',
                        data:
                        {
                            _method: 'delete',
                            id:id,
                            tipo:estado
                        },
                        success: function(data) 
                        {
                            jQuery("#tabla_usuarios").jqGrid('setGridParam', {
                                url: 'usuario/1?estados=1'
                            }).trigger('reloadGrid');
                            swal.close();
                        }
                    });
                }
            });
        }
    }
</script>

@stop
@endsection