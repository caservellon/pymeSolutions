@extends('layouts.scaffold')

@section('main')

<h1>Create DetalleDeVentum</h1>

{{ Form::open(array('route' => 'DetalleDeVenta.store')) }}
	<ul>
        <li>
            {{ Form::label('VEN_DetalleDeVenta_id', 'VEN_DetalleDeVenta_id:') }}
            {{ Form::text('VEN_DetalleDeVenta_id') }}
        </li>

        <li>
            {{ Form::label('VEN_DetalleDeVenta_CantidadVendida', 'VEN_DetalleDeVenta_CantidadVendida:') }}
            {{ Form::text('VEN_DetalleDeVenta_CantidadVendida') }}
        </li>

        <li>
            {{ Form::label('VEN_DetalleDeVenta_PrecioVenta', 'VEN_DetalleDeVenta_PrecioVenta:') }}
            {{ Form::text('VEN_DetalleDeVenta_PrecioVenta') }}
        </li>

        <li>
            {{ Form::label('VEN_Venta_VEN_Venta_id', 'VEN_Venta_VEN_Venta_id:') }}
            {{ Form::text('VEN_Venta_VEN_Venta_id') }}
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


