@extends('layouts.app')
@section('title', 'MATERIALES UTILIZADOS') 
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-primary" style="background: #383d81">
                <div class="row align-items-center">
                    <div class="col-10">
                        <h4 class="card-title">Ver Informacion - Materiales</h4>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('material.create') }}" class="btn btn-danger btn-fab btn-round py-0 my-0" style="background-color: #5B5B5B"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-12">         
                    <div class="form-group" id="contenedor">
                      <table id="tabla_material"></table>
                      <div id="paginador_tabla_material"></div>                         
                  </div>                                
                </div>
            </div>
        </div>
    </div>
</div>
@section('page-js-script')
<script type="text/javascript">

    $("#material").addClass("active");

    jQuery("#tabla_material").jqGrid({
        url: 'material/1',
        datatype: 'json', mtype: 'GET',
        height: '400px', autowidth: true,
        toolbarfilter: true,
        forceFit:true,  
        colNames: ['#','DESCRIPCION','ELIMINAR'],
        rowNum: 20, sortname: 'mat_id', sortorder: 'asc', viewrecords: true, caption: 'LISTADO MATERIALES UTILIZADOS', align: "center",
        colModel: [
            {name: 'mat_id', index: 'mat_id', align: 'center',width: 6},
            {name: 'mat_descripcion', index: 'mat_descripcion', align: 'left', width: 80},
            {name: 'btn_eliminar', index: 'btn_eliminar', align: 'center', width: 10, sortable:false}
        ],
        pager: '#paginador_tabla_material',
        rowList: [20, 30, 40, 50],
        gridComplete: function () {
            var idarray = jQuery('#tabla_material').jqGrid('getDataIDs');
            if (idarray.length > 0) {
            var firstid = jQuery('#tabla_material').jqGrid('getDataIDs')[0];
                    $("#tabla_material").setSelection(firstid);    
                }
        },
        onSelectRow: function (Id){},
        ondblClickRow: function (Id){
            let url = "{{ route('material.edit', 'id') }}";
                url = url.replace('id', Id);
                window.location.href = url;
        }
    });

    $(window).on('resize.jqGrid', function () {
        $("#tabla_material").jqGrid('setGridWidth', $("#contenedor").width());
    });

    function fn_eliminar_material(mat_id)
    {
        $.ajax({
            url: 'material/destroy',
            type: 'POST',
            data:
            {
                _method: 'delete',
                mat_id:mat_id
            },
            success: function(data) 
            {
                jQuery("#tabla_material").jqGrid('setGridParam', {
                    url: 'material/1'
                }).trigger('reloadGrid');
                swal.close();
            }
        });
    }

</script>

@stop
@endsection