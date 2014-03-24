@extends('layouts.scaffold')

@section('main')

<h1>Create Pago</h1>

{{ Form::open(array('route' => 'Pagos.store')) }}
	<ul>
        <li>
            {{ Form::label('VEN_Pago_ID', 'VEN_Pago_ID:') }}
            {{ Form::text('VEN_Pago_ID') }}
        </li>

        <li>
            {{ Form::label('VEN_Pago_Cantidad', 'VEN_Pago_Cantidad:') }}
            {{ Form::text('VEN_Pago_Cantidad') }}
        </li>

        <li>
            {{ Form::label('VEN_Venta_VEN_Venta_id', 'VEN_Venta_VEN_Venta_id:') }}
            {{ Form::text('VEN_Venta_VEN_Venta_id') }}
        </li>

        <li>
            {{ Form::label('VEN_Venta_VEN_Caja_VEN_Caja_id', 'VEN_Venta_VEN_Caja_VEN_Caja_id:') }}
            {{ Form::text('VEN_Venta_VEN_Caja_VEN_Caja_id') }}
        </li>

        <li>
            {{ Form::label('VEN_FormaPago_VEN_FormaPago_id', 'VEN_FormaPago_VEN_FormaPago_id:') }}
            {{ Form::text('VEN_FormaPago_VEN_FormaPago_id') }}
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


