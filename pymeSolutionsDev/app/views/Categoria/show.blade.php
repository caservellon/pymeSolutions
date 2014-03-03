@extends('layouts.scaffold')

@section('main')

<h1>Show Categoria</h1>

<p>{{ link_to_route('Categoria.index', 'Return to all Categoria') }}</p>

<table class="table table-striped table-bordered table-condensed">
	<thead>
		<tr>
			<th>ID</th>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>FechaCreacion</th>
			<th>UsuarioCreacion</th>
			<th>FechaModificacion</th>
			<th>UsuarioModificacion</th>
			<th>Activo</th>
			<th>IDCategoriaPadre</th>
			<th>HorarioDescuento_ID</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Categoria->INV_Categoria_ID }}}</td>
					<td>{{{ $Categoria->INV_Categoria_Codigo }}}</td>
					<td>{{{ $Categoria->INV_Categoria_Nombre }}}</td>
					<td>{{{ $Categoria->INV_Categoria_Descripcion }}}</td>
					<td>{{{ $Categoria->INV_Categoria_FechaCreacion }}}</td>
					<td>{{{ $Categoria->INV_Categoria_UsuarioCreacion }}}</td>
					<td>{{{ $Categoria->INV_Categoria_FechaModificacion }}}</td>
					<td>{{{ $Categoria->INV_Categoria_UsuarioModificacion }}}</td>
					<td>{{{ $Categoria->INV_Categoria_Activo }}}</td>
					<td>{{{ $Categoria->INV_Categoria_IDCategoriaPadre }}}</td>
					<td>{{{ $Categoria->INV_Categoria_HorarioDescuento_ID }}}</td>
                    <td>{{ link_to_route('Categoria.edit', 'Edit', array($Categoria->INV_Categoria_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Categoria.destroy', $Categoria->INV_Categoria_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
