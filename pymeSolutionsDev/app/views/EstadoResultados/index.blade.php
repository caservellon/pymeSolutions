@extends('layouts.scaffold')

@section('main')

<h1 align="center">Estado de Resultados</h1>

@if ($EstadoResultados->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>CON_PeriodoContable_ID</th>
				<th>CON_EstadoResultados_Ingresos</th>
				<th>CON_EstadosResultados_CostoVentas</th>
				<th>CON_EstadoResultados_UtilidadBruta</th>
				<th>CON_EstadoResultados_GastosdeVentas</th>
				<th>CON_EstadoResultados_GastosAdministrativos</th>
				<th>CON_EstadoResultados_UtilidadOperacion</th>
				<th>CON_EstadoResultados_GastoFinanciero</th>
				<th>CON_EstadoResultados_UtilidadAntesImpuesto</th>
				<th>CON_EstadoResultados_Impuesto</th>
				<th>CON_EstadoResultados_UtilidadPerdidaFinal</th>
				<th>CON_EstadoResultados_FechaCreacion</th>
				<th>CON_EstadoResultados_FechaModificacion</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($EstadoResultados as $EstadoResultado)
				<tr>
					<td>{{{ $EstadoResultado->CON_PeriodoContable_ID }}}</td>
					<td>{{{ $EstadoResultado->CON_EstadoResultados_Ingresos }}}</td>
					<td>{{{ $EstadoResultado->CON_EstadosResultados_CostoVentas }}}</td>
					<td>{{{ $EstadoResultado->CON_EstadoResultados_UtilidadBruta }}}</td>
					<td>{{{ $EstadoResultado->CON_EstadoResultados_GastosdeVentas }}}</td>
					<td>{{{ $EstadoResultado->CON_EstadoResultados_GastosAdministrativos }}}</td>
					<td>{{{ $EstadoResultado->CON_EstadoResultados_UtilidadOperacion }}}</td>
					<td>{{{ $EstadoResultado->CON_EstadoResultados_GastoFinanciero }}}</td>
					<td>{{{ $EstadoResultado->CON_EstadoResultados_UtilidadAntesImpuesto }}}</td>
					<td>{{{ $EstadoResultado->CON_EstadoResultados_Impuesto }}}</td>
					<td>{{{ $EstadoResultado->CON_EstadoResultados_UtilidadPerdidaFinal }}}</td>
					<td>{{{ $EstadoResultado->CON_EstadoResultados_FechaCreacion }}}</td>
					<td>{{{ $EstadoResultado->CON_EstadoResultados_FechaModificacion }}}</td>
                   
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	No hay ningun estado de resultados
@endif

@stop
