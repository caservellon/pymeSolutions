@extends('layouts.scaffold')

@section('main')

<h1>Crear Subcuenta</h1>


{{ Form::open(array('url' => 'subcuenta')) }}
	<ul>
    

        <li>
            {{ Form::label('CON_Subcuenta_Codigo', 'CON_Subcuenta_Codigo:') }}
            {{ Form::text('CON_Subcuenta_Codigo') }}
        </li>

        <li>
            {{ Form::label('CON_Subcuenta_Nombre', 'CON_Subcuenta_Nombre:') }}
            {{ Form::text('CON_Subcuenta_Nombre') }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_ID', 'CON_CatalogoContable_ID:') }}
            {{ Form::select('CON_CatalogoContable_ID', $Catalogo, $selected) }}
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


