@extends('layouts.scaffold')

@section('main')

<h1>Editar Motivo Transaccion</h1>

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

{{ Form::model($MotivoTransaccion, array('method' => 'PATCH', 'url' => array('contabilidad/motivotransaccion', $MotivoTransaccion->id))) }}
	<ul>
        <li>
            {{ Form::label('CON_MotivoTransaccion_Codigo', 'CON_MotivoTransaccion_Codigo:') }}
            {{ Form::text('CON_MotivoTransaccion_Codigo') }}
        </li>

        <li>
            {{ Form::label('CON_MotivoTransaccion_Descripcion', 'CON_MotivoTransaccion_Descripcion:') }}
            {{ Form::text('CON_MotivoTransaccion_Descripcion') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@stop
