@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h2>Unidad Monetaria ><small> Editar</small>
     <a class='btn btn-primary pull-right ' href="{{URL::route('unidadmonetaria')}}">
    <i class="glyphicon glyphicon-arrow-left"></i> Atras</a></h2>
</div>

@include('_messages.errors')

{{ Form::model($UnidadMonetaria, array('class'=>'form-horizontal','role'=>'form','action' => array('UnidadMonetariaController@update', $UnidadMonetaria->CON_UnidadMonetaria_ID), 'method' => 'PUT')) }}
	
         <div class="form-group">
            {{ Form::label('CON_UnidadMonetaria_Nombre', 'Nombre de la moneda:*') }}
            <div class='col-md-5'>
            {{ Form::text('CON_UnidadMonetaria_Nombre',$UnidadMonetaria->CON_UnidadMonetaria_Nombre,array('maxlength'=>'45')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('CON_UnidadMonetaria_TasaConversion', 'Tasa Conversion:*') }}
            <div class='col-md-2'>
                {{ Form::text('CON_UnidadMonetaria_TasaConversion',$UnidadMonetaria->CON_UnidadMonetaria_TasaConversion,array('maxlength'=>'5','placeholder'=>'##.##')) }}
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('CON_UnidadMonetaria_Observacion', 'Observacion:') }}
            <div class='col-md-8'>
            {{ Form::text('CON_UnidadMonetaria_Observacion',$UnidadMonetaria->CON_UnidadMonetaria_Observacion,array('maxlength'=>'255')) }}
            </div>
        </div>

        <div class="form-group">
            <div class='col-md-3'>
            {{ Form::submit('Actualizar', array('class' => 'btn btn-success')) }}
            </div>
        </div>
	
{{ Form::close() }}



@stop

@section('contabilidad_scripts')
    <script type="text/javascript">
         $(document).ready(function(){

        $("input").addClass("form-control");
        $("label").addClass('col-md-2 control-label pull-left');
    });

</script>
@stop