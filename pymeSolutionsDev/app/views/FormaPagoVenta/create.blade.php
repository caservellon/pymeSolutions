@extends('layouts.scaffold')

@section('main')

<h1>Create FormaPagoVentum</h1>

{{ Form::open(array('route' => 'Ventas.FormaPagoVenta.store')) }}
	<ul>
        <li>
            {{ Form::label('VEN_FormaPago_id', 'VEN_FormaPago_id:') }}
            {{ Form::text('VEN_FormaPago_id') }}
        </li>

        <li>
            {{ Form::label('VEN_FormaPago_Descripcion', 'VEN_FormaPago_Descripcion:') }}
            {{ Form::text('VEN_FormaPago_Descripcion') }}
        </li>

        <li>
            {{ Form::label('VEN_FormaPago_TimeStamp', 'VEN_FormaPago_TimeStamp:') }}
            {{ Form::text('VEN_FormaPago_TimeStamp') }}
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


