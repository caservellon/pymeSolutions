@extends('layouts.scaffold')

@section('main')

<h1>Create MovimientoInventario</h1>

{{ Form::open(array('route' => 'Inventario.MovimientoInventario.storeSalida')) }}
	<ul>
        <li>
            {{ Form::label('INV_Movimiento_ID', 'INV_Movimiento_ID:') }}
            {{ Form::text('INV_Movimiento_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Movimiento_Numero', 'INV_Movimiento_Numero:') }}
            {{ Form::text('INV_Movimiento_Numero') }}
        </li>

        <li>
            {{ Form::label('INV_Movimiento_IDTransaccion', 'INV_Movimiento_IDTransaccion:') }}
            {{ Form::text('INV_Movimiento_IDTransaccion') }}
        </li>

        <li>
            {{ Form::label('INV_Movimiento_IDOrdenCompra', 'INV_Movimiento_IDOrdenCompra:') }}
            {{ Form::text('INV_Movimiento_IDOrdenCompra') }}
        </li>

        <li>
            {{ Form::label('INV_Movimiento_Observaciones', 'INV_Movimiento_Observaciones:') }}
            {{ Form::textarea('INV_Movimiento_Observaciones') }}
        </li>

        <li>
            {{ Form::label('INV_Movimiento_FechaCreacion', 'INV_Movimiento_FechaCreacion:') }}
            {{ Form::text('INV_Movimiento_FechaCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Movimiento_UsuarioCreacion', 'INV_Movimiento_UsuarioCreacion:') }}
            {{ Form::text('INV_Movimiento_UsuarioCreacion') }}
        </li>

        <li>
            {{ Form::label('INV_Movimiento_FechaModificacion', 'INV_Movimiento_FechaModificacion:') }}
            {{ Form::text('INV_Movimiento_FechaModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_Movimiento_UsuarioModificacion', 'INV_Movimiento_UsuarioModificacion:') }}
            {{ Form::text('INV_Movimiento_UsuarioModificacion') }}
        </li>

        <li>
            {{ Form::label('INV_MotivoMovimiento_INV_MotivoMovimiento_ID', 'INV_MotivoMovimiento_INV_MotivoMovimiento_ID:') }}
            {{ Form::text('INV_MotivoMovimiento_INV_MotivoMovimiento_ID') }}
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


