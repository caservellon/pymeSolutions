@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Motivo Movimiento Inventario &gt; <small>Editar Motivo Movimiento</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/MotivoMovimiento') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>
{{ Form::model($MotivoMovimiento, array('method' => 'PATCH', 'route' => array('Inventario.MotivoMovimiento.update', $MotivoMovimiento->INV_MotivoMovimiento_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
      {{ Form::label('INV_MotivoMovimiento_Nombre', 'Nombre:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_MotivoMovimiento_Nombre',$MotivoMovimiento->INV_MotivoMovimiento_Nombre, array('class' => 'form-control', 'id' => 'INV_MotivoMovimiento_Nombre', 'placeholder' => 'name' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_MotivoMovimiento_TipoMovimiento', 'Tipo:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_MotivoMovimiento_TipoMovimiento',array('0' => 'Entrada', '1' => 'Salida'), $MotivoMovimiento->INV_MotivoMovimiento_TipoMovimiento, array('class' => 'form-control', 'id' => 'INV_MotivoMovimiento_TipoMovimiento', 'placeholder' => 'name' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_MotivoMovimiento_Observaciones', 'Observaciones:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::textarea('INV_MotivoMovimiento_Observaciones',$MotivoMovimiento->INV_MotivoMovimiento_Observaciones, array('class' => 'form-control', 'id' => 'INV_MotivoMovimiento_Observaciones', 'placeholder' => 'text', 'rows' => '3' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_MotivoMovimiento_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_MotivoMovimiento_Activo', '1', $MotivoMovimiento->INV_MotivoMovimiento_Activo, array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_MotivoMovimiento_Activo', 'Estado: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_MotivoMovimiento_Activo', array('1' => 'Activada', '0' => 'Desactivada'), $MotivoMovimiento->INV_MotivoMovimiento_Activo, array('class' => 'col-md-4 form-control')) }}
      </div>
    </div>
    {{ Form::hidden('INV_Categoria_FechaCreacion', date('Y-m-d H:i:s')) }}
    {{ Form::hidden('INV_Categoria_FechaModificacion', date('Y-m-d H:i:s')) }}
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
