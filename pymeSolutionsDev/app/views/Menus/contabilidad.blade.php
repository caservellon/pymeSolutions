@extends('layouts.scaffold')

@section('main')
<br>

<h1><i class="glyphicon glyphicon-list"></i>
	 Menu Principal Contabilidad</h1>
<br>


<div class="well" style="max-width: 400px; margin:10px; //background-color:#7fb87f;">
	@if(Seguridad::VerLibroDiario())
	<a href="{{URL::to('contabilidad/librodiario')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-book"></span><br> Libro Diario</a>
	@endif
	@if(Seguridad::VerEstadosFinancieros())
	<a href="{{URL::route('con.estadosfinancieros')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-paperclip"></span><br>Estados Financieros</a>
	@endif
	@if(Seguridad::GenerarCierrePeriodo())
	<a href="{{URL::route('con.cierreperiodo')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-time"></span><br>Cierre de Periodo</a>
	@endif
	@if(Seguridad::VerPagos())
	<a href="{{URL::route('con.compras')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-shopping-cart"></span><br>Compras - Ordenes de pago <span class="badge">{{sizeof(comContabilidad::OrdenesSinPagar())}}</span></a>
	@endif
	@if(Seguridad::VerReembolsos())
	<a href="{{URL::route('con.reembolsos')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-usd"></span><br>Reembolsos pendientes <span class="badge">{{sizeof(comContabilidad::Reembolsos())}}</span></a>
	@endif
	@if(Seguridad::ListarCatalogoContable() || Seguridad::ListarPeriodosContables() || Seguridad::ListarUnidadesMonetarias() || Seguridad::ListarMotivosDeInventario() || Seguridad::ListarConceptosDeTransaccionesAutomaticas())
	<a href="{{URL::to('contabilidad/configuracion')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-cog"></span><br>Configuracion</a>
	@endif
</div>
@stop