@extends('layouts.scaffold')

@section('main')

<h1>All CierreCajas</h1>

<p>{{ link_to_route('CierreCajas.create', 'Add new CierreCaja') }}</p>

@if ($CierreCajas->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>VEN_CierreCaja_id</th>
				<th>VEN_CierreCaja_TotalVentas</th>
				<th>VEN_CierreCaja_SaldoInicial</th>
				<th>VEN_Caja_VEN_Caja_id</th>
				<th>VEN_AperturaCaja_VEN_AperturaCaja_id</th>
				<th>VEN_AperturaCaja_VEN_Caja_VEN_Caja_id</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($CierreCajas as $CierreCaja)
				<tr>
					<td>{{{ $CierreCaja->VEN_CierreCaja_id }}}</td>
					<td>{{{ $CierreCaja->VEN_CierreCaja_TotalVentas }}}</td>
					<td>{{{ $CierreCaja->VEN_CierreCaja_SaldoInicial }}}</td>
					<td>{{{ $CierreCaja->VEN_Caja_VEN_Caja_id }}}</td>
					<td>{{{ $CierreCaja->VEN_AperturaCaja_VEN_AperturaCaja_id }}}</td>
					<td>{{{ $CierreCaja->VEN_AperturaCaja_VEN_Caja_VEN_Caja_id }}}</td>
                    <td>{{ link_to_route('CierreCajas.edit', 'Edit', array($CierreCaja->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('CierreCajas.destroy', $CierreCaja->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no CierreCajas
@endif

@stop
