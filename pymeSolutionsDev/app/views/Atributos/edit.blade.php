@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Atributo &gt; <small>Editar Atributo</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Atributos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

{{ Form::model($Atributo, array('method' => 'PATCH', 'route' => array('Inventario.Atributos.update', $Atributo->INV_Atributo_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
    <div class="form-group">
        {{ Form::label('INV_Atributo_Codigo', 'Codigo:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_Atributo_Codigo', $Atributo->INV_Atributo_Codigo, array('class' => 'form-control', 'id' => 'INV_Atributo_Codigo', 'placeholder'=>'ATRIB-00001')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Atributo_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Atributo_Nombre', $Atributo->INV_Atributo_Nombre, array('class' => 'form-control', 'id' => 'INV_Atributo_Nombre', 'placeholder' => 'name' )) }}
      </div>
    </div> 
    <div class="form-group">
      {{ Form::label('INV_Atributo_TipoDato', 'Tipo Dato: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('INV_Atributo_TipoDato', array('Numerico' => 'Numerico', 'Decimal' => 'Decimal', 'Texto' => 'Texto' ), $Atributo->INV_Atributo_TipoDato, array('class' => 'form-control', 'id' => 'INV_Atributo_TipoDato', 'placeholder' => '#' )) }}
      </div>
    </div> 
    <div class="form-group">
      {{ Form::label('INV_Atributo_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_Atributo_Activo', '1', $Atributo->INV_Atributo_Activo, array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    {{ Form::hidden('INV_Atributo_FechaModificacion', date('Y-m-d H:i:s')) }}
    <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Actualizar', array('class' => 'btn btn-info')) }}
            {{ link_to_route('Inventario.Atributos.show', 'Cancelar', $Atributo->INV_Atributo_ID, array('class' => 'btn')) }}
      </div>
    </div>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
