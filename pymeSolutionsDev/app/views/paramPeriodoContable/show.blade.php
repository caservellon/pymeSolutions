@extends('layouts.scaffold')

@section('main')

<h1 align="center">Mostrando {{ $ClasificacionPeriodo->CON_ClasificacionPeriodo_Nombre }}</h1>

@if (isset($ClasificacionPeriodo))
	
	<div class=" jumbotron text-cente" style="background-color:#eeeeee;">
		<h2></h2>
		<p>
			<strong>ID:</strong> {{ $ClasificacionPeriodo->CON_ClasificacionPeriodo_ID  }}<br>
			<strong>Nombre:</strong> {{ $ClasificacionPeriodo->CON_ClasificacionPeriodo_Nombre}}<br>
			<strong>Cantidad de Dias:</strong> {{ $ClasificacionPeriodo->CON_ClasificacionPeriodo_CatidadDias}}<br>
		</p>
		<a class="btn btn-primary" href="{{ URL::to('param-periodo/'.$ClasificacionPeriodo->CON_ClasificacionPeriodo_ID.'/edit') }}">Edit</a>
	</div>
@endif
@stop