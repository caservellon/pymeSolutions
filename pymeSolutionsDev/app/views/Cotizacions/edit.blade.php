@extends('layouts.scaffold')

@section('main')

<h1>Edit Cotizacion</h1>
{{ Form::model($Cotizacion, array('method' => 'PATCH', 'route' => array('Cotizacions.update', $Cotizacion->id))) }}
	<ul>
        <li>
            {{ Form::label('COM_Cotizacion_Idcotizacion', 'COM_Cotizacion_Idcotizacion:') }}
            {{ Form::text('COM_Cotizacion_Idcotizacion') }}
        </li>

        <li>
            {{ Form::label('COM_Cotizacion_Codigo', 'COM_Cotizacion_Codigo:') }}
            {{ Form::text('COM_Cotizacion_Codigo') }}
        </li>

        <li>
            {{ Form::label('COM_Cotizacion_FechaEmision', 'COM_Cotizacion_FechaEmision:') }}
            {{ Form::text('COM_Cotizacion_FechaEmision') }}
        </li>

        <li>
            {{ Form::label('COM_Cotizacion_FechaEntrega', 'COM_Cotizacion_FechaEntrega:') }}
            {{ Form::text('COM_Cotizacion_FechaEntrega') }}
        </li>

        <li>
            {{ Form::label('COM_Cotizacion_Activo', 'COM_Cotizacion_Activo:') }}
            {{ Form::checkbox('COM_Cotizacion_Activo') }}
        </li>

        <li>
            {{ Form::label('COM_Cotizacion_Total', 'COM_Cotizacion_Total:') }}
            {{ Form::text('COM_Cotizacion_Total') }}
        </li>

        <li>
            {{ Form::label('COM_Cotizacion_Vigencia', 'COM_Cotizacion_Vigencia:') }}
            {{ Form::text('COM_Cotizacion_Vigencia') }}
        </li>

        <li>
            {{ Form::label('COM_Cotizacion_NumeroCotizacion', 'COM_Cotizacion_NumeroCotizacion:') }}
            {{ Form::text('COM_Cotizacion_NumeroCotizacion') }}
        </li>

        <li>
            {{ Form::label('COM_Cotizacion_FechaCreacion', 'COM_Cotizacion_FechaCreacion:') }}
            {{ Form::text('COM_Cotizacion_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('COM_Cotizacion_FechaModificacion', 'COM_Cotizacion_FechaModificacion:') }}
            {{ Form::text('COM_Cotizacion_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('COM_SolicitudCotizacion_idSolicitudCotizacion', 'COM_SolicitudCotizacion_idSolicitudCotizacion:') }}
            {{ Form::text('COM_SolicitudCotizacion_idSolicitudCotizacion') }}
        </li>

        <li>
            {{ Form::label('COM_Usuario_idUsuarioCreo', 'COM_Usuario_idUsuarioCreo:') }}
            {{ Form::text('COM_Usuario_idUsuarioCreo') }}
        </li>

        <li>
            {{ Form::label('COM_Proveedor_idProveedor', 'COM_Proveedor_idProveedor:') }}
            {{ Form::text('COM_Proveedor_idProveedor') }}
        </li>

        <li>
            {{ Form::label('Usuario_idUsuarioModifico', 'Usuario_idUsuarioModifico:') }}
            {{ Form::text('Usuario_idUsuarioModifico') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Cotizacions.show', 'Cancel', $Cotizacion->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
