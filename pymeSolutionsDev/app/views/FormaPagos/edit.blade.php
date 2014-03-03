@extends('layouts.scaffold')

@section('main')

<h1>Edit FormaPago</h1>
{{ Form::model($FormaPago, array('method' => 'PATCH', 'route' => array('FormaPagos.update', $FormaPago->VEN_FormaPago_id))) }}
	<ul>
        <li>
            {{ Form::label('VEN_FormaPago_id', 'VEN_FormaPago_id:') }}
            {{ Form::text('VEN_FormaPago_id') }}
        </li>

        <li>
            {{ Form::label('VEN_FormaPago_Descripcion', 'VEN_FormaPago_Descripcion:') }}
            {{ Form::text('VEN_FormaPago_Descripcion') }}
        </li>

        <li>
            {{ Form::label('VEN_FormaPago_Codigo', 'VEN_FormaPago_Codigo:') }}
            {{ Form::text('VEN_FormaPago_Codigo') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('FormaPagos.show', 'Cancel', $FormaPago->VEN_FormaPago_id, array('class' => 'btn')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
