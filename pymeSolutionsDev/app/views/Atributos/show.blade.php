@extends('layouts.scaffold')

@section('main')

<h2>Atributo <small>Editado<small></h2>

<p>{{ link_to_route('Atributos.index', 'Regresar a los Atributos') }}</p>

<table class="table table-striped table-bordered table condensed">
	<thead>
		<tr>
			<tr>
				<th>ID</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>TipoDato</th>
				<th>Fecha Creacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
				<th>Activo</th>
			</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Atributo->INV_Atributo_ID }}}</td>
					<td>{{{ $Atributo->INV_Atributo_Codigo }}}</td>
					<td>{{{ $Atributo->INV_Atributo_Nombre }}}</td>
					<td>{{{ $Atributo->INV_Atributo_TipoDato }}}</td>
					<td>{{{ $Atributo->INV_Atributo_FechaCreacion }}}</td>
					<td>{{{ $Atributo->INV_Atributo_UsuarioCreacion }}}</td>
					<td>{{{ $Atributo->INV_Atributo_FechaModificacion }}}</td>
					<td>{{{ $Atributo->INV_Atributo_UsuarioModificacion }}}</td>
					<td>{{{ ($Atributo->INV_Atributo_Activo ? 'Si' : 'No') }}}</td>
                    <td>{{ link_to_route('Atributos.edit', 'Edit', array($Atributo->INV_Atributo_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Atributos.destroy', $Atributo->INV_Atributo_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
