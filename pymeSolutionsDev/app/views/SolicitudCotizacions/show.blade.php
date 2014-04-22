@extends('layouts.scaffold')

@section('main')

<h1>Show SolicitudCotizacion</h1>

<p>{{ link_to_route('SolicitudCotizacions.index', 'Return to all SolicitudCotizacions') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>COM_SolicitudCotizacion_IdSolicitudCotizacion</th>
				<th>COM_SolicitudCotizacion_Codigo</th>
				<th>COM_SolicitudCotizacion_FechaEmision</th>
				<th>COM_SolicitudCotizacion_FechaEntrega</th>
				<th>COM_SolicitudCotizacion_DireccionEntrega</th>
				<th>COM_SolicitudCotizacion_Recibido</th>
				<th>COM_SolicitudCotizacion_Activo</th>
				<th>COM_SolicitudCotizacion_FechaCreacion</th>
				<th>COM_SolicitudCotizacio_FechaModificacion</th>
				<th>COM_Usuario_idUsuarioCreo</th>
				<th>Proveedor_idProveedor</th>
				<th>Usuario_idUsuarioModifico</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $SolicitudCotizacion->COM_SolicitudCotizacion_IdSolicitudCotizacion }}}</td>
					<td>{{{ $SolicitudCotizacion->COM_SolicitudCotizacion_Codigo }}}</td>
					<td>{{{ $SolicitudCotizacion->COM_SolicitudCotizacion_FechaEmision }}}</td>
					<td>{{{ $SolicitudCotizacion->COM_SolicitudCotizacion_FechaEntrega }}}</td>
					<td>{{{ $SolicitudCotizacion->COM_SolicitudCotizacion_DireccionEntrega }}}</td>
					<td>{{{ $SolicitudCotizacion->COM_SolicitudCotizacion_Recibido }}}</td>
					<td>{{{ $SolicitudCotizacion->COM_SolicitudCotizacion_Activo }}}</td>
					<td>{{{ $SolicitudCotizacion->COM_SolicitudCotizacion_FechaCreacion }}}</td>
					<td>{{{ $SolicitudCotizacion->COM_SolicitudCotizacio_FechaModificacion }}}</td>
					<td>{{{ $SolicitudCotizacion->COM_Usuario_idUsuarioCreo }}}</td>
					<td>{{{ $SolicitudCotizacion->Proveedor_idProveedor }}}</td>
					<td>{{{ $SolicitudCotizacion->Usuario_idUsuarioModifico }}}</td>
                    <td>{{ link_to_route('SolicitudCotizacions.edit', 'Edit', array($SolicitudCotizacion->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('SolicitudCotizacions.destroy', $SolicitudCotizacion->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
