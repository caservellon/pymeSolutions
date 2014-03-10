@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Ciudad &gt; <small>Nueva Ciudad</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Ciudad') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>



{{ Form::open(array('route' => 'Inventario.Ciudad.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
	<div class="form-group">
        {{ Form::label('INV_Ciudad_Codigo', 'Codigo:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_Ciudad_Codigo', null, array('class' => 'form-control', 'id' => 'INV_Ciudad_Codigo', 'placeholder'=>'CIUDAD-00001')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Ciudad_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Ciudad_Nombre',null, array('class' => 'form-control', 'id' => 'INV_Ciudad_Nombre', 'placeholder' => 'name' )) }}
      </div>
    </div> 
    <div class="form-group">
      {{ Form::label('INV_Ciudad_Activo', 'Activo: ', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::checkbox('INV_Ciudad_Activo', 'yes', '1', array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
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


