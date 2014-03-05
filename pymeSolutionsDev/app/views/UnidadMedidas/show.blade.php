@extends('layouts.scaffold')

@section('main')

<h2>Unidades Medida <small>Editada</small></h2>

<p>{{ link_to_route('UnidadMedidas.index', 'Regresar a Unidades Medidas') }}</p>

<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Fecha Creacion</th>
			<th>UsuarioCreacion</th>
			<th>FechaModificacion</th>
			<th>UsuarioModificacion</th>
			<th>Activo</th>Activo</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $UnidadMedida->INV_UnidadMedida_ID }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_Nombre }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_Descripcion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_FechaCreacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_UsuarioCreacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_FechaModificacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_UsuarioModificacion }}}</td>
					<td>{{{ $UnidadMedida->INV_UnidadMedida_Activo }}}</td>
                    <td>{{ link_to_route('UnidadMedidas.edit', 'Edit', array($UnidadMedida->INV_UnidadMedida_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('UnidadMedidas.destroy', $UnidadMedida->INV_UnidadMedida_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
