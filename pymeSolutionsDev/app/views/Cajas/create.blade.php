@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Caja &gt; <small>Nueva Caja</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Ventas/Cajas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>


              
{{ Form::open(array('route' => 'Ventas.Cajas.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
    <div>
    <h4>Campos por defecto</h4>
      <div class="form-group">
          {{ Form::label('VEN_Caja_Codigo', 'Código:',array('class' => 'col-md-2 control-label')) }}
          <div class="col-md-4">
              {{ Form::text('VEN_Caja_Codigo', null, array('class' => 'form-control', 'id' => 'VEN_Caja_Codigo', 'placeholder'=>'CAJ-00001')) }}
          </div>
      </div>
      <div class="form-group">
        {{ Form::label('VEN_Caja_Numero', 'Número de Caja:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
          {{ Form::text('VEN_Caja_Numero',null, array('class' => 'form-control', 'id' => 'VEN_Caja_Numero', 'placeholder' => '#' )) }}
        </div>
      </div> 
      <div class="form-group">
        {{ Form::label('VEN_Caja_Estado', 'Estado de Caja:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
          {{ Form::select('VEN_Caja_Estado', array('1' => 'Activado', '0' => 'Desactivado'),'1',array('class' => 'col-md-4 form-control')) }}
        </div>
      </div>
      {{ Form::hidden('VEN_Caja_SaldoInicial', '0') }}  
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


