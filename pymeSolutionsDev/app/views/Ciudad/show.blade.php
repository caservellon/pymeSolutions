@extends('layouts.scaffold')

@section('main')

<h2>Ciudad <small>Editada</small></h2>

<p>{{ link_to_route('Ciudad.index', 'Regresar a Ciudades') }}</p>

<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<th>ID</th>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Fecha Creacion</th>
			<th>Usuario Creacion</th>
			<th>Fecha Modificacion</th>
			<th>Usuario Modificacion</th>
			<th>Activo</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Ciudad->INV_Ciudad_ID }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_Codigo }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_Nombre }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_FechaCreacion }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_UsuarioCreacion }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_FechaModificacion }}}</td>
					<td>{{{ $Ciudad->INV_Ciudad_UsuarioModificacion }}}</td>
					<td>{{{ ($Ciudad->INV_Ciudad_Activo ? 'Si' : 'No') }}}</td>
                    <td>{{ link_to_route('Ciudad.edit', 'Edit', array($Ciudad->INV_Ciudad_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Ciudad.destroy', $Ciudad->INV_Ciudad_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
