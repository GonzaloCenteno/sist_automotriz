@extends('layouts.app')
@section('title', 'INVENTARIO VEHICULO') 
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-primary" style="background: #383d81">
                <div class="row align-items-center">
                    <div class="col-10">
                        <h4 class="card-title">Ver Informacion - Inventario Vehiculo</h4>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('inventario_vehiculo.create') }}" class="btn btn-danger btn-fab btn-round py-0 my-0" style="background-color: #5B5B5B"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-12">         
                    <div class="form-group" id="contenedor">
                      <table id="tabla_inventario_vehiculo"></table>
                      <div id="paginador_tabla_inventario_vehiculo"></div>                         
                  </div>                                
                </div>
            </div>
        </div>
    </div>
</div>
@section('page-js-script')
<script type="text/javascript">

    $("#inventario_vehiculo").addClass("active");

    jQuery("#tabla_inventario_vehiculo").jqGrid({
        url: 'inventario_vehiculo/1',
        datatype: 'json', mtype: 'GET',
        height: '400px', autowidth: true,
        toolbarfilter: true,
        forceFit:true,  
        colNames: ['#','DESCRIPCION','ELIMINAR'],
        rowNum: 20, sortname: 'ive_id', sortorder: 'asc', viewrecords: true, caption: 'LISTADO INVENTARIO', align: "center",
        colModel: [
            {name: 'ive_id', index: 'ive_id', align: 'center',width: 6},
            {name: 'ive_descripcion', index: 'ive_descripcion', align: 'left', width: 80},
            {name: 'btn_eliminar', index: 'btn_eliminar', align: 'center', width: 10, sortable:false}
        ],
        pager: '#paginador_tabla_inventario_vehiculo',
        rowList: [20, 30, 40, 50],
        gridComplete: function () {
            var idarray = jQuery('#tabla_inventario_vehiculo').jqGrid('getDataIDs');
            if (idarray.length > 0) {
            var firstid = jQuery('#tabla_inventario_vehiculo').jqGrid('getDataIDs')[0];
                    $("#tabla_inventario_vehiculo").setSelection(firstid);    
                }
        },
        onSelectRow: function (Id){},
        ondblClickRow: function (Id){
            let url = "{{ route('inventario_vehiculo.edit', 'id') }}";
                url = url.replace('id', Id);
                window.location.href = url;
        }
    });

    $(window).on('resize.jqGrid', function () {
        $("#tabla_inventario_vehiculo").jqGrid('setGridWidth', $("#contenedor").width());
    });

    function fn_eliminar_inventario(ive_id)
    {
        $.ajax({
            url: 'inventario_vehiculo/destroy',
            type: 'POST',
            data:
            {
                _method: 'delete',
                ive_id:ive_id
            },
            success: function(data) 
            {
                jQuery("#tabla_inventario_vehiculo").jqGrid('setGridParam', {
                    url: 'inventario_vehiculo/1'
                }).trigger('reloadGrid');
                swal.close();
            }
        });
    }

</script>

@stop
@endsection