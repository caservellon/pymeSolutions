@extends('layouts.scaffold')

@section('main')

<h1>Edit Subcuentum</h1>

@include('_messages.errors')
{{ Form::model($Subcuentum, array('action' => array('SubcuentaController@update',$Subcuentum->CON_Subcuenta_ID), 'method' => 'PUT')) }}

	<ul>
        <li>
            {{ Form::label('CON_Subcuenta_ID', 'CON_Subcuenta_ID:') }}
            {{ Form::input('number', 'CON_Subcuenta_ID') }}
        </li>

        <li>
            {{ Form::label('CON_Subcuenta_Codigo', 'CON_Subcuenta_Codigo:') }}
            {{ Form::text('CON_Subcuenta_Codigo') }}
        </li>

        <li>
            {{ Form::label('CON_Subcuenta_Nombre', 'CON_Subcuenta_Nombre:') }}
            {{ Form::text('CON_Subcuenta_Nombre') }}
        </li>

        <li>
            {{ Form::label('CON_Subcuenta_FechaCreacion', 'CON_Subcuenta_FechaCreacion:') }}
            {{ Form::text('CON_Subcuenta_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('CON_Subcuenta_FechaModificacion', 'CON_Subcuenta_FechaModificacion:') }}
            {{ Form::text('CON_Subcuenta_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_ID', 'CON_CatalogoContable_ID:') }}
            {{ Form::input('number', 'CON_CatalogoContable_ID') }}
        </li>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			
		</li>
	</ul>
{{ Form::close() }}

@stop
