@extends('layouts.layout')

@section('main')

<h1 align="center">Clasificacion Cuentas</h1>

@if (isset($clasificacioncuentas) && $clasificacioncuentas->count())

	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Codigo</th>
			</tr>

		</thead>
		<tbody>
			@foreach ($clasificacioncuentas as $unidad)
				<tr>
					<td>{{{ $unidad->CON_ClasificacionCuenta_ID }}}</td>
					<td>{{{ $unidad->CON_ClasificacionCuenta_Nombre }}}</td>
					<td>{{{ $unidad->CON_ClasificacionCuenta_Codigo }}}</td>
				</tr>
				@endforeach
		</tbody>


	</table>

@endif
@stop