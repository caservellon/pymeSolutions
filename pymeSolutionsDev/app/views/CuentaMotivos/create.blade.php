@extends('layouts.scaffold')

@section('main')

<h1>Create CuentaMotivo</h1>

{{ Form::open(array('url' => 'cuentamotivos')) }}
	<ul>
        <li>
            {{ Form::label('CON_CuentaMotivo_DebeHaber', 'CON_CuentaMotivo_DebeHaber:') }}
            {{ Form::text('CON_CuentaMotivo_DebeHaber') }}
        </li>

        <li>
            {{ Form::label('CON_MotivoTransaccion_ID', 'CON_MotivoTransaccion_ID:') }}
            {{ Form::text('CON_MotivoTransaccion_ID') }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_ID', 'CON_CatalogoContable_ID:') }}
            {{ Form::text('CON_CatalogoContable_ID') }}
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


