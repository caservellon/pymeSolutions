@extends('layouts.scaffold')

@section('main')

<h2><span class="glyphicon glyphicon-cog"></span> Configuración <small>Categoria<small></h2>

<p>{{ link_to_route('Categoria.create', 'Crear Categoria') }}</p>

@if ($Categoria->count())
	<table class="table table-striped table-bordered table-condensed table-responsive">
		<thead>
			<tr>
				<th>ID</th>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>FechaCreacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
				<th>Activo</th>
				<th>IDCategoriaPadre</th>
				<th>HorarioDescuento ID</th>
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
					<td>{{{ ($Categoria->INV_Categoria_Activo ? 'Si' : 'No') }}}</td>
					<td>{{{ $Categoria->INV_Categoria_IDCategoriaPadre }}}</td>
					<td>{{{ $Categoria->INV_Categoria_HorarioDescuento_ID }}}</td>
                    <td>{{ link_to_route('Categoria.edit', '', array($Categoria->INV_Categoria_ID), array('class' => 'btn btn-info glyphicon glyphicon-pencil')) }}</td>
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
