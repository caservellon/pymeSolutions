@extends('layouts.layout')

@section('main')

<h1 align="center">Mostrando {{ $monetaryUnity->CON_UnidadMonetaria_Nombre }}</h1>

@if (isset($monetaryUnity))
	
	<div class=" jumbotron text-center" style="background-color:#eeeeee;">
		<h2></h2>
		<p>
			<strong>ID:</strong> {{ $monetaryUnity->CON_UnidadMonetaria_ID  }}<br>
			<strong>Nombre:</strong> {{ $monetaryUnity->CON_UnidadMonetaria_Nombre}}<br>
			<strong>Tasa:</strong> {{ $monetaryUnity->CON_UnidadMonetaria_TasaConversion}}<br>
			<strong>Observacion:</strong> {{ $monetaryUnity->CON_UnidadMonetaria_Observacion}}<br>
		</p>
		<a class="btn btn-primary" href="{{ URL::to('unidad-monetaria/'.$monetaryUnity->CON_UnidadMonetaria_ID.'/edit') }}">Edit</a>
	</div>
@endif
@stop