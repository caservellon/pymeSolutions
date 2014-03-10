@extends('layouts.scaffold')

@section('main')

<h1>Edit DetalleAsiento</h1>
{{ Form::model($DetalleAsiento, array('method' => 'PATCH', 'route' => array('DetalleAsientos.update', $DetalleAsiento->id))) }}
	<ul>
        <li>
            {{ Form::label('CON_DetalleAsiento_ID', 'CON_DetalleAsiento_ID:') }}
            {{ Form::text('CON_DetalleAsiento_ID') }}
        </li>

        <li>
            {{ Form::label('CON_DetalleAsiento_Monto', 'CON_DetalleAsiento_Monto:') }}
            {{ Form::text('CON_DetalleAsiento_Monto') }}
        </li>

        <li>
            {{ Form::label('CON_DetalleAsiento_FechaCreacion', 'CON_DetalleAsiento_FechaCreacion:') }}
            {{ Form::text('CON_DetalleAsiento_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('CON_DetalleAsiento_FechaModificacion', 'CON_DetalleAsiento_FechaModificacion:') }}
            {{ Form::text('CON_DetalleAsiento_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('CON_MotivoTransaccion_ID', 'CON_MotivoTransaccion_ID:') }}
            {{ Form::text('CON_MotivoTransaccion_ID') }}
        </li>

        <li>
            {{ Form::label('CON_LibroDiario_ID', 'CON_LibroDiario_ID:') }}
            {{ Form::text('CON_LibroDiario_ID') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('DetalleAsientos.show', 'Cancel', $DetalleAsiento->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
