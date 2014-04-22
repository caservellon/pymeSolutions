@extends('layouts.scaffold')

@section('main')

<h1>Create CuentaMotivo</h1>

@include('_messages.errors')

{{ Form::open(array('url' => 'cuentamotivos')) }}
	<ul>
        <li>
            {{ Form::label('CON_MotivoTransaccion_ID', 'Motivo de la Transaccion:') }}
            {{ Form::select('CON_MotivoTransaccion_ID',$motivo,$select) }}
        </li>

        <li>
            {{ Form::label('CON_CatalogoContable_ID', 'Cuenta del Motivo:') }}
            {{ Form::select('CON_CatalogoContable_ID',$cuenta,$select) }}
        </li>

        <li>
            {{ Form::label('CON_CuentaMotivo_DebeHaber', 'Naturaleza Saldo:') }}
            {{ Form::select('CON_CuentaMotivo_DebeHaber',array('0' => 'Haber','1' => 'Debe' ),'$select') }}
        </li>
        
		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}



@stop


