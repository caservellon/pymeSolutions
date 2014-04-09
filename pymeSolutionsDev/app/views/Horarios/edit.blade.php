@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Horario &gt; <small>Editar Horario</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Horarios') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>
{{ Form::model($Horario, array('method' => 'PATCH', 'route' => array('Inventario.Horarios.update', $Horario->INV_Horario_ID), 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
        {{ Form::label('INV_Horario_Nombre', 'Nombre: *', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('INV_Horario_Nombre', $Horario->INV_Horario_Nombre, array('class' => 'form-control', 'id' => 'INV_Horario_Nombre', 'placeholder'=>'Name')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Horario_Tipo', 'Tipo:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Horario_Tipo',$Horario->INV_Horario_Tipo, array('class' => 'form-control', 'id' => 'INV_Horario_Tipo', 'placeholder' => '#' )) }}
      </div>
    </div> 
    <div class="form-group">
      {{ Form::label('INV_Horario_FechaInicio', 'Fecha de Inicio:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Horario_FechaInicio',$Horario->INV_Horario_FechaInicio, array('class' => 'form-control', 'id' => 'INV_Horario_FechaInicio', 'placeholder' => 'dd/mm/aaaaa' )) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('INV_Horario_FechaFinal', 'Fecha Final:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('INV_Horario_FechaFinal',$Horario->INV_Horario_FechaFinal, array('class' => 'form-control', 'id' => 'INV_Horario_FechaFinal', 'placeholder' => 'dd/mm/aaaaa' )) }}
      </div>
    </div>
    {{ Form::hidden('INV_Horario_FechaModificacion', date('Y-m-d H:i:s')) }} 
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
