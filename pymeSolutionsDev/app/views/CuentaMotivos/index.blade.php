@extends('layouts.scaffold')

@section('main')

<h1>All CuentaMotivos</h1>

<a class="btn btn-primary" href="{{ URL::to('contabilidad/cuentamotivos/create') }}">Crear Nuevo</a>

@if ($CuentaMotivos->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>CON_CuentaMotivo_DebeHaber</th>
				<th>CON_MotivoTransaccion_ID</th>
				<th>CON_CatalogoContable_ID</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($CuentaMotivos as $CuentaMotivo)
				<tr>
					@if ($CuentaMotivo->CON_CuentaMotivo_DebeHaber == 1)
					<td>Haber</td>
					@else
					<td>Debe</td>
					@endif
					<td>{{{ $CuentaMotivo->CON_MotivoTransaccion_ID }}}</td>
					<td>{{{ $CuentaMotivo->CON_CatalogoContable_ID }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no CuentaMotivos
@endif

@stop
