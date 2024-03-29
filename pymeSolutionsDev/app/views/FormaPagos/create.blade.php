@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Forma Pago &gt; <small>Nueva Forma de Pago</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/FormaPagos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

@if ($errors->any())
  <ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
  </ul>
@endif

{{ Form::open(array('route' => 'Inventario.FormaPagos.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
	<div class="form-group">
        {{ Form::label('INV_FormaPago_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_FormaPago_Nombre', null, array('class' => 'form-control', 'id' => 'INV_FormaPago_Nombre', 'placeholder'=>'name', 'maxlength'=>'128')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_FormaPago_Efectivo', 'Pago en Efectivo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_FormaPago_Efectivo', 'yes', '1', array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_FormaPago_Credito', 'Pago en Crédito: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_FormaPago_Credito', 'yes', '1', array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_FormaPago_DiasCredito', 'Días Crédito:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_FormaPago_DiasCredito',null, array('class' => 'form-control', 'id' => 'INV_FormaPago_DiasCredito', 'placeholder' => '#' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_FormaPago_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_FormaPago_Activo', 'yes', '1', array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    {{ Form::hidden('INV_FormaPago_FechaCreacion', date('Y-m-d H:i:s')) }}
    {{ Form::hidden('INV_FormaPago_FechaModificacion', date('Y-m-d H:i:s')) }}
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Aceptar', array('class' => 'btn btn-info')) }}
      </div>
    </div>


{{ Form::close() }}


@stop


