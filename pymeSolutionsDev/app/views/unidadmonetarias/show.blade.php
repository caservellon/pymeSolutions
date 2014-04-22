@extends('layouts.scaffold')

@section('main')

<div class='page-header clearfix'>
<h2>Unidad Monetaria > <small>Ver {{ $monetaryUnity->CON_UnidadMonetaria_Nombre }}</small>
<a class='btn btn-primary pull-right ' href="{{URL::previous()}}">
<i class="glyphicon glyphicon-arrow-left"></i> Atras</a></h2>

</div>  
@if (isset($monetaryUnity))
	
	<div class="jumbotron text-left" style="background-color:#eeeeee;">
		<h2></h2>
		<p>
			<strong>ID:</strong> {{ $monetaryUnity->CON_UnidadMonetaria_ID  }}<br>
			<strong>Nombre:</strong> {{ $monetaryUnity->CON_UnidadMonetaria_Nombre}}<br>
			<strong>Tasa:</strong> {{ $monetaryUnity->CON_UnidadMonetaria_TasaConversion}}<br>
			<strong>Observacion:</strong> {{ $monetaryUnity->CON_UnidadMonetaria_Observacion}}<br>
		</p>
		<a class="btn btn-success" href="{{ URL::to('contabilidad/configuracion/unidadmonetaria/'.$monetaryUnity->CON_UnidadMonetaria_ID.'/edit') }}">Editar</a>
	</div>
@endif
@stop