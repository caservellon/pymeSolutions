@extends('layouts.scaffold')

@section('main')

<h1>All MotivoTransaccions</h1>

<a class="btn btn-primary" href="{{ URL::to('contabilidad/motivotransaccion/create') }}">Crear Nuevo</a>

@if ($MotivoTransaccions->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>CON_MotivoTransaccion_Codigo</th>
				<th>CON_MotivoTransaccion_Descripcion</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($MotivoTransaccions as $MotivoTransaccion)
				<tr>
					<td>{{{ $MotivoTransaccion->CON_MotivoTransaccion_Codigo }}}</td>
					<td>{{{ $MotivoTransaccion->CON_MotivoTransaccion_Descripcion }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no MotivoTransaccions
@endif

@stop
