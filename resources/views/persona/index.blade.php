@extends('layouts.app')
@section('title', 'PERSONAS') 
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-primary" style="background: #383d81">
                <div class="row align-items-center">
                    <div class="col-10">
                        <h4 class="card-title">Ver Informacion - Personas</h4>
                    </div>
                    <div class="col-2">
                        <a href="{{ route('persona.create') }}" class="btn btn-danger btn-fab btn-round py-0 my-0" style="background-color: #5B5B5B"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-12">         
                    <div class="form-group" id="contenedor">
                      <table id="tabla_personas"></table>
                      <div id="paginador_tabla_personas"></div>                         
                  </div>                                
                </div>
            </div>
        </div>
    </div>
</div>
@section('page-js-script')
<script type="text/javascript">

    $("#personas").addClass("active");

    jQuery("#tabla_personas").jqGrid({
        url: 'persona/1?tabla=persona',
        datatype: 'json', mtype: 'GET',
        height: '400px', autowidth: true,
        toolbarfilter: true,
        forceFit:true,  
        colNames: ['#','TIPO DOCUMENTO','DOCUMENTO','RAZON SOCIAL','NOMBRES APELLIDOS'],
        rowNum: 20, sortname: 'per_id', sortorder: 'asc', viewrecords: true, caption: 'LISTADO PERSONAS', align: "center",
        colModel: [
            {name: 'per_id', index: 'per_id', align: 'center',width: 5},
            {name: 'per_tipodocumento', index: 'per_tipodocumento', align: 'center', width: 15},
            {name: 'per_documento', index: 'per_documento', align: 'center', width: 15, sortable:false},
            {name: 'per_razonsocial', index: 'per_razonsocial', align: 'left', width: 20, sortable:false},
            {name: 'nombre_completo', index: 'nombre_completo', align: 'left', width: 30, sortable:false},
        ],
        pager: '#paginador_tabla_personas',
        rowList: [20, 30, 40, 50],
        gridComplete: function () {
            var idarray = jQuery('#tabla_personas').jqGrid('getDataIDs');
            if (idarray.length > 0) {
            var firstid = jQuery('#tabla_personas').jqGrid('getDataIDs')[0];
                    $("#tabla_personas").setSelection(firstid);    
                }
        },
        onSelectRow: function (Id){},
        ondblClickRow: function (Id){
            let url = "{{ route('persona.edit', 'id') }}";
                url = url.replace('id', Id);
                window.location.href = url;
        }
    });

    $(window).on('resize.jqGrid', function () {
        $("#tabla_personas").jqGrid('setGridWidth', $("#contenedor").width());
    });

</script>

@stop
@endsection