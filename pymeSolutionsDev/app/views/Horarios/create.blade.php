@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Horario &gt; <small>Nuevo Horario</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Horarios') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>



{{ Form::open(array('route' => 'Inventario.Horarios.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
    <div class="form-group">
        {{ Form::label('INV_Horario_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_Horario_Nombre', null, array('class' => 'form-control', 'id' => 'INV_Horario_Nombre', 'placeholder'=>'Name')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Horario_Tipo', 'Tipo:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Horario_Tipo',null, array('class' => 'form-control', 'id' => 'INV_Horario_Tipo', 'placeholder' => '#' )) }}
      </div>
    </div> 
    <div class="form-group">
      {{ Form::label('INV_Horario_FechaInicio', 'Fecha de Inicio:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Horario_FechaInicio',null, array('class' => 'form-control', 'id' => 'INV_Horario_FechaInicio', 'placeholder' => 'dd/mm/aaaaa' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Horario_FechaFinal', 'Fecha Final:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Horario_FechaFinal',null, array('class' => 'form-control', 'id' => 'INV_Horario_FechaFinal', 'placeholder' => 'dd/mm/aaaaa' )) }}
      </div>
    </div>
    {{ Form::hidden('INV_Horario_FechaCreacion', date('Y-m-d H:i:s')) }} 
    {{ Form::hidden('INV_Horario_FechaModificacion', date('Y-m-d H:i:s')) }} 
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


