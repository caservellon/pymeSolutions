@extends('layouts.scaffold')

@section('main')

<h2>Editar <small>Categoria<small></h2>
{{ Form::model($Categoria, array('method' => 'PATCH', 'route' => array('Inventario.Categoria.update', $Categoria->INV_Categoria_ID))) }}
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
            {{ Form::checkbox('INV_Categoria_Activo', 'yes') }}
        </li>

        <br/>

		<li>
			{{ Form::submit('Update', array('class' => 'btn btn-info')) }}
			{{ link_to_route('Inventario.Categoria.show', 'Cancel', $Categoria->INV_Categoria_ID, array('class' => 'btn btn-danger')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
