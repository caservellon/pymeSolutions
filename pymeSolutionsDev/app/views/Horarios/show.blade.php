@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Horario &gt; <small>{{{ $Horario->INV_Horario_Nombre }}}</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Horarios') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

<div class="form-group">
        <h4>ID# : {{{ $Horario->INV_Horario_ID }}}</h4>
</div>
<div class="form-group">
        <h4>Nombre : {{{ $Horario->INV_Horario_Nombre }}}</h4>
</div>
<div class="form-group">
        <h4>Tipo : {{{ $Horario->INV_Horario_Tipo }}}</h4>
</div>
<div class="form-group">
        <h4>Fecha de Inicio : {{{ $Horario->INV_Horario_FechaInicio }}}</h4>
</div>
<div class="form-group">
        <h4>Fecha Final : {{{ $Horario->INV_Horario_FechaFinal }}}</h4>
</div>

<div class="form-group">
		{{ link_to_route('Inventario.Horarios.edit', 'Edit', array($Horario->INV_Horario_ID), array('class' => 'btn btn-info')) }}
	    {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Horarios.destroy', $Horario->INV_Horario_ID))) }}
	        	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
	    	{{ Form::close() }}
</div>

@stop
