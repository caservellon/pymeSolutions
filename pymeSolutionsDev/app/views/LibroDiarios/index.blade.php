@extends('layouts.scaffold')

@section('main')

<h1>Libro Diario</h1>


@if ($LibroDiarios->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>CON_LibroDiario_Observacion</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($LibroDiarios as $LibroDiario)
				<tr>
					<td>{{{ $LibroDiario->CON_LibroDiario_Observacion }}}</td>
                    <td>{{ link_to_route('LibroDiarios.edit', 'Edit', array($LibroDiario->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('LibroDiarios.destroy', $LibroDiario->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no LibroDiarios
@endif

@stop
