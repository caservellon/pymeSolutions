@extends('layouts.scaffold')

@section('main')

<h1>Edit Caja</h1>
{{ Form::model($Caja, array('method' => 'PATCH', 'route' => array('Cajas.update', $Caja->VEN_Caja_id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Cajas.show', 'Cancel', $Caja->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
