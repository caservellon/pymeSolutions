@extends('layouts.scaffold')

@section('main')

<h1>Modificar el Motivo de Inventario</h1>


<div class="pull-right">
    <a href="{{{ URL::to('contabilidad/configuracion/motivoinventarios') }}}" class="btn btn-sm btn-primary">
    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a>
</div>
{{ Form::model($MotivoInventario, array('class' => 'form-horizontal', 'action' => array('MotivoInventariosController@update', $MotivoInventario->CON_MotivoInventario_ID), 'method' => 'PUT')) }}         

	<ul>
     <p>Nombre: {{{$concepto->INV_MotivoMovimiento_Nombre}}}</p>
  

  <p>Observacion: {{{$concepto->INV_MotivoMovimiento_Observacion}}}</p>

          {{ Form::label('CON_MotivoTransaccion_ID', 'MotivoTransaccion:*') }}
      {{ Form::select('CON_MotivoTransaccion_ID',$Motivos,'',array('class'=>'form-control')) }}
    
      <br>

    
		<li>
          
  
  {{ Form::hidden('CON_MotivoInventario_ID') }}

			{{ Form::submit('Cambiar', array('class' => 'btn btn-info')) }}
		</li>
	</ul>
{{ Form::close() }}

@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif

@stop

