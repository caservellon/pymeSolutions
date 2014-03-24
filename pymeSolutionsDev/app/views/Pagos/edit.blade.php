@extends('layouts.scaffold')

@section('main')

<h1>Edit Pago</h1>
{{ Form::model($Pago, array('method' => 'PATCH', 'route' => array('Pagos.update', $Pago->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Pagos.show', 'Cancel', $Pago->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
