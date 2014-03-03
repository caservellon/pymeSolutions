@extends('layouts.scaffold')

@section('main')

<h1>Create AperturaCaja</h1>

{{ Form::open(array('route' => 'AperturaCajas.store')) }}
	<ul>
        <li>
            {{ Form::label('VEN_AperturaCaja_id', 'VEN_AperturaCaja_id:') }}
            {{ Form::text('VEN_AperturaCaja_id') }}
        </li>

        <li>
            {{ Form::label('VEN_AperturaCaja_Codigo', 'VEN_AperturaCaja_Codigo:') }}
            {{ Form::text('VEN_AperturaCaja_Codigo') }}
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


