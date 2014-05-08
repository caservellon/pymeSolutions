@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Configuracion &gt; <small>Lista de Valores de Cotizacion</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Compras/Cotizacions/parametrizar') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>atras</a>
      </div>
</div>

<div class="col-md-4 col-md-offset-1">
             
             
             {{ Form::open(array('route' => array('listavalor', $suma))) }}
             
            <div class="row">
                
                <div class="col-md-1 col-md-offset-7">{{ Form::submit('Guardar', array('class' => 'btn btn-default btn-md')) }}</div>
            </div>
                 
                 <div class="form-group">
                     {{ Form::label('GEN_CampoLocalLista_Valor', 'Descripcion',array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-4">
                        {{ Form::text('GEN_CampoLocalLista_Valor', null, array('class' => 'form-control', 'id' => 'GEN_CampoLocalLista_Valor', 'placeholder'=>'Descripcion')) }}
                        
                        {{ Form::hidden('suma', $suma ) }}
                     </div>
                 </div>
             {{ Form::close() }}
</div>
    

@stop
