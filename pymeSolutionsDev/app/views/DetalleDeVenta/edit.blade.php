@extends('layouts.scaffold')

@section('main')

<h1>Edit DetalleDeVentum</h1>
{{ Form::model($DetalleDeVentum, array('method' => 'PATCH', 'route' => array('DetalleDeVenta.update', $DetalleDeVentum->VEN_DetalleDeVenta_id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('DetalleDeVenta.show', 'Cancel', $DetalleDeVentum->VEN_DetalleDeVenta_id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
