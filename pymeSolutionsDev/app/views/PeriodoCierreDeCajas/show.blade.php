@extends('layouts.scaffold')

@section('main')

<h1>Show PeriodoCierreDeCaja</h1>

<p>{{ link_to_route('Ventas.PeriodoCierreDeCajas.index', 'Return to all PeriodoCierreDeCajas') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>VEN_PeriodoCierreDeCaja_id</th>
				<th>VEN_PeriodoCierreDeCaja_Codigo</th>
				<th>VEN_PeriodoCierreDeCaja_ValorHoras</th>
				<th>VEN_PeriodoCierreDeCaja_Estado</th>
				<th>VEN_PeriodoCierreDeCaja_HoraPartida</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_id }}}</td>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_Codigo }}}</td>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_ValorHoras }}}</td>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_Estado }}}</td>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_HoraPartida }}}</td>
                    <td>{{ link_to_route('Ventas.PeriodoCierreDeCajas.edit', 'Edit', array($PeriodoCierreDeCaja->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Ventas.PeriodoCierreDeCajas.destroy', $PeriodoCierreDeCaja->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
