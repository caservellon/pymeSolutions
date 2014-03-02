@extends('layouts.scaffold')

@section('main')

<h1>All PeriodoCierreDeCajas</h1>

<p>{{ link_to_route('PeriodoCierreDeCajas.create', 'Add new PeriodoCierreDeCaja') }}</p>

@if ($PeriodoCierreDeCajas->count())
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
			@foreach ($PeriodoCierreDeCajas as $PeriodoCierreDeCaja)
				<tr>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_id }}}</td>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_Codigo }}}</td>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_ValorHoras }}}</td>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_Estado }}}</td>
					<td>{{{ $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_HoraPartida }}}</td>
                    <td>{{ link_to_route('PeriodoCierreDeCajas.edit', 'Edit', array($PeriodoCierreDeCaja->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('PeriodoCierreDeCajas.destroy', $PeriodoCierreDeCaja->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no PeriodoCierreDeCajas
@endif

@stop
