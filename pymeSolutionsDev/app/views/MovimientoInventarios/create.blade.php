@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Entrada Inventario &gt; <small>Nueva Entrada</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/MovimientoInventario') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>


{{ Form::open(array('route' => 'Inventario.MovimientoInventario.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
	  <div class="form-group">
        {{ Form::label('INV_MotivoMovimiento_INV_MotivoMovimiento_ID', 'Motivo Movimiento: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-4">
        {{ Form::select('INV_MotivoMovimiento_INV_MotivoMovimiento_ID', $Motivos,null, array('class' => 'form-control', 'id' => 'INV_MotivoMovimiento_INV_MotivoMovimiento_ID', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Movimiento_Observaciones', 'Observaciones:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-4">
        {{ Form::textarea('INV_Movimiento_Observaciones',null, array('class' => 'form-control', 'id' => 'INV_Movimiento_Observaciones', 'placeholder' => 'text', 'rows' => '3' )) }}
      </div>
    </div>

    {{ Form::hidden('INV_Movimiento_FechaCreacion', date('Y-m-d H:i:s')) }}
    {{ Form::hidden('INV_Movimiento_FechaModificacion', date('Y-m-d H:i:s')) }}

    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Aceptar', array('class' => 'btn btn-info')) }}
      </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


