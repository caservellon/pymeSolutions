@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Periodo de Cierre &gt; <small>Editar Periodo de Cierre de Cajas</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Ventas/PeriodoCierreDeCajas') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
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
{{ Form::model($PeriodoCierreDeCaja, array('method' => 'PATCH', 'route' => array('Ventas.PeriodoCierreDeCajas.update', $PeriodoCierreDeCaja->VEN_PeriodoCierreDeCaja_id),'class' => 'form-horizontal', 'role' => 'form')) }}


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
        {{ Form::select('VEN_PeriodoCierreDeCaja_Estado', array('1' => 'Activado', '0' => 'Desactivado'),'1',array('class' => 'col-md-4 form-control')) }}
      </div>
    </div>



    <div class="form-group">
        <div class="col-md-5">
            {{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
        </div>
    </div>

{{ Form::close() }}



@stop
