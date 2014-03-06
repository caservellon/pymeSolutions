@extends('layouts.scaffold')

@section('main')

<h2><span class="glyphicon glyphicon-cog"></span> Configuración <small>Atributos<small></h2> 

<p>{{ link_to_route('Inventario.Atributos.create', 'Crear Atributo') }}</p> 

@if ($Atributos->count())
	<table class="table table-striped table-bordered table-condensed table-responsive">
		<thead>
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
			@foreach ($Atributos as $Atributo)
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
                    <td>{{ link_to_route('Inventario.Atributos.edit', '', array($Atributo->INV_Atributo_ID), array('class' => 'btn btn-info glyphicon glyphicon-pencil')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Atributos.destroy', $Atributo->INV_Atributo_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger glyphicon glyphicon-trash')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no Atributos
@endif

@stop
