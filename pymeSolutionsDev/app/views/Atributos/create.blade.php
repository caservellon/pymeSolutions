@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Atributo &gt; <small>Nuevo Atributo</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Atributos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

@if ($errors->any())
  <ul>
    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
  </ul>
@endif

{{ Form::open(array('route' => 'Inventario.Atributos.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
	<div class="form-group">
        {{ Form::label('INV_Atributo_Codigo', 'Codigo:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_Atributo_Codigo', null, array('class' => 'form-control', 'id' => 'INV_Atributo_Codigo', 'placeholder'=>'ATRIB-00001', 'maxlength'=>'16')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Atributo_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Atributo_Nombre',null, array('class' => 'form-control', 'id' => 'INV_Atributo_Nombre', 'placeholder' => 'name', 'maxlength'=>'128')) }}
      </div>
    </div> 
    <div class="form-group">
      {{ Form::label('INV_Atributo_TipoDato', 'Tipo Dato: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Atributo_TipoDato', array('Numerico' => 'Numerico', 'Decimal' => 'Decimal', 'Texto' => 'Texto' ), 'Numerico', array('class' => 'form-control', 'id' => 'INV_Atributo_TipoDato', 'placeholder' => '#' )) }}
      </div>
    </div> 
    <div class="form-group">
      {{ Form::label('INV_Atributo_Activo', 'Estado: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Atributo_Activo', array('1' => 'Activada', '0' => 'Desactivada'),'1',array('class' => 'col-md-4 form-control')) }}
      </div>
    </div>
    {{ Form::hidden('INV_Atributo_FechaCreacion', date('Y-m-d H:i:s')) }}
    {{ Form::hidden('INV_Atributo_FechaModificacion', date('Y-m-d H:i:s')) }}
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Aceptar', array('class' => 'btn btn-info')) }}
      </div>
    </div>

{{ Form::close() }}


@stop


