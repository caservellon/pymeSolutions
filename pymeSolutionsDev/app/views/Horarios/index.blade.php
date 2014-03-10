@extends('layouts.scaffold')

@section('main')


<h2 class="sub-header">Horarios</h2>
<div class="btn-agregar">
	<a type="button" href="{{ URL::route('Inventario.Horarios.create') }}" class="btn btn-default">
	  <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Horario
	</a>
</div>

@if ($Horarios->count())

	<div class="table-responsive">
      <table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Nombre</th>
				<th>Tipo</th>
				<th>Fecha Inicio</th>
				<th>Fecha Final</th>
				<th>Fecha Creacion</th>
				<th>Usuario Creacion</th>
				<th>Fecha Modificacion</th>
				<th>Usuario Modificacion</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($Horarios as $Horario)
				<tr>
					<td>{{{ $Horario->INV_Horario_ID }}}</td>
					<td>{{{ $Horario->INV_Horario_Nombre }}}</td>
					<td>{{{ $Horario->INV_Horario_Tipo }}}</td>
					<td>{{{ $Horario->INV_Horario_FechaInicio }}}</td>
					<td>{{{ $Horario->INV_Horario_FechaFinal }}}</td>
					<td>{{{ $Horario->INV_Horario_FechaCreacion }}}</td>
					<td>{{{ $Horario->INV_Horario_UsuarioCreacion }}}</td>
					<td>{{{ $Horario->INV_Horario_FechaModificacion }}}</td>
					<td>{{{ $Horario->INV_Horario_UsuarioModificacion }}}</td>
                    <td>{{ link_to_route('Inventario.Horarios.edit', 'Edit', array($Horario->INV_Horario_ID), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Horarios.destroy', $Horario->INV_Horario_ID))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	  </table>
	</div>
@else
	<div class="alert alert-danger">
      <strong>Oh no!</strong> No hay horarios disponibles :(
    </div>
@endif

@stop
