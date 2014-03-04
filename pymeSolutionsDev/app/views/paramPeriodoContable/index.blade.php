@extends('layouts.layout')

@section('main')

<h1 align="center">Configuracion Periodo Contable</h1>

<a class="btn btn-primary" href="{{ URL::to('param-periodo/create') }}">Crear Nuevo</a>
<table class="table table-bordered tables-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Cantidad dias</th>
					<th>Action</th>
				</tr>
			</thead>

		
		<tbody>
	@foreach ($ClasificacionPeriodo as $Clasificacion)
		<tr>
			<td>{{ $Clasificacion->CON_ClasificacionPeriodo_ID  }}</td>
			<td>{{ $Clasificacion->CON_ClasificacionPeriodo_Nombre  }}</td>
			<td>{{ $Clasificacion->CON_ClasificacionPeriodo_CatidadDias  }}</td>
			<td><a class="btn btn-success" href="{{ URL::to('param-periodo/'.$Clasificacion->CON_ClasificacionPeriodo_ID.'/edit') }}">Edit</a>
					<a class="btn btn-primary" href="{{ URL::to('param-periodo/'.$Clasificacion->CON_ClasificacionPeriodo_ID) }}">Show</a></td>
		</tr>
	@endforeach	
	</tbody>
</table>
@stop