@extends('layouts.scaffold')

@section('main')

<h1>All Cajas</h1>

<p>{{ link_to_route('Cajas.create', 'Add new Caja') }}</p>

@if ($Cajas->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>VEN_Caja_id</th>
				<th>VEN_Caja_Codigo</th>
				<th>VEN_Caja_Numero</th>
				<th>VEN_Caja_Estado</th>
				<th>VEN_Caja_SaldoInicial</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Cajas as $Caja)
				<tr>
					<td>{{{ $Caja->VEN_Caja_id }}}</td>
					<td>{{{ $Caja->VEN_Caja_Codigo }}}</td>
					<td>{{{ $Caja->VEN_Caja_Numero }}}</td>
					<td>{{{ $Caja->VEN_Caja_Estado }}}</td>
					<td>{{{ $Caja->VEN_Caja_SaldoInicial }}}</td>
                    <td>{{ link_to_route('Cajas.edit', 'Edit', array($Caja->VEN_Caja_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Cajas.destroy', $Caja->VEN_Caja_id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no Cajas
@endif

@stop
