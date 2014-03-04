@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Periodo de Cierre &gt; <small>Nuevo Periodo de Cierre de Cajas</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('PeriodoCierreDeCajas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
      </div>
</div>


{{ Form::open(array('route' => 'PeriodoCierreDeCajas.store', 'class' => "form-horizontal" , 'role' => 'form')) }}


    <div class="form-group">
        {{ Form::label('VEN_PeriodoCierreDeCaja_Codigo', 'Código:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_PeriodoCierreDeCaja_Codigo', null, array('class' => 'form-control', 'id' => 'VEN_PeriodoCierreDeCaja_Codigo', 'placeholder'=>'PER-00001')) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('VEN_PeriodoCierreDeCaja_ValorHoras', 'Horas:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_PeriodoCierreDeCaja_ValorHoras', null, array('class' => 'form-control', 'id' => 'VEN_PeriodoCierreDeCaja_ValorHoras', 'placeholder'=>'4')) }}
        </div>
    </div>

         <div class="form-group">
        {{ Form::label('VEN_PeriodoCierreDeCaja_HoraPartida', 'Hora de Partida:',array('class' => 'col-md-2 control-label')) }}
        <div class="col-md-4">
            {{ Form::text('VEN_PeriodoCierreDeCaja_HoraPartida', null, array('class' => 'form-control', 'id' => 'VEN_PeriodoCierreDeCaja_HoraPartida', 'placeholder'=>'15:30')) }}
        </div>
    </div>

    <div class="form-group">
      {{ Form::label('VEN_PeriodoCierreDeCaja_Estado', 'Estado de Caja:', array('class' => 'col-md-2 control-label')) }}
      <div class="col-md-5">
        {{ Form::select('VEN_PeriodoCierreDeCaja_Estado', array('1' => 'Activado', '0' => 'Desactivado'),'1',array('class' => 'col-md-4 control-label')) }}
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


