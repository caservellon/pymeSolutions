@extends('layouts.scaffold')

@section('main')
<div class='page-header clearfix'>
<h2>Configuracion > <small>Agregar</small>
    <a class='btn btn-sm btn-primary pull-right ' href="{{URL::to('contabilidad')}}">
    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a></h2>
    
</div>
@include('_messages.errors')


{{ Form::open(array('url' => 'contabilidad/configuracion/motivoinventarios', 'class'=>'form-horizontal')) }}
  

  <p>Nombre: {{{$concepto->INV_MotivoMovimiento_Nombre}}}</p>
  
  

  <p>Observacion: {{{$concepto->INV_MotivoMovimiento_Observacion}}}</p>

          {{ Form::label('CON_MotivoTransaccion_ID', 'MotivoTransaccion:*') }}
      {{ Form::select('CON_MotivoTransaccion_ID',$Motivos,'',array('class'=>'form-control')) }}
    
      <br>

    
		<li>
          
  
  {{ Form::hidden('CON_MotivoInventario_ID',$id) }}

			{{ Form::submit('Cambiar', array('class' => 'btn btn-info')) }}
		  
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

    });
</script>

