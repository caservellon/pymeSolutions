@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Categoria &gt; <small>Editar Categoria</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Categoria') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>
{{ Form::model($Categoria, array('method' => 'PATCH', 'route' => array('Inventario.Categoria.update', $Categoria->INV_Categoria_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
<div class="form-group">
    {{ Form::label('INV_Categoria_Codigo', 'Codigo:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-4">
          {{ Form::text('INV_Categoria_Codigo', $Categoria->INV_Categoria_Codigo, array('class' => 'form-control', 'id' => 'INV_Categoria_Codigo', 'placeholder'=>'CAT-00001')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Categoria_Nombre',$Categoria->INV_Categoria_Nombre, array('class' => 'form-control', 'id' => 'INV_Categoria_Nombre', 'placeholder' => 'name' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_Descripcion', 'Descripción: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::textarea('INV_Categoria_Descripcion',$Categoria->INV_Categoria_Descripcion, array('class' => 'form-control', 'id' => 'INV_Categoria_Descripcion', 'placeholder' => 'text', 'rows' => '3' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_IDCategoriaPadre', 'ID Categoría Padre: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Categoria_IDCategoriaPadre', $tipos, $Categoria->INV_Categoria_IDCategoriaPadre, array('class' => 'form-control', 'id' => 'INV_Categoria_IDCategoriaPadre', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_HorarioDescuento_ID', 'Horario Descuento ID: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Categoria_HorarioDescuento_ID', $horarios, $Categoria->INV_Categoria_HorarioDescuento_ID, array('class' => 'form-control', 'id' => 'INV_Categoria_HorarioDescuento_ID', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_Categoria_Activo', '1', $Categoria->INV_Categoria_Activo, array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    {{ Form::hidden('INV_Categoria_FechaModificacion', date('Y-m-d H:i:s')) }}
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Actualizar', array('class' => 'btn btn-info')) }}
            {{ link_to_route('Inventario.Categoria.show', 'Cancelar', $Categoria->INV_Categoria_ID, array('class' => 'btn')) }}
      </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
