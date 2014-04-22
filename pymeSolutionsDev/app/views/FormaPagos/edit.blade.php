@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Forma Pago &gt; <small>Editar Forma de Pago</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/FormaPagos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>
{{ Form::model($FormaPago, array('method' => 'PATCH', 'route' => array('Inventario.FormaPagos.update', $FormaPago->INV_FormaPago_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
<div class="form-group">
        {{ Form::label('INV_FormaPago_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_FormaPago_Nombre', $FormaPago->INV_FormaPago_Nombre, array('class' => 'form-control', 'id' => 'INV_FormaPago_Nombre', 'placeholder'=>'name')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_FormaPago_Efectivo', 'Pago en Efectivo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_FormaPago_Efectivo', '1', $FormaPago->INV_FormaPago_Efectivo, array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_FormaPago_Credito', 'Pago en Crédito: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_FormaPago_Credito', '1', $FormaPago->INV_FormaPago_Credito, array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_FormaPago_DiasCredito', 'Días Crédito:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_FormaPago_DiasCredito',$FormaPago->INV_FormaPago_DiasCredito, array('class' => 'form-control', 'id' => 'INV_FormaPago_DiasCredito', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_FormaPago_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_FormaPago_Activo', '1', $FormaPago->INV_FormaPago_Activo, array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    {{ Form::hidden('INV_FormaPago_FechaModificacion', date('Y-m-d H:i:s')) }}
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Actualizar', array('class' => 'btn btn-info')) }}
      </div>
    </div>{{ Form::close() }}


@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
