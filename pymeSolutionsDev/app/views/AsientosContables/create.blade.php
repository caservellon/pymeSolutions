@extends('layouts.scaffold')

@section('main')

<h1>Crear asiento</h1>

@include('_messages.errors')

<button id="crearmotivo" class="btn btn-success form-group" data-toggle="modal" data-target="#CrearMotivo">
  Agregar Motivo
</button>

<!-- Modal -->
<div class="modal fade" id="CrearMotivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Agregar Motivo</h4>
      </div>
      <div id="div_crearmotivo" class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
      {{ Form::select('CON_MotivoTransaccion_ID',$Motivos,'',array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
    <label>Debe</label>
    	<input id="debe" type="text" disabled="">
    <label>Haber</label>
    	<input id="haber" type="text" disabled="">
    </div> 
    <div class="form-group">
      {{ Form::label('CON_LibroDiario_Monto', 'Importe:') }}
      {{ Form::input('text', 'CON_LibroDiario_Monto','',array('placeholder'=>'.##')) }}

    </div> 
	<div class='form-group'>    
            {{ Form::label('CON_LibroDiario_Observacion', 'Observacion:') }}
            {{ Form::input('text', 'CON_LibroDiario_Observacion') }}
    </div>
    
     
			{{ Form::submit('Crear', array('class' => 'btn btn-info')) }}
		
	
{{ Form::close() }}


@stop
@section('contabilidad_scripts')
  <script type="text/javascript">

  $(document).ready(function(){
        $('input').addClass('form-control');

        $('#CON_MotivoTransaccion_ID').on('click',function(){
         $.post('{{{URL::route("cargarcuentas")}}}',{id:$("#CON_MotivoTransaccion_ID").val()}).success(function(data){
            $("#debe").val(""+data.v1);
            $('#haber').val("\t"+data.v2);
          });
        });
         $('#crearmotivo').on('click',function(){
            $.post('{{{URL::route("crearmotivo")}}}',{}).success(function(data){

              $('#div_crearmotivo').html(data);
            });
         });

    });
</script>
@stop


