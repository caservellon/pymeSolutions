@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Caja &gt; <small>{{{ $Caja->VEN_Caja_Codigo }}}</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Cajas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

<div class="form-group">
        <h4>ID# : {{{ $Caja->VEN_Caja_id }}}</h4>
</div>
<div class="form-group">
        <h4>Código de Caja : {{{ $Caja->VEN_Caja_Codigo }}}</h4>
</div>
<div class="form-group">
        <h4>Número de Caja : {{{ $Caja->VEN_Caja_Numero }}}</h4>
</div>
<div class="form-group"><h4>Estado : 
	@if($Caja->VEN_Caja_Estado == 1)
        Activada
    @else
    	Desactivada
    @endif
    </h4>    
</div>
<div class="form-group">
        <h4>Saldo Inicial : {{{ $Caja->VEN_Caja_SaldoInicial }}}</h4>
</div>

<div class="form-group">
		{{ link_to_route('Cajas.edit', 'Edit', array($Caja->VEN_Caja_id), array('class' => 'btn btn-info')) }}
	    {{ Form::open(array('method' => 'DELETE', 'route' => array('Cajas.destroy', $Caja->VEN_Caja_id))) }}
	        	{{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
	    	{{ Form::close() }}
</div>
                     

@stop
