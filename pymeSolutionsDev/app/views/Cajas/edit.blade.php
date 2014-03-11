@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Caja &gt; <small>Editar Caja</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Cajas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>

{{ Form::model($Caja, array('method' => 'PATCH', 'route' => array('Ventas.Cajas.update', $Caja->VEN_Caja_id), 'class' => 'form-horizontal', 'role' => 'form')) }}
	<div class="form-group">
        {{ Form::label('VEN_Caja_Codigo', 'Código:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_Caja_Codigo', $Caja->VEN_Caja_Codigo, array('class' => 'form-control', 'id' => 'VEN_Caja_Codigo', 'placeholder'=>'CAJ-00001')) }}
        </div>
    </div>
    <div class="form-group">
      {{ Form::label('VEN_Caja_Numero', 'Número de Caja:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('VEN_Caja_Numero', $Caja->VEN_Caja_Numero, array('class' => 'form-control', 'id' => 'VEN_Caja_Numero', 'placeholder' => '#' )) }}
      </div>
    </div> 
    <div class="form-group">
      {{ Form::label('VEN_Caja_Estado', 'Estado de Caja:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('VEN_Caja_Estado', array('1' => 'Activado', '0' => 'Desactivado'),$Caja->VEN_Caja_Estado ,array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    <div class="form-group">
        {{ Form::label('VEN_PeriodoCierreDeCaja_VEN_PeriodoCierreDeCaja_id', 'Periodo de Cierre:', array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-5">
          {{ Form::select('VEN_PeriodoCierreDeCaja_VEN_PeriodoCierreDeCaja_id', $periodos,$Caja->VEN_PeriodoCierreDeCaja_VEN_PeriodoCierreDeCaja_id,array('class' => 'col-md-4 form-control')) }}
        </div>
      </div>
    <div class="form-group">
      {{ Form::label('VEN_Caja_SaldoInicial', 'Saldo Inicial:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::text('VEN_Caja_SaldoInicial', $Caja->VEN_Caja_SaldoInicial, array('class' => 'form-control', 'id' => 'VEN_Caja_SaldoInicial' )) }}
      </div>
    </div>
  
        <div class="form-group">
      <div class="col-md-5">
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('Ventas.Cajas.show', 'Cancel', $Caja->VEN_Caja_id, array('class' => 'btn')) }}
      </div>
    </div>

{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop
