@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header"><span class="glyphicon glyphicon-usd"></span> Contabilidad <small>Motivo de Transaccion</small></h2>

@if ($MotivoTransaccions->count())
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Codigo de la Transaccion</th>
					<th> Nombre y Descripcion de la Transaccion</th>
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
	</div>
@else
	There are no MotivoTransaccions
@endif

@stop
