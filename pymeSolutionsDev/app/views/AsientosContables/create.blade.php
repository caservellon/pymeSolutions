@extends('layouts.scaffold')

@section('main')

<div class='page-header clearfix'>
<h2>Asiento Contable > <small>Crear</small>
    <a class='btn btn-sm btn-primary pull-right ' href="{{URL::route('con.librodiario')}}">
    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a></h2>
    
</div>

@if($PeriodoContable)
@if(Seguridad::AgregarMotivoAsientosManuales())
<button id="crearmotivo" class="btn btn-info form-group" data-toggle="modal" data-target="#CrearMotivo">
     <i class="glyphicon glyphicon-plus"></i> Agregar Motivo
    </button>
@endif
@include('_messages.errors')



<!-- Modal -->
<div class="modal fade" id="CrearMotivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class='modal-title' id='myModalLabel'>Motivo de Transaccion > <small>Crear</small></h4>

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

{{ Form::open(array('action' => 'AsientosController@store','class'=>'form-horizontal','role'=>'form')) }}

	<!--div class="form-group">
		<a class="btn btn-success" href="{{URL::to('cuentamotivos/create')}}">Agregar Motivo</a>
	</div-->
	<!-- Button trigger modal -->

	<div class='form-group'>
    	{{ Form::label('CON_MotivoTransaccion_ID', 'MotivoTransaccion:*') }}
      <div class='col-md-8 select'>
      {{ Form::select('CON_MotivoTransaccion_ID',$Motivos,'',array('class'=>'form-control')) }}
      </div>
    </div>
    <div class="form-group">
    {{ Form::label('debe', 'Debe: ') }}
    <div class='col-md-5'>
       {{ Form::input('text', 'debe','',array('disabled')) }}
      </div>
    </div>
    <div class="form-group">
    {{ Form::label('haber', 'Haber: ') }}
    <div class='col-md-5'>
       {{ Form::input('text', 'haber','',array('disabled')) }}
      </div>
    </div>
    <div class="form-group">
      {{ Form::label('CON_LibroDiario_Monto', 'Monto del Asiento:*') }}
      <div class='col-md-4'>
          {{ Form::input('text', 'CON_LibroDiario_Monto','',array('placeholder'=>'### ### ###.##','maxlength'=>'12')) }}
      </div>
    </div> 
	 <div class='form-group'>    
            {{ Form::label('CON_LibroDiario_Observacion', 'Observacion:') }}
             <div class='col-md-9'>
            {{ Form::input('text', 'CON_LibroDiario_Observacion','',array('placeholder'=>'Breve Observacion del Asiento','maxlength'=>'255')) }}
            </div>
    </div>
    
      <div class='col-md-3'>
			{{ Form::submit('Crear asiento contable', array('class' => 'btn btn-success')) }}
      </div>
		
	
{{ Form::close() }}


@stop
@section('contabilidad_scripts')
  <script type="text/javascript">

  $(document).ready(function(){
        $('input').addClass('form-control');
        $("label").addClass('col-md-2 control-label pull-left');
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
         $('#CON_MotivoTransaccion_ID').click();
    });
</script>

@else
  <div align="center" class="well container col-md-8 col-md-offset-2">
  
  <h3>No hay periodos contables</h3>
  <a class='btn btn-info btn-lg' href="{{{URL::route('periodocontable')}}}">Crear Nuevo Periodo</a>
  </div>

@endif

@stop


