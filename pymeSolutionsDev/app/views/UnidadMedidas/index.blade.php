@extends('layouts.scaffold')

@section('main')

<h2><span class="glyphicon glyphicon-cog"></span> Configuración <small>Unidades Medidas</small></h2>

<p>{{ link_to_route('Inventario.UnidadMedidas.create', 'Crear Unidad Medida') }}</p>

@if ($UnidadMedidas->count())
	<table class="table table-striped table-bordered table-condensed table-responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Fecha Creacion</th>
				<th>UsuarioCreacion</th>
				<th>FechaModificacion</th>
				<th>UsuarioModificacion</th>
				<th>Activo</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($UnidadMedidas as $UnidadMedida)
				<tr>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_ID }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_Nombre }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_Descripcion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_FechaCreacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_UsuarioCreacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_FechaModificacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_UsuarioModificacion }}}</td>
					<td>{{{ ($UnidadMedida->INV_UnidadMedida_Activo ? 'Si' : 'No') }}}</td>
                    <td>{{ link_to_route('Inventario.UnidadMedidas.edit', '', array($UnidadMedida->INV_UnidadMedida_ID), array('class' => 'btn btn-info glyphicon glyphicon-pencil')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.UnidadMedidas.destroy', $UnidadMedida->INV_UnidadMedida_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no UnidadMedidas
@endif

@stop
