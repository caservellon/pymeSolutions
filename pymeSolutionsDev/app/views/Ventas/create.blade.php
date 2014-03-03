@extends('layouts.scaffold')

@section('main')

<h1>Create Venta</h1>

{{ Form::open(array('route' => 'Ventas.store')) }}
	<ul>
        <li>
            {{ Form::label('VEN_Venta_id', 'VEN_Venta_id:') }}
            {{ Form::text('VEN_Venta_id') }}
        </li>

        <li>
            {{ Form::label('VEN_Venta_Codigo', 'VEN_Venta_Codigo:') }}
            {{ Form::text('VEN_Venta_Codigo') }}
        </li>

        <li>
            {{ Form::label('VEN_Venta_DescuentoCliente', 'VEN_Venta_DescuentoCliente:') }}
            {{ Form::text('VEN_Venta_DescuentoCliente') }}
        </li>

        <li>
            {{ Form::label('VEN_Venta_TotalDescuentoProductos', 'VEN_Venta_TotalDescuentoProductos:') }}
            {{ Form::text('VEN_Venta_TotalDescuentoProductos') }}
        </li>

        <li>
            {{ Form::label('VEN_Venta_ISV', 'VEN_Venta_ISV:') }}
            {{ Form::text('VEN_Venta_ISV') }}
        </li>

        <li>
            {{ Form::label('VEN_Venta_Subtotal', 'VEN_Venta_Subtotal:') }}
            {{ Form::text('VEN_Venta_Subtotal') }}
        </li>

        <li>
            {{ Form::label('VEN_Venta_Total', 'VEN_Venta_Total:') }}
            {{ Form::text('VEN_Venta_Total') }}
        </li>

        <li>
            {{ Form::label('VEN_Venta_TotalCambio', 'VEN_Venta_TotalCambio:') }}
            {{ Form::text('VEN_Venta_TotalCambio') }}
        </li>

        <li>
            {{ Form::label('VEN_FormaPago_VEN_FormaPago_id', 'VEN_FormaPago_VEN_FormaPago_id:') }}
            {{ Form::text('VEN_FormaPago_VEN_FormaPago_id') }}
        </li>

        <li>
            {{ Form::label('VEN_Caja_VEN_Caja_id', 'VEN_Caja_VEN_Caja_id:') }}
            {{ Form::text('VEN_Caja_VEN_Caja_id') }}
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


