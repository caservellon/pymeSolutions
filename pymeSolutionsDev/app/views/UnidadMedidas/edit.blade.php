@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Unidades de Medida &gt; <small>Nueva Unidad de Medida</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/UnidadMedidas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> regresar</a>
      </div>
</div>
{{ Form::model($UnidadMedida, array('method' => 'PATCH', 'route' => array('Inventario.UnidadMedidas.update', $UnidadMedida->INV_UnidadMedida_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
<div class="form-group">
        {{ Form::label('INV_UnidadMedida_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::text('INV_UnidadMedida_Nombre', $UnidadMedida->INV_UnidadMedida_Nombre, array('class' => 'form-control', 'id' => 'INV_UnidadMedida_Nombre', 'placeholder'=>'name')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('INV_UnidadMedida_Descripcion', 'Descripción: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
            {{ Form::textarea('INV_UnidadMedida_Descripcion', $UnidadMedida->INV_UnidadMedida_Descripcion, array('class' => 'form-control', 'rows' => '3',  'id' => 'INV_UnidadMedida_Descripcion', 'placeholder'=>'Descripcion')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_UnidadMedida_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_UnidadMedida_Activo', '1', $UnidadMedida->INV_UnidadMedida_Activo, array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    {{ Form::hidden('INV_UnidadMedida_FechaModificacion', date('Y-m-d H:i:s')) }}
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Actualizar', array('class' => 'btn btn-info')) }}
      </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
