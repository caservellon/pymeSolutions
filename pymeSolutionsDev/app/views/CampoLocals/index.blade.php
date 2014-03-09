@extends('layouts.scaffold')

@section('main')

<h1>All CampoLocals</h1>

<p>{{ link_to_route('CampoLocals.create', 'Add new CampoLocal') }}</p>

@if ($CampoLocals->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>GEN_CampoLocal_ID</th>
				<th>GEN_CampoLocal_Codigo</th>
				<th>GEN_CampoLocal_Activo</th>
				<th>GEN_CampoLocal_Nombre</th>
				<th>GEN_CampoLocal_Tipo</th>
				<th>GEN_CampoLocal_Requerido</th>
				<th>GEN_CampoLocal_ParametroBusqueda</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($CampoLocals as $CampoLocal)
				<tr>
					<td>{{{ $CampoLocal->GEN_CampoLocal_ID }}}</td>
					<td>{{{ $CampoLocal->GEN_CampoLocal_Codigo }}}</td>
					<td>{{{ $CampoLocal->GEN_CampoLocal_Activo }}}</td>
					<td>{{{ $CampoLocal->GEN_CampoLocal_Nombre }}}</td>
					<td>{{{ $CampoLocal->GEN_CampoLocal_Tipo }}}</td>
					<td>{{{ $CampoLocal->GEN_CampoLocal_Requerido }}}</td>
					<td>{{{ $CampoLocal->GEN_CampoLocal_ParametroBusqueda }}}</td>
                    <td>{{ link_to_route('CampoLocals.edit', 'Edit', array($CampoLocal->GEN_CampoLocal_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('CampoLocals.destroy', $CampoLocal->GEN_CampoLocal_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no CampoLocals
@endif

@stop
