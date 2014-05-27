@extends('layouts.scaffold')

@section('main')

<br>

<h1>Solicitud de Cotizacion</h1>

<br>

<div class="well" style="max-width: 400px; margin:10px;">
	<a href="/Compras/SolicitudCotizacion/Crear" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-plus"></span> Crear Solicitud de Cotizacion</a>
        <a href="/Compras/SolicitudCotizacions" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-search"></span> Mostrar Solicitud de Cotizacion</a>
		<a href="/Compras/SolicitudCotizacion/Imprimir" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-search"></span> Imprimir Solicitud de Cotizacion</a>
	<!--<a href="/Compras/Cotizacions/editarParametrizar" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-pencil"></span> Editar Parametrizar Cotizacion</a>-->
<!--	<a href="/Ventas/AperturaCajas" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-ok"></span> Apertura de Cajas</a>
	<a href="/Ventas/Descuentos" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> Descuentos</a>-->
</div>


@stop
