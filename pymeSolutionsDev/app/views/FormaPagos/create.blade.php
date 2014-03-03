@extends('layouts.scaffold')

@section('main')

<h1>Create FormaPago</h1>

{{ Form::open(array('route' => 'FormaPagos.store')) }}
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
            {{ Form::label('VEN_FormaPago_Codigo', 'VEN_FormaPago_Codigo:') }}
            {{ Form::text('VEN_FormaPago_Codigo') }}
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


