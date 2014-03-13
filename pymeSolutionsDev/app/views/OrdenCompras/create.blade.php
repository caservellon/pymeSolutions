@extends('layouts.scaffold')

@section('main')

<h1>Create OrdenCompra</h1>

{{ Form::open(array('route' => 'OrdenCompras.store')) }}
	<ul>
        <li>
            {{ Form::label('COM_OrdenCompra_IdOrdenCompra', 'COM_OrdenCompra_IdOrdenCompra:') }}
            {{ Form::text('COM_OrdenCompra_IdOrdenCompra') }}
        </li>

        <li>
            {{ Form::label('COM_OrdenCompra_Codigo', 'COM_OrdenCompra_Codigo:') }}
            {{ Form::textarea('COM_OrdenCompra_Codigo') }}
        </li>

        <li>
            {{ Form::label('COM_OrdenCompra_FechaEmision', 'COM_OrdenCompra_FechaEmision:') }}
            {{ Form::text('COM_OrdenCompra_FechaEmision') }}
        </li>

        <li>
            {{ Form::label('COM_OrdenCompra_FechaEntrega', 'COM_OrdenCompra_FechaEntrega:') }}
            {{ Form::text('COM_OrdenCompra_FechaEntrega') }}
        </li>

        <li>
            {{ Form::label('COM_OrdenCompra_DireccionEntrega', 'COM_OrdenCompra_DireccionEntrega:') }}
            {{ Form::text('COM_OrdenCompra_DireccionEntrega') }}
        </li>

        <li>
            {{ Form::label('COM_OrdenCompra_Activo', 'COM_OrdenCompra_Activo:') }}
            {{ Form::text('COM_OrdenCompra_Activo') }}
        </li>

        <li>
            {{ Form::label('COM_OrdenCompra_Total', 'COM_OrdenCompra_Total:') }}
            {{ Form::text('COM_OrdenCompra_Total') }}
        </li>

        <li>
            {{ Form::label('COM_OrdenCompra_FechaCreacion', 'COM_OrdenCompra_FechaCreacion:') }}
            {{ Form::text('COM_OrdenCompra_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('COM_OrdenCompra_FechaModificacion', 'COM_OrdenCompra_FechaModificacion:') }}
            {{ Form::text('COM_OrdenCompra_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('COM_Cotizacion_IdCotizacion', 'COM_Cotizacion_IdCotizacion:') }}
            {{ Form::text('COM_Cotizacion_IdCotizacion') }}
        </li>

        <li>
            {{ Form::label('COM_Usuario_IdUsuarioCreo', 'COM_Usuario_IdUsuarioCreo:') }}
            {{ Form::text('COM_Usuario_IdUsuarioCreo') }}
        </li>

        <li>
            {{ Form::label('COM_Proveedor_IdProveedor', 'COM_Proveedor_IdProveedor:') }}
            {{ Form::text('COM_Proveedor_IdProveedor') }}
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


