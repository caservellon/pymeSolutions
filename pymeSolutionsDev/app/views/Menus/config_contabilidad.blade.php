@extends('layouts.scaffold')

@section('main')

<br>
<h1><i class="glyphicon glyphicon-cog"></i> Configuracion contabilidad</h1>
<a class="btn btn-sm btn-primary pull-right" href="{{URL::to('contabilidad')}}">
<i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
<br>

<div class="well"  style="max-width: 400px; margin:10px; background-color:;">
	@if(Seguridad::ListarCatalogoContables())
	<a href="{{URL::to('contabilidad/configuracion/catalogocuentas')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-list-alt"></span><br> Catalogo de Cuentas</a>
	@endif
	@if(Seguridad::ListarPeriodosContables())
	<a href="{{URL::to('contabilidad/configuracion/periodocontable')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-calendar"></span><br> Configuracion Periodo Contable</a>
	@endif
	@if(Seguridad::ListarUnidadesMonetarias())
	<a href="{{URL::to('contabilidad/configuracion/unidadmonetaria')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-usd"></span><br> Unidad Monetaria</a>
	@endif
	@if(Seguridad::ListarMotivosDeInventario())
	<a href="{{URL::to('contabilidad/configuracion/motivoinventarios')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon-shopping-cart"></span><br>Motivos de Inventario</a>
	@endif
	@if(Seguridad::ListarConceptosDeTransaccionesAutomaticas())
	<a href="{{URL::to('contabilidad/conceptomotivo')}}" class="btn btn-default btn-lg btn-block">
	<span class="glyphicon glyphicon glyphicon-th-large"></span><br>Transacciones Automaticas</a>
	@endif
</div>
<br>

@stop