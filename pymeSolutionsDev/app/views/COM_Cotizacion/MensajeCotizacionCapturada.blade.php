@extends('layouts.scaffold')

@section('main')

	<div class="page-header clearfix">
		<h2 class="sub-header"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;Cotizaciones &gt; Capturar Cotizaci&oacute;n &gt; Capturada</h2>
	</div>
	
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div class="text-center">
		<a href="{{{ URL::to('/Compras/Cotizaciones/CapturarCotizacion') }}}" class="btn btn-sm btn-primary "><span class="glyphicon glyphicon-ok"></span></a>
	</div>
	<h2 class="text-center">Cotizaci&oacute;n Capturada</h2>
	<br>
	<h6 class="text-center">La cotizaci&oacute;n se ha capturado correctamente.</h6>

@stop