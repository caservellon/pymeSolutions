@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Categoria &gt; <small>Nueva Categoria</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Categoria') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

@if ($errors->any())
  <ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
  </ul>
@endif

{{ Form::open(array('route' => 'Inventario.Categoria.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
	<div class="form-group">
    {{ Form::label('INV_Categoria_Codigo', 'Codigo:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-4">
          {{ Form::text('INV_Categoria_Codigo', null, array('class' => 'form-control', 'id' => 'INV_Categoria_Codigo', 'placeholder'=>'CAT-00001', 'maxlength'=>'16')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Categoria_Nombre',null, array('class' => 'form-control', 'id' => 'INV_Categoria_Nombre', 'placeholder' => 'name', 'maxlength'=>'128')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_Descripcion', 'Descripción: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::textarea('INV_Categoria_Descripcion',null, array('class' => 'form-control', 'id' => 'INV_Categoria_Descripcion', 'placeholder' => 'text', 'rows' => '3', 'maxlength'=>'256')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_IDCategoriaPadre', 'ID Categoría Padre: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Categoria_IDCategoriaPadre', $tipos, null, array('class' => 'form-control', 'id' => 'INV_Categoria_IDCategoriaPadre', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_HorarioDescuento_ID', 'Horario Descuento ID: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Categoria_HorarioDescuento_ID', $horarios, null, array('class' => 'form-control', 'id' => 'INV_Categoria_HorarioDescuento_ID', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Categoria_Activo', 'Estado: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Categoria_Activo', array('1' => 'Activada', '0' => 'Desactivada'),'1',array('class' => 'col-md-4 form-control')) }}
      </div>
    </div>
    {{ Form::hidden('INV_Categoria_FechaCreacion', date('Y-m-d H:i:s')) }}
    {{ Form::hidden('INV_Categoria_FechaModificacion', date('Y-m-d H:i:s')) }}
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Aceptar', array('class' => 'btn btn-info')) }}
      </div>
    </div>

{{ Form::close() }}


@stop


