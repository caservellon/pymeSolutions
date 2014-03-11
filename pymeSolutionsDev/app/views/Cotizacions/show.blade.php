@extends('layouts.scaffold')

@section('main')

<h1>Show Cotizacion</h1>

<p>{{ link_to_route('Cotizacions.index', 'Return to all Cotizacions') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>COM_Cotizacion_Idcotizacion</th>
				<th>COM_Cotizacion_Codigo</th>
				<th>COM_Cotizacion_FechaEmision</th>
				<th>COM_Cotizacion_FechaEntrega</th>
				<th>COM_Cotizacion_Activo</th>
				<th>COM_Cotizacion_Total</th>
				<th>COM_Cotizacion_Vigencia</th>
				<th>COM_Cotizacion_NumeroCotizacion</th>
				<th>COM_Cotizacion_FechaCreacion</th>
				<th>COM_Cotizacion_FechaModificacion</th>
				<th>COM_SolicitudCotizacion_idSolicitudCotizacion</th>
				<th>COM_Usuario_idUsuarioCreo</th>
				<th>COM_Proveedor_idProveedor</th>
				<th>Usuario_idUsuarioModifico</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $Cotizacion->COM_Cotizacion_Idcotizacion }}}</td>
					<td>{{{ $Cotizacion->COM_Cotizacion_Codigo }}}</td>
					<td>{{{ $Cotizacion->COM_Cotizacion_FechaEmision }}}</td>
					<td>{{{ $Cotizacion->COM_Cotizacion_FechaEntrega }}}</td>
					<td>{{{ $Cotizacion->COM_Cotizacion_Activo }}}</td>
					<td>{{{ $Cotizacion->COM_Cotizacion_Total }}}</td>
					<td>{{{ $Cotizacion->COM_Cotizacion_Vigencia }}}</td>
					<td>{{{ $Cotizacion->COM_Cotizacion_NumeroCotizacion }}}</td>
					<td>{{{ $Cotizacion->COM_Cotizacion_FechaCreacion }}}</td>
					<td>{{{ $Cotizacion->COM_Cotizacion_FechaModificacion }}}</td>
					<td>{{{ $Cotizacion->COM_SolicitudCotizacion_idSolicitudCotizacion }}}</td>
					<td>{{{ $Cotizacion->COM_Usuario_idUsuarioCreo }}}</td>
					<td>{{{ $Cotizacion->COM_Proveedor_idProveedor }}}</td>
					<td>{{{ $Cotizacion->Usuario_idUsuarioModifico }}}</td>
                    <td>{{ link_to_route('Cotizacions.edit', 'Edit', array($Cotizacion->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('Cotizacions.destroy', $Cotizacion->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
