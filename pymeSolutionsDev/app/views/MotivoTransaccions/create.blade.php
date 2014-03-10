@extends('layouts.scaffold')

@section('main')

<h1>Create MotivoTransaccion</h1>

{{ Form::open(array('url' => 'contabilidad/motivotransaccion')) }}
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


