@extends('layouts.scaffold')

@section('main')

<br>

<h1>Orden de Compra</h1>

<br>

<div class="well" style="max-width: 400px; margin:10px;">
	<!--<a href="/Compras/SolicitudCotizacion/Crear" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-plus"></span> Crear Solicitud de Cotizacion</a>-->
		@if(Seguridad::indexOC())
        <a href="/Compras/OrdenCompra/index" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-search"></span> Mostrar Orden Compra</a>
       @endif
       @if(Seguridad::indexImprimirOC())
        <a href="/Compras/OrdenCompra/Imprimir" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-print"></span> Imprimir Orden Compra</a>
		@endif
		@if(Seguridad::ListarAutorizarOrdenCompra())
	<a href="/Compras/OrdenCompra/Autorizacion/ListaOrdenes" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-thumbs-up"></span> Autorizar Orden de Compra</a>
	@endif
	@if(Seguridad::ListaAdministrarOrdenCompra())
	<a href="/Compras/OrdenCompra/Autorizacion/ListarOrdenes" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-cog"></span> Administrar Orden Compra</a>
	@endif
	@if(Seguridad::ListarPagoOrdenCompra())
	<a href="/Compras/OrdenCompra/GenerarPago/ListaCotizaciones" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-usd"></span> generar pago Ordenes de  Compras</a>
     @endif
     @if(Seguridad::VerPlanPagoOrdenCompra())   
        <a href="/Compras/OrdenCompra/PlanPago/Lista" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-search"></span> Ver Plan de Pago Ordenes</a>
        @endif
        @if(Seguridad::ListarHistorialOrdenes())
        <a href="/Compras/OrdenCompra/Historial/ListarOrdenes" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-list"></span> Historial Orden Compra</a>
         @endif
         @if(Seguridad::ListaDevolucionCompras())
         <a href="/Compras/DevolucionCompra/Lista" class="btn btn-default btn-lg btn-block"><span class="glyphicon glyphicon-list"></span> Devolucion sobre Compra</a>
		@endif

</div>


@stop