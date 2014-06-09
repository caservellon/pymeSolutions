@extends('layouts.scaffold')

@section('main')

<h1>Lista de Balanzas Generales</h1>


@if ($BalanceGenerals->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>CON_PeriodoContable_ID</th>
				<th>CON_BalanceGeneral_TotalActivosC</th>
				<th>CON_BalanceGeneral_TotalPasivosC</th>
				<th>CON_BalanceGeneral_TotalActivosNC</th>
				<th>CON_BalanceGeneral_TotalPasivosNC</th>
				<th>CON_BalanceGeneral_CapitalFinal</th>
				<th>CON_BalanceGeneral</th>
				<th>CON_BalanceGeneral_FechaModificacion</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($BalanceGenerals as $BalanceGeneral)
				<tr>
					<td>{{{ $BalanceGeneral->CON_PeriodoContable_ID }}}</td>
					<td>{{{ $BalanceGeneral->CON_BalanceGeneral_TotalActivosC }}}</td>
					<td>{{{ $BalanceGeneral->CON_BalanceGeneral_TotalPasivosC }}}</td>
					<td>{{{ $BalanceGeneral->CON_BalanceGeneral_TotalActivosNC }}}</td>
					<td>{{{ $BalanceGeneral->CON_BalanceGeneral_TotalPasivosNC }}}</td>
					<td>{{{ $BalanceGeneral->CON_BalanceGeneral_CapitalFinal }}}</td>
					<td>{{{ $BalanceGeneral->CON_BalanceGeneral }}}</td>
					<td>{{{ $BalanceGeneral->CON_BalanceGeneral_FechaModificacion }}}</td>
                   
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	No hay ningun Balance General
@endif

@stop
