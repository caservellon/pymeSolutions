@extends('layouts.scaffold')

@section('main')

<h1>Create Caja</h1>

{{ Form::open(array('route' => 'Cajas.store')) }}
	<ul>
        <li>
            {{ Form::label('VEN_Caja_id', 'VEN_Caja_id:') }}
            {{ Form::text('VEN_Caja_id') }}
        </li>

        <li>
            {{ Form::label('VEN_Caja_Codigo', 'VEN_Caja_Codigo:') }}
            {{ Form::text('VEN_Caja_Codigo') }}
        </li>

        <li>
            {{ Form::label('VEN_Caja_Numero', 'VEN_Caja_Numero:') }}
            {{ Form::text('VEN_Caja_Numero') }}
        </li>

        <li>
            {{ Form::label('VEN_Caja_Estado', 'VEN_Caja_Estado:') }}
            {{ Form::text('VEN_Caja_Estado') }}
        </li>

        <li>
            {{ Form::label('VEN_Caja_SaldoInicial', 'VEN_Caja_SaldoInicial:') }}
            {{ Form::text('VEN_Caja_SaldoInicial') }}
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


