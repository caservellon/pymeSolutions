@extends('layouts.scaffold')

@section('main')

<h1 align="center">Configuracion Periodo Contable</h1>
<div>
<a class="btn btn-primary" href="{{ URL::to('contabilidad/configuracion/periodocontable/create') }}">Crear Nuevo</a>

<table class="table table-bordered tables-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Cantidad dias</th>
					<th>Accion</th>
				</tr>
			</thead>

		
		<tbody>
	@foreach ($ClasificacionPeriodo as $Clasificacion)
		<tr>
			<td>{{ $Clasificacion->CON_ClasificacionPeriodo_ID  }}</td>
			<td>{{ $Clasificacion->CON_ClasificacionPeriodo_Nombre  }}</td>
			<td>{{ $Clasificacion->CON_ClasificacionPeriodo_CatidadDias  }}</td>
			<td><a class="btn btn-success" href="{{ URL::to('contabilidad/configuracion/periodocontable/'.$Clasificacion->CON_ClasificacionPeriodo_ID.'/edit') }}">Editar</a>
					<a class="btn btn-primary" href="{{ URL::to('contabilidad/configuracion/periodocontable/'.$Clasificacion->CON_ClasificacionPeriodo_ID) }}">Mostrar</a></td>
		</tr>
	@endforeach	
	</tbody>
</table>
</div>
@stop