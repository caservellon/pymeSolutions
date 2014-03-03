@extends('layouts.scaffold')

@section('main')

<h1>Show AperturaCaja</h1>

<p>{{ link_to_route('AperturaCajas.index', 'Return to all AperturaCajas') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>VEN_AperturaCaja_id</th>
				<th>VEN_AperturaCaja_Codigo</th>
				<th>VEN_Caja_VEN_Caja_id</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $AperturaCaja->VEN_AperturaCaja_id }}}</td>
					<td>{{{ $AperturaCaja->VEN_AperturaCaja_Codigo }}}</td>
					<td>{{{ $AperturaCaja->VEN_Caja_VEN_Caja_id }}}</td>
                    <td>{{ link_to_route('AperturaCajas.edit', 'Edit', array($AperturaCaja->VEN_AperturaCaja_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('AperturaCajas.destroy', $AperturaCaja->VEN_AperturaCaja_id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
