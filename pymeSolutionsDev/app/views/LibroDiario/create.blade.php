@extends('layouts.scaffold')

@section('main')

<h1>Create LibroDiario</h1>

{{ Form::open(array('route' => 'AsientosContables.store')) }}
	<ul>
        <li>
            {{ Form::label('CON_LibroDiario_Observacion', 'CON_LibroDiario_Observacion:') }}
            {{ Form::input('number', 'CON_LibroDiario_Observacion') }}
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


