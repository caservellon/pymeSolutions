@extends('layouts.scaffold')

@section('main')

<h1>All Categoria</h1>

<p>{{ link_to_route('Categoria.create', 'Add new Categoria') }}</p>

@if ($Categoria->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>INV_Categoria_ID</th>
				<th>INV_Categoria_Codigo</th>
				<th>INV_Categoria_Nombre</th>
				<th>INV_Categoria_Descripcion</th>
				<th>INV_Categoria_FechaCreacion</th>
				<th>INV_Categoria_UsuarioCreacion</th>
				<th>INV_Categoria_FechaModificacion</th>
				<th>INV_Categoria_UsuarioModificacion</th>
				<th>INV_Categoria_Activo</th>
				<th>INV_Categoria_IDCategoriaPadre</th>
				<th>INV_Categoria_HorarioDescuento_ID</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($Categoria as $Categoria)
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
			@endforeach
		</tbody>
	</table>
@else
	There are no Categoria
@endif

@stop
