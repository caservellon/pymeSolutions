@extends('layouts.scaffold')

@section('main')

<h1>All Ciudad</h1>

<p>{{ link_to_route('Ciudad.create', 'Add new Ciudad') }}</p>

@if ($Ciudad->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>INV_Ciudad_ID</th>
				<th>INV_Ciudad_Codigo</th>
				<th>INV_Ciudad_Nombre</th>
				<th>INV_Ciudad_FechaCreacion</th>
				<th>INV_Ciudad_UsuarioCreacion</th>
				<th>INV_Ciudad_FechaModificacion</th>
				<th>INV_Ciudad_UsuarioModificacion</th>
				<th>INV_Ciudad_Activo</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Ciudad as $Ciudad)
				<tr>
					<td>{{{ $Ciudad->INV_Ciudad_ID }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_Codigo }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_Nombre }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_FechaCreacion }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_UsuarioCreacion }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_FechaModificacion }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_UsuarioModificacion }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_Activo }}}</td>
                    <td>{{ link_to_route('Ciudad.edit', 'Edit', array($Ciudad->INV_Ciudad_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Ciudad.destroy', $Ciudad->INV_Ciudad_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no Ciudad
@endif

@stop
