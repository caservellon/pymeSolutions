@extends('layouts.scaffold')

@section('main')

<h1>Create SolicitudCotizacion</h1>

{{ Form::open(array('route' => 'SolicitudCotizacions.store')) }}
	<ul>
        <li>
            {{ Form::label('COM_SolicitudCotizacion_IdSolicitudCotizacion', 'COM_SolicitudCotizacion_IdSolicitudCotizacion:') }}
            {{ Form::text('COM_SolicitudCotizacion_IdSolicitudCotizacion') }}
        </li>

        <li>
            {{ Form::label('COM_SolicitudCotizacion_Codigo', 'COM_SolicitudCotizacion_Codigo:') }}
            {{ Form::text('COM_SolicitudCotizacion_Codigo') }}
        </li>

        <li>
            {{ Form::label('COM_SolicitudCotizacion_FechaEmision', 'COM_SolicitudCotizacion_FechaEmision:') }}
            {{ Form::text('COM_SolicitudCotizacion_FechaEmision') }}
        </li>

        <li>
            {{ Form::label('COM_SolicitudCotizacion_FechaEntrega', 'COM_SolicitudCotizacion_FechaEntrega:') }}
            {{ Form::text('COM_SolicitudCotizacion_FechaEntrega') }}
        </li>

        <li>
            {{ Form::label('COM_SolicitudCotizacion_DireccionEntrega', 'COM_SolicitudCotizacion_DireccionEntrega:') }}
            {{ Form::text('COM_SolicitudCotizacion_DireccionEntrega') }}
        </li>

        <li>
            {{ Form::label('COM_SolicitudCotizacion_Recibido', 'COM_SolicitudCotizacion_Recibido:') }}
            {{ Form::text('COM_SolicitudCotizacion_Recibido') }}
        </li>

        <li>
            {{ Form::label('COM_SolicitudCotizacion_Activo', 'COM_SolicitudCotizacion_Activo:') }}
            {{ Form::text('COM_SolicitudCotizacion_Activo') }}
        </li>

        <li>
            {{ Form::label('COM_SolicitudCotizacion_FechaCreacion', 'COM_SolicitudCotizacion_FechaCreacion:') }}
            {{ Form::text('COM_SolicitudCotizacion_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('COM_SolicitudCotizacio_FechaModificacion', 'COM_SolicitudCotizacio_FechaModificacion:') }}
            {{ Form::text('COM_SolicitudCotizacio_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('COM_Usuario_idUsuarioCreo', 'COM_Usuario_idUsuarioCreo:') }}
            {{ Form::text('COM_Usuario_idUsuarioCreo') }}
        </li>

        <li>
            {{ Form::label('Proveedor_idProveedor', 'Proveedor_idProveedor:') }}
            {{ Form::text('Proveedor_idProveedor') }}
        </li>

        <li>
            {{ Form::label('Usuario_idUsuarioModifico', 'Usuario_idUsuarioModifico:') }}
            {{ Form::text('Usuario_idUsuarioModifico') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


