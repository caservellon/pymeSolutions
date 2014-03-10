@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Atributo &gt; <small>{{{ $Atributo->INV_Atributo_Codigo }}}</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Atributos') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

<div class="form-group">
        <h4>ID# : {{{ $Atributo->INV_Atributo_ID }}}</h4>
</div>
<div class="form-group">
        <h4>Código: {{{ $Atributo->INV_Atributo_Codigo }}}</h4>
</div>
<div class="form-group">
        <h4>Nombre : {{{ $Atributo->INV_Atributo_Nombre }}}</h4>
</div>
<div class="form-group">
        <h4>Tipo de Dato : {{{ $Atributo->INV_Atributo_TipoDato }}}</h4>
</div>
<div class="form-group"><h4>Estado : 
	@if($Atributo->INV_Atributo_Activo == 1)
        Activado
    @else
    	Desactivado
    @endif
    </h4>    
</div>

<div class="form-group">
		{{ link_to_route('Inventario.Atributos.edit', 'Edit', array($Atributo->INV_Atributo_ID), array('class' => 'btn btn-info')) }}
	    {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Atributos.destroy', $Atributo->INV_Atributo_ID))) }}
	        	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
	    	{{ Form::close() }}
</div>

@stop
