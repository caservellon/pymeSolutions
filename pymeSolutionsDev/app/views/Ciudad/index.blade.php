@extends('layouts.scaffold')

@section('main')

<h2><span class="glyphicon glyphicon-cog"></span> Configuración <small>Ciudad</small></h2>

<p>{{ link_to_route('Ciudad.create', 'Crear Ciudad') }}</p>

@if ($Ciudad->count())
	<table class="table table-striped table-bordered table-condensed table-responsive">
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
                    <td>{{ link_to_route('Ciudad.edit', '', array($Ciudad->INV_Ciudad_ID), array('class' => 'btn btn-info glyphicon glyphicon-pencil')) }}</td>
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
