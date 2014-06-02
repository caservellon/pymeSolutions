@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Ciudad &gt; <small>Editar Ciudad</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Ciudad') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

@if ($errors->any())
  <ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
  </ul>
@endif

{{ Form::model($Ciudad, array('method' => 'PATCH', 'route' => array('Inventario.Ciudad.update', $Ciudad->INV_Ciudad_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
        {{ Form::label('INV_Ciudad_Codigo', 'Codigo:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_Ciudad_Codigo', $Ciudad->INV_Ciudad_Codigo, array('class' => 'form-control', 'id' => 'INV_Ciudad_Codigo', 'placeholder'=>'CIUDAD-00001', 'maxlength'=>'16')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Ciudad_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Ciudad_Nombre',$Ciudad->INV_Ciudad_Nombre, array('class' => 'form-control', 'id' => 'INV_Ciudad_Nombre', 'placeholder' => 'name' , 'maxlength'=>'128')) }}
      </div>
    </div> 
    <div class="form-group">
      {{ Form::label('INV_Ciudad_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_Ciudad_Activo', '1', $Ciudad->INV_Ciudad_Activo, array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    {{ Form::hidden('INV_Ciudad_FechaModificacion', date('Y-m-d H:i:s')) }}
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Actualizar', array('class' => 'btn btn-info')) }}
      </div>
    </div>  
{{ Form::close() }}

@stop
