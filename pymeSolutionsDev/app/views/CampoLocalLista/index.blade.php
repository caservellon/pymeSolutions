@extends('layouts.scaffold')

@section('main')

<h1>All CampoLocalLista</h1>

<p>{{ link_to_route('CampoLocalLista.create', 'Add new CampoLocalListum') }}</p>

@if ($CampoLocalLista->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>GEN_CampoLocalLista_ID</th>
				<th>GEN_CampoLocalLista_Valor</th>
				<th>GEN_CampoLocal_GEN_CampoLocal_ID</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($CampoLocalLista as $CampoLocalListum)
				<tr>
					<td>{{{ $CampoLocalListum->GEN_CampoLocalLista_ID }}}</td>
					<td>{{{ $CampoLocalListum->GEN_CampoLocalLista_Valor }}}</td>
					<td>{{{ $CampoLocalListum->GEN_CampoLocal_GEN_CampoLocal_ID }}}</td>
                    <td>{{ link_to_route('CampoLocalLista.edit', 'Edit', array($CampoLocalListum->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('CampoLocalLista.destroy', $CampoLocalListum->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no CampoLocalLista
@endif

@stop
