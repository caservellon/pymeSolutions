@extends('layouts.scaffold')

@section('main')

<h1>Edit FormaPagoVentum</h1>
{{ Form::model($FormaPagoVentum, array('method' => 'PATCH', 'route' => array('FormaPagoVenta.update', $FormaPagoVentum->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('FormaPagoVenta.show', 'Cancel', $FormaPagoVentum->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
