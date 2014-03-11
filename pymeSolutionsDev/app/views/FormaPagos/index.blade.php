@extends('layouts.scaffold')

@section('main')

<h1>All FormaPagos</h1>

<p>{{ link_to_route('FormaPagos.create', 'Add new FormaPago') }}</p>

@if ($FormaPagos->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>VEN_FormaPago_id</th>
				<th>VEN_FormaPago_Descripcion</th>
				<th>VEN_FormaPago_Codigo</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($FormaPagos as $FormaPago)
				<tr>
					<td>{{{ $FormaPago->VEN_FormaPago_id }}}</td>
					<td>{{{ $FormaPago->VEN_FormaPago_Descripcion }}}</td>
					<td>{{{ $FormaPago->VEN_FormaPago_Codigo }}}</td>
                    <td>{{ link_to_route('FormaPagos.edit', 'Edit', array($FormaPago->VEN_FormaPago_id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('FormaPagos.destroy', $FormaPago->VEN_FormaPago_id))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no FormaPagos
@endif

@stop
