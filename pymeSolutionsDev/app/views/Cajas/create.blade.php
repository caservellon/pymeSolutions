@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Caja &gt; <small>Nueva Caja</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Ventas/Cajas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

@if ($errors->any())
<div class="alert alert-danger fade in">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      @if($errors->count() > 1)
      <h4>Oh no! Se encontraron errores!</h4>
      @else
      <h4>Oh no! Se encontró un error!</h4>
      @endif
      <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
      </ul>
      
</div>
@endif
              
{{ Form::open(array('route' => 'Ventas.Cajas.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
    <div>
    
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
      <div class="form-group">
        {{ Form::label('VEN_PeriodoCierreDeCaja_VEN_PeriodoCierreDeCaja_id', 'Periodo de Cierre:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
          {{ Form::select('VEN_PeriodoCierreDeCaja_VEN_PeriodoCierreDeCaja_id', $periodos,'1',array('class' => 'col-md-4 form-control')) }}
        </div>
      </div>
      {{ Form::hidden('VEN_Caja_SaldoInicial', '0') }}  
    </div>
    
    <div class="form-group">
      <div class="col-md-5">
        {{ Form::submit('Aceptar', array('class' => 'btn btn-info')) }}
      </div>
    </div>

	
{{ Form::close() }}


@stop


