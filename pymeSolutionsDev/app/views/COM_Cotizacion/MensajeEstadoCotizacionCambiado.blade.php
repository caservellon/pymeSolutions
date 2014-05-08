@extends('layouts.scaffold')

@section('main')
	
	<div class="page-header clearfix">
		<h2 class="sub-header"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Cotizaciones &gt; Habilitar/Inhabilitar &gt; Estado Cambiado</h2>
	</div>
	
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="text-center">
		<a href="{{{ URL::to('/Compras/Cotizaciones/HabilitarInhabilitar') }}}" class="btn btn-sm btn-primary "><span class="glyphicon glyphicon-ok"></span></a>
	</div>
	<h2 class="text-center">Estado de Cotizaci&oacute;n(es) Cambiado</h2>
	<br>
	<h6 class="text-center">El cambio en el estado de la(s) cotizaci&oacute;n(es) se ha guardado correctamente.</h6>

@stop