<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>FICHA</title>
        <link href="{{ asset('css/pdf.css') }}" rel="stylesheet">
        <style>
            .move-ahead { counter-increment: page 2; position: absolute; visibility: hidden; }
            .pagenum:after { content:' ' counter(page); }
            .footer {position: fixed }
        </style>
    </head>

    <body>
        <table>
            <tbody>
                <tr class="tablaTitulo">
                    <td style="" class="nombreEmpresa" colspan="4">{{ $empresa->emp_titulo }}</td>
                    <td style="text-align: center" colspan="4"><img src="{{ asset($empresa->emp_imagen) }}" width="150px" height="90px"></td>
                </tr>
                 </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td style="" colspan="1">FACTURAR A</td>
                    <td style="" class="bordeBajo" colspan="3">: {{ $sql->fic_facturara }}</td>
                    <td style="" colspan="1">FECHA</td>
                    <td style="" class="bordeBajo" colspan="3">: {{ $sql->fic_fecha }}</td>
                </tr>
                <tr>
                    <td style="" colspan="1">PROPIETARIO</td>
                    <td style="" class="bordeBajo" colspan="3">: {{ $sql->persona->nombreCompleto }}</td>
                    <td style="" colspan="1">DIRECCION</td>
                    <td style="" class="bordeBajo" colspan="3">: {{ $sql->persona->per_direccion }}</td>
                </tr>
                <tr>
                    <td style="" colspan="1">EMAIL</td>
                    <td style="" class="bordeBajo" colspan="3">: {{ $sql->persona->per_email }}</td>
                    <td class="ordenTrabajo" style="text-align: center" colspan="4">ORDEN DE TRABAJO :</td>
                </tr>
                <tr>
                    <td style="" colspan="1">TELEFONOS</td>
                    <td style="" class="bordeBajo" colspan="3">: {{ $sql->persona->per_telefonos }}</td>
                    <td colspan="1"></td>
                    <td class="numOrden" style="text-align: left" colspan="3">N° {{ str_pad($sql->fic_id,  6, "0",STR_PAD_LEFT) }}</td>
                </tr>  
                <tr>
                    <td style="" colspan="1">MARCA</td>
                    <td style="" colspan="1" class="bordeBajo">: {{ $sql->fic_marca }}</td>
                    <td style="" colspan="1">PLACA</td>
                    <td style="" colspan="1" class="bordeBajo">: {{ $sql->fic_placa }}</td>
                    <td style="" colspan="1">MODELO</td>
                    <td style="" colspan="1" class="bordeBajo">: {{ $sql->fic_modelo }}</td>
                    <td style="" colspan="1">COLOR</td>
                    <td style="" colspan="1" class="bordeBajo">: {{ $sql->fic_color }}</td>
                </tr>
                <tr>
                    <td style="" colspan="1">KM</td>
                    <td style="" colspan="1" class="bordeBajo">: {{ $sql->fic_km }}</td>
                    <td style="" colspan="1">N° MOTOR</td>
                    <td style="" colspan="2" class="bordeBajo">: {{ $sql->fic_nmotor }}</td>
                    <td style="" colspan="3"></td>
                </tr>
                <tr>
                    <td style="" colspan="1">AÑO</td>
                    <td style="" colspan="1" class="bordeBajo">: {{ $sql->fic_anio }}</td>
                    <td style="" colspan="1">N° CHASIS</td>
                    <td style="" colspan="2" class="bordeBajo">: {{ $sql->fic_nchasis }}</td>
                </tr>
            </tbody>
        </table>
        <table class="tablaTrabajosaRealizar">
            <tbody>
                <tr>
                    <td class="tituloTrabajosaRealizar" style="" colspan="8">TRABAJOS A REALIZAR:</td>
                </tr>
                <tr>
                    <td style="" colspan="8">{!! $sql->fic_trabajosarealizar !!}</td>
                </tr>
            </tbody>
        </table>
        <table class="tablaInventarioVehiculo">
            <tbody>
                <tr>
                    <td class="textinventario" style="text-align: center" colspan="8"><div id="cabeceraInventario">INVENTARIO VEHICULO</div></td>
                </tr>
                <tr>
                    <td style="text-align: center" colspan="8">{{ $inventario }}</td>
                </tr>
            </tbody>
        </table>
        <table class="tablaTrabajosaRealizar">
            <tbody>
                <tr>
                    <td class="tituloTrabajosaRealizar" style="text-align: center" colspan="8">OBSERVACIONES</td>
                </tr>
                <tr>
                    <td style="" colspan="8">{{ $sql->fic_observaciones}}</td>
                </tr>
            </tbody>
        </table>
        <table class="tablaTrabajosaRealizar">
            <tbody>
                <tr>
                    <td class="tituloTrabajosaRealizar" style="text-align: center" colspan="8">NIVEL DE COMBUSTIBLE</td>
                </tr>
                <tr>
                    <td style="text-align: center" colspan="8">{{ $sql->fic_nivelcombustible}}</td>
                </tr>
            </tbody>
        </table>
        <table>
            <tbody>
                <tr>
                    <td style="text-align: right;" colspan="4"><b>{{ $empresa->emp_nombre }}</b></td>
                    <td style="text-align: left;" colspan="4">: {{ $empresa->emp_direccion }}</td>
                </tr>
                <tr>
                    <td style="text-align: right;" colspan="4">Cel.</td>
                    <td style="text-align: left;" colspan="4">: {{ $empresa->emp_telefono }}</td>
                </tr>
                <tr>
                    <td style="text-align: right;" colspan="4">E-mail : {{ $empresa->emp_correo }}</td>
                    <td style="text-align: left;" colspan="4">Pagina Web : {{ $empresa->emp_web }}</td>
                </tr>
                <tr>
                    <td style="text-align: right;" colspan="3">Horario de atencion</td>
                    <td style="text-align: left;" colspan="5">: {{ $empresa->emp_horario }}</td>
                </tr>
                <tr>
                    <td class="textoDescripcion" style="" colspan="8">{{ $empresa->emp_descripcion }}</td>
                </tr>
            </tbody>
        </table>
    </body>

</html>