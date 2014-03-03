@extends('layouts.scaffold')

@section('main')

<h1>All Venta</h1>

<p>{{ link_to_route('Ventas.create', 'Add new Ventas') }}</p>

@if ($Venta->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>VEN_Venta_id</th>
				<th>VEN_Venta_Codigo</th>
				<th>VEN_Venta_DescuentoCliente</th>
				<th>VEN_Venta_TotalDescuentoProductos</th>
				<th>VEN_Venta_ISV</th>
				<th>VEN_Venta_Subtotal</th>
				<th>VEN_Venta_Total</th>
				<th>VEN_Venta_TotalCambio</th>
				<th>VEN_FormaPago_VEN_FormaPago_id</th>
				<th>VEN_Caja_VEN_Caja_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Venta as $Ventas)
				<tr>
					<td>{{{ $Ventas->VEN_Venta_id }}}</td>
					<td>{{{ $Ventas->VEN_Venta_Codigo }}}</td>
					<td>{{{ $Ventas->VEN_Venta_DescuentoCliente }}}</td>
					<td>{{{ $Ventas->VEN_Venta_TotalDescuentoProductos }}}</td>
					<td>{{{ $Ventas->VEN_Venta_ISV }}}</td>
					<td>{{{ $Ventas->VEN_Venta_Subtotal }}}</td>
					<td>{{{ $Ventas->VEN_Venta_Total }}}</td>
					<td>{{{ $Ventas->VEN_Venta_TotalCambio }}}</td>
					<td>{{{ $Ventas->VEN_FormaPago_VEN_FormaPago_id }}}</td>
					<td>{{{ $Ventas->VEN_Caja_VEN_Caja_id }}}</td>
                    <td>{{ link_to_route('Ventas.edit', 'Edit', array($Ventas->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Ventas.destroy', $Ventas->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no Venta
@endif

@stop
