@extends('layouts.scaffold')

@section('main')

<h2>Crear <small>Categoria<small></h2>

{{ Form::open(array('route' => 'Inventario.Categoria.store')) }}
	<ul>
        <li>
            {{ Form::label('INV_Categoria_Codigo', 'Codigo:') }}
            {{ Form::text('INV_Categoria_Codigo') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_Nombre', 'Nombre:') }}
            {{ Form::text('INV_Categoria_Nombre') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_Descripcion', 'Descripcion:') }}
            {{ Form::text('INV_Categoria_Descripcion') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_IDCategoriaPadre', 'IDCategoriaPadre:') }}
            {{ Form::text('INV_Categoria_IDCategoriaPadre') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_HorarioDescuento_ID', 'HorarioDescuento ID:') }}
            {{ Form::text('INV_Categoria_HorarioDescuento_ID') }}
        </li>

        <li>
            {{ Form::label('INV_Categoria_Activo', 'Activo:') }}
            {{ Form::checkbox('INV_Categoria_Activo', 'yes', '1') }}
        </li>

        <br/>

		<li>
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
            {{ link_to_route('Inventario.Categoria.index', 'Cancel', '', array('class' => 'btn btn-danger')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


