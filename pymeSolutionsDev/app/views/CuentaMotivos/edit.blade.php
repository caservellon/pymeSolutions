@extends('layouts.scaffold')

@section('main')

<h1>Edit CuentaMotivo</h1>
{{ Form::model($CuentaMotivo, array('method' => 'PATCH', 'route' => array('CuentaMotivos.update', $CuentaMotivo->id))) }}
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
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('CuentaMotivos.show', 'Cancel', $CuentaMotivo->id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
