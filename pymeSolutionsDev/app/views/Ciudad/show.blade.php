@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Ciudad &gt; <small>{{{ $Ciudad->INV_Ciudad_Codigo }}}</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Inventario/Ciudad') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

<div class="form-group">
        <h4>ID# : {{{ $Ciudad->INV_Ciudad_ID }}}</h4>
</div>
<div class="form-group">
        <h4>Codigo : {{{ $Ciudad->INV_Ciudad_Codigo }}}</h4>
</div>
<div class="form-group">
        <h4>Nombre : {{{ $Ciudad->INV_Ciudad_Nombre }}}</h4>
</div>

<div class="form-group"><h4>Estado : 
	@if($Ciudad->INV_Ciudad_Activo == 1)
        Activada
    @else
    	Desactivada
    @endif
    </h4>    
</div>
<div class="form-group">
		{{ link_to_route('Inventario.Ciudad.edit', 'Edit', array($Ciudad->INV_Ciudad_ID), array('class' => 'btn btn-info')) }}
	    {{ Form::open(array('method' => 'DELETE', 'route' => array('Inventario.Ciudad.destroy', $Ciudad->INV_Ciudad_ID))) }}
	        	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
	    	{{ Form::close() }}
</div>

@stop
