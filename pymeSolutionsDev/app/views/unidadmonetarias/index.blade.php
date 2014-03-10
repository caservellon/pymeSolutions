@extends('layouts.scaffold')

@section('main')

<h1 align="center">Unidades Monetarias</h1>

<a class="btn btn-primary" href="{{ URL::to('contabilidad/configuracion/unidadmonetaria/create') }}">Crear Nuevo</a>

@if (isset($unidadmonetarias) && $unidadmonetarias->count())

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Tasa</th>
				<th>Observacion</th>
				<th>Action</th>
			</tr>

		</thead>
		<tbody>
			@foreach ($unidadmonetarias as $unidad)
				<tr>
					<td>{{{ $unidad->CON_UnidadMonetaria_ID }}}</td>
					<td>{{{ $unidad->CON_UnidadMonetaria_Nombre }}}</td>
					<td>{{{ $unidad->CON_UnidadMonetaria_TasaConversion }}}</td>
					<td>{{{ $unidad->CON_UnidadMonetaria_Observacion }}}</td>
					<td><a class="btn btn-success" href="{{ URL::to('contabilidad/configuracion/unidadmonetaria/'.$unidad->CON_UnidadMonetaria_ID.'/edit') }}">Editar</a>
					<a class="btn btn-primary" href="{{ URL::to('contabilidad/configuracion/unidadmonetaria/'.$unidad->CON_UnidadMonetaria_ID) }}">Mostrar</a></td>
				</tr>
				@endforeach
		</tbody>
		

	</table>

@endif
@stop