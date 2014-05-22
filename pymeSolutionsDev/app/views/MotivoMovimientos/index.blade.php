@extends('layouts.scaffold')

@section('main')

<h2 class="sub-header"><span class="glyphicon glyphicon-cog"></span> Configuración <small>Concepto Movimiento de Inventario<small></h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Inventario.MotivoMovimiento.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Nuevo Concepto
	</a>
</div>

@if ($MotivoMovimientos->count())
	<div class="table-responsive">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Tipo Movimiento</th>
				<th>Observaciones</th>
				<th>Fecha Creacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
				<th>Activo</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($MotivoMovimientos as $MotivoMovimiento)
				<tr>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_ID }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_Nombre }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_TipoMovimiento ? 'Salida' : 'Entrada' }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_Observaciones }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_FechaCreacion }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_UsuarioCreacion }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_FechaModificacion }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_UsuarioModificacion }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_Activo ? 'Activo' : 'Inactivo' }}}</td>
                    <td>{{ link_to_route('Inventario.MotivoMovimiento.edit', 'Editar', array($MotivoMovimiento->INV_MotivoMovimiento_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.MotivoMovimiento.destroy', $MotivoMovimiento->INV_MotivoMovimiento_ID))) }}
                            {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
	</div>
@else
	<div class="alert alert-danger">
		<h3>No Hay Conceptos de Movimiento</h3>
	</div>
@endif

@stop
