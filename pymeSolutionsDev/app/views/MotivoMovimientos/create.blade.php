@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Motivo Movimiento Inventario &gt; <small>Nuevo Motivo</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/MotivoMovimiento') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

{{ Form::open(array('route' => 'Inventario.MotivoMovimiento.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
	<div class="form-group">
      {{ Form::label('INV_MotivoMovimiento_Nombre', 'Nombre:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_MotivoMovimiento_Nombre',null, array('class' => 'form-control', 'id' => 'INV_MotivoMovimiento_Nombre', 'placeholder' => 'name' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_MotivoMovimiento_TipoMovimiento', 'Tipo:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_MotivoMovimiento_TipoMovimiento',array('0' => 'Entrada', '1' => 'Salida'), '0', array('class' => 'form-control', 'id' => 'INV_MotivoMovimiento_TipoMovimiento', 'placeholder' => 'name' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_MotivoMovimiento_Observaciones', 'Observaciones:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::textarea('INV_MotivoMovimiento_Observaciones',null, array('class' => 'form-control', 'id' => 'INV_MotivoMovimiento_Observaciones', 'placeholder' => 'text', 'rows' => '3' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_MotivoMovimiento_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_MotivoMovimiento_Activo', '1', '1', array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    {{ Form::hidden('INV_Categoria_FechaCreacion', date('Y-m-d H:i:s')) }}
    {{ Form::hidden('INV_Categoria_FechaModificacion', date('Y-m-d H:i:s')) }}
	<div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
      </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


