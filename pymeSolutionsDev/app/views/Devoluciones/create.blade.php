@extends('layouts.scaffold')

@section('main')

<h1>Create Devolucion</h1>

{{ Form::open(array('route' => 'Ventas.Devoluciones.store')) }}
	<ul>
        <li>
            {{ Form::label('VEN_Devolucion_id', 'VEN_Devolucion_id:') }}
            {{ Form::text('VEN_Devolucion_id') }}
        </li>

        <li>
            {{ Form::label('VEN_Devolucion_Codigo', 'VEN_Devolucion_Codigo:') }}
            {{ Form::text('VEN_Devolucion_Codigo') }}
        </li>

        <li>
            {{ Form::label('VEN_Devolucion_Monto', 'VEN_Devolucion_Monto:') }}
            {{ Form::text('VEN_Devolucion_Monto') }}
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


