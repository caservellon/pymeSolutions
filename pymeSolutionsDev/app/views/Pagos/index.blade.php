@extends('layouts.scaffold')

@section('main')

<h1>All Pagos</h1>

<p>{{ link_to_route('Pagos.create', 'Add new Pago') }}</p>

@if ($Pagos->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>VEN_Pago_ID</th>
				<th>VEN_Pago_Cantidad</th>
				<th>VEN_Venta_VEN_Venta_id</th>
				<th>VEN_Venta_VEN_Caja_VEN_Caja_id</th>
				<th>VEN_FormaPago_VEN_FormaPago_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Pagos as $Pago)
				<tr>
					<td>{{{ $Pago->VEN_Pago_ID }}}</td>
					<td>{{{ $Pago->VEN_Pago_Cantidad }}}</td>
					<td>{{{ $Pago->VEN_Venta_VEN_Venta_id }}}</td>
					<td>{{{ $Pago->VEN_Venta_VEN_Caja_VEN_Caja_id }}}</td>
					<td>{{{ $Pago->VEN_FormaPago_VEN_FormaPago_id }}}</td>
                    <td>{{ link_to_route('Pagos.edit', 'Edit', array($Pago->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Pagos.destroy', $Pago->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no Pagos
@endif

@stop
