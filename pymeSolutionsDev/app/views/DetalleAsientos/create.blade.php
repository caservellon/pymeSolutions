@extends('layouts.scaffold')

@section('main')

<h1>Create DetalleAsiento</h1>

@include('_messages.errors')

{{ Form::open(array('url' => 'detalleasientos')) }}
	<ul>
        <li>
            {{ Form::label('CON_DetalleAsiento_Monto', 'Monto:') }}
            {{ Form::text('CON_DetalleAsiento_Monto') }}
        </li>

        <li>
            {{ Form::label('CON_MotivoTransaccion_ID', 'Motivo de la Transaccion:') }}
            {{ Form::text('CON_MotivoTransaccion_ID') }}
        </li>

        <li>
            {{ Form::label('CON_LibroDiario_ID', 'Asiento Perteneciente:') }}
            {{ Form::text('CON_LibroDiario_ID') }}
        </li>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}


@stop