@extends('layouts.scaffold')

@section('main')

<h1>Show MotivoMovimiento</h1>

<p>{{ link_to_route('MotivoMovimientos.index', 'Return to all MotivoMovimientos') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>INV_MotivoMovimiento_ID</th>
				<th>INV_MotivoMovimiento_Nombre</th>
				<th>INV_MotivoMovimiento_TipoMovimiento</th>
				<th>INV_MotivoMovimiento_Observaciones</th>
				<th>INV_MotivoMovimiento_FechaCreacion</th>
				<th>INV_MotivoMovimiento_UsuarioCreacion</th>
				<th>INV_MotivoMovimiento_FechaModificacion</th>
				<th>INV_MotivoMovimiento_UsuarioModificacion</th>
				<th>INV_MotivoMovimiento_Activo</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_ID }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_Nombre }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_TipoMovimiento }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_Observaciones }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_FechaCreacion }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_UsuarioCreacion }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_FechaModificacion }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_UsuarioModificacion }}}</td>
					<td>{{{ $MotivoMovimiento->INV_MotivoMovimiento_Activo }}}</td>
                    <td>{{ link_to_route('MotivoMovimientos.edit', 'Edit', array($MotivoMovimiento->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('MotivoMovimientos.destroy', $MotivoMovimiento->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
