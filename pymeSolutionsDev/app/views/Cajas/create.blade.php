@extends('layouts.scaffold')

@section('main')

<div class="col-md-offset-1">
  <h2>Caja &gt; <small>Nueva Caja</small>
  </h2>
</div>

              
{{ Form::open(array('route' => 'Cajas.store', 'class' => "form-horizontal" , 'role' => 'form')) }}
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
        {{ Form::select('VEN_Caja_Estado', array('1' => 'Activado', '0' => 'Desactivado'),'1',array('class' => 'col-md-4 control-label')) }}
      </div>
    </div>
    {{ Form::hidden('VEN_Caja_SaldoInicial', '0') }}  
		<div class="form-group">
      <div class="col-md-5">
			{{ Form::submit('Submit', array('class' => 'btn btn-info')) }}
      </div>
		</div>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop


