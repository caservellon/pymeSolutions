@extends('layouts.scaffold')

@section('main')



@include('_messages.errors')
<div class="page-header">
    <h1>Motivo de Inventario > <small>Editar</small><a href="{{{ URL::to('contabilidad/configuracion/motivoinventarios') }}}" class="btn btn-sm btn-primary pull-right">
    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a></h1>
</div>
{{ Form::model($MotivoInventario, 
      array(
      'class' => 'form-horizontal',
      'action' => $action,
      'method' => 'POST')) }}         

	     <div class="form-group"> 
		  	{{ Form::label('', 'Nombre: ') }}
		  	<div class="col-md-5">
		  		 {{ Form::input('text',null,$concepto->INV_MotivoMovimiento_Nombre ,array('disabled')) }}
		    </div>
  		 </div>
        <div class="form-group"> 
        	{{ Form::label('', 'Observacion: ') }}
        	<div class="col-md-5">
        		{{ Form::input('text',null,$concepto->INV_MotivoMovimiento_Observaciones ,array('disabled')) }}
        	</div>
        </div>
        <div class="form-group"> 
            {{ Form::label('CON_MotivoTransaccion_ID', 'MotivoTransaccion:*') }}
            <div class="col-md-5">
         {{ Form::select('CON_MotivoTransaccion_ID',$Motivos,Input::get('CON_MotivoTransaccion_ID'),array('class'=>'form-control')) }}
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
    
      <br>

    @if (isset($id))
   	  {{ Form::hidden('CON_MotivoInventario_ID',$id) }}
      @endif
<div class="form-group">
<div class="col-md-5"> 
			{{ Form::submit('Cambiar', array('class' => 'btn btn-info')) }}
			</div>
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
@stop

