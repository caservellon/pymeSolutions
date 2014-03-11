@extends('layouts.scaffold')

@section('main')

<h1>Crear asiento</h1>

@include('_messages.errors')

<button class="btn btn-success form-group" data-toggle="modal" data-target="#myModal">
  Agregar Motivo
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Motivo</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Crear</button>
      </div>
    </div>
  </div>
</div>

{{ Form::open(array('action' => 'AsientosController@store')) }}

	<!--div class="form-group">
		<a class="btn btn-success" href="{{URL::to('cuentamotivos/create')}}">Agregar Motivo</a>
	</div-->
	<!-- Button trigger modal -->

	<div class='form-group'>
    	{{ Form::label('CON_MotivoTransaccion_ID', 'MotivoTransaccion:') }}
        {{ Form::select('CON_MotivoTransaccion_ID',$Motivos,array(),array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
    <label>Debe</label>
    	<input id="debe" type="text" disabled="">
    <label>Haber</label>
    	<input id="haber" type="text" disabled="">
    </div> 
    <div class="form-group">
      {{ Form::label('CON_DetalleAsiento_Monto', 'Importe:') }}
      {{ Form::input('number', 'CON_DetalleAsiento_Monto') }}

    </div> 
	<div class='form-group'>    
            {{ Form::label('CON_LibroDiario_Observacion', 'Observacion:') }}
            {{ Form::input('text', 'CON_LibroDiario_Observacion') }}
    </div>
    
     
			{{ Form::submit('Crear', array('class' => 'btn btn-info')) }}
		
	
{{ Form::close() }}
<script type="text/javascript">
  $(document).ready(function(){

        $("input").addClass("form-control");

    });

</script>

@stop


