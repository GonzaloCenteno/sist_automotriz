@extends('layouts.app')
@section('title', 'INFORMACION FICHA') 
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header card-header-primary" style="background: #383d81">
                <div class="row align-items-center">
                    <div class="col-10">
                        <h4 class="card-title">Ver Informacion - Ficha</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row py-2">
                    <div class="col-2">
                        <div class="form-group">
                            <label class="control-label">*FECHA INICIO.-</label>
                            <input type="date" class="form-control" id="txt_fecha_inicio" />
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label class="control-label">*FECHA FIN.-</label>
                            <input type="date" class="form-control" id="txt_fecha_fin" />
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group" id="contenedor_propietario">
                            <label class="control-label">*PROPIETARIO.-</label>
                            <input type="hidden" id="propietario">
                            <input type="text" class="form-control text-uppercase text-center" id="bsq_propietario" />
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group" id="contenedor_placa">
                            <label class="control-label">*PLACA.-</label>
                            <input type="hidden" id="placa">
                            <input type="text" class="form-control text-uppercase text-center" id="bsq_placa" />
                        </div>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-warning btn-fab btn-round py-0 my-0" id="btn_buscar"><i class="material-icons">search</i></button>
                    </div>
                </div>
                <div class="col-12">         
                    <div class="form-group" id="contenedor">
                      <table id="tabla_fichas"></table>
                      <div id="paginador_tabla_fichas"></div>                         
                  </div>                                
                </div>
            </div>
        </div>
    </div>
</div>
@section('page-js-script')
<script type="text/javascript">

    $("#fichas").addClass("active");

    jQuery("#tabla_fichas").jqGrid({
        url: 'ficha/0?grid=fichas&propietario=0&placa=0&fecha_inicio=0&fecha_fin=0',
        datatype: 'json', mtype: 'GET',
        height: '400px', autowidth: true,
        toolbarfilter: true,
        forceFit:true,  
        colNames: ['#','IMP.','FACTURADO A', 'PROPIETARIO', 'FECHA', 'MARCA', 'PLACA', 'MODELO'],
        rowNum: 20, sortname: 'fic_id', sortorder: 'asc', viewrecords: true, caption: 'LISTADO DE FICHAS', align: "center",
        colModel: [
            {name: 'fic_id', index: 'fic_id', align: 'center',width: 4},
            {name: 'btn_imprimir', index: 'btn_imprimir', align: 'center', width: 5,sortable: false},
            {name: 'fic_fecha', index: 'fic_fecha', align: 'left', width: 15},
            {name: 'per_id', index: 'per_id', align: 'left', width: 20},
            {name: 'fic_fecha', index: 'fic_fecha', align: 'center', width: 10},
            {name: 'fic_marca', index: 'fic_marca', align: 'left', width: 10},
            {name: 'fic_placa', index: 'fic_placa', align: 'center', width: 10},
            {name: 'fic_modelo', index: 'fic_modelo', align: 'left', width: 10}
        ],
        pager: '#paginador_tabla_fichas',
        rowList: [20, 30, 40, 50],
        gridComplete: function () {
            var idarray = jQuery('#tabla_fichas').jqGrid('getDataIDs');
            if (idarray.length > 0) {
            var firstid = jQuery('#tabla_fichas').jqGrid('getDataIDs')[0];
                    $("#tabla_fichas").setSelection(firstid);    
                }
        }
    });

    $(window).on('resize.jqGrid', function () {
        $("#tabla_fichas").jqGrid('setGridWidth', $("#contenedor").width());
    });

    $("#bsq_propietario, #bsq_placa").on("click", function () {
       $(this).select();
    });

    $("#bsq_propietario").keyup(function(){
        if ($(this).val().length == 0) 
        {
            $("#propietario").val('');
        }
    });

    $("#bsq_propietario").autocomplete(
    {
        source: function (request, response)
        {
            $.ajax(
            {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'GET',
                url: '{{ url("ficha/show") }}',
                dataType: "json",
                data:
                {
                    busqueda: 'propietarios',
                    nombre: request.term
                },
                beforeSend:function()
                {            
                    $('#contenedor_propietario').block({ 
                        message: "<span><img src='{{ asset('img/cargando.gif') }}' /> ..:: CARGANDO INFORMACION ::..</span>", 
                        css: { border: '5px solid #a00',width: '100%' } 
                    });
                },
                success: function (data)
                {
                    response(data);
                    $('#contenedor_propietario').unblock();
                },
                error:function()
                {
                    $('#contenedor_propietario').unblock();
                    mensajes_sistema(5);
                }
            });
        },
        minLength: 3,
        focus: function (event, ui) {
            $("#propietario").val(ui.item.per_id);
            return false;
        },
        select: function (event, ui) {
            console.log(ui);
            $("#propietario").val(ui.item.per_id).trigger("change");
            $("#bsq_propietario").val(ui.item.propietario);
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("ui-autocomplete-item", item)
            .append("<a>" + item.propietario + "</a>")
            .appendTo(ul);
    };

    $("#bsq_placa").keyup(function(){
        if ($(this).val().length == 0) 
        {
            $("#placa").val('');
        }
    });

    $("#bsq_placa").autocomplete(
    {
        source: function (request, response)
        {
            $.ajax(
            {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'GET',
                url: '{{ url("ficha/show") }}',
                dataType: "json",
                data:
                {
                    busqueda: 'placas',
                    placa: request.term
                },
                beforeSend:function()
                {            
                    $('#contenedor_placa').block({ 
                        message: "<span><img src='{{ asset('img/cargando.gif') }}' /> ..:: CARGANDO INFORMACION ::..</span>", 
                        css: { border: '5px solid #a00',width: '100%' } 
                    });
                },
                success: function (data)
                {
                    response(data);
                    $('#contenedor_placa').unblock();
                },
                error:function()
                {
                    $('#contenedor_placa').unblock();
                    alertas(5);
                }
            });
        },
        minLength: 3,
        focus: function (event, ui) {
            $("#placa").val(ui.item.fic_placa);
            return false;
        },
        select: function (event, ui) {
            console.log(ui);
            $("#placa").val(ui.item.fic_placa).trigger("change");
            $("#bsq_placa").val(ui.item.fic_placa);
            return false;
        }
    }).data("ui-autocomplete")._renderItem = function (ul, item) {
        return $("<li>")
            .data("ui-autocomplete-item", item)
            .append("<a>" + item.fic_placa + "</a>")
            .appendTo(ul);
    };

    $("#btn_buscar").click(function (){
        let propietario = $("#propietario").val() || 0;
        let placa = $("#placa").val() || 0;
        let fecha_inicio = $("#txt_fecha_inicio").val() || 0;
        let fecha_fin = $("#txt_fecha_fin").val() || 0;

        jQuery("#tabla_fichas").jqGrid('setGridParam', {
            url: 'ficha/0?grid=fichas&propietario='+propietario+'&placa='+placa+'&fecha_inicio='+fecha_inicio+'&fecha_fin='+fecha_fin
        }).trigger('reloadGrid');
    });

    function fn_imprimir(fic_id)
    {
        window.open('ficha/'+fic_id+'?reporte=ficha');
    }

</script>

@stop
@endsection