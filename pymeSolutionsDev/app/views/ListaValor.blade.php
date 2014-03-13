@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Configuracion &gt; <small>Crear Lista de Valores de Cotizacion</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Compras/Configuracion/Cotizacion') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>atras</a>
      </div>
</div>
 <?php $listavalor = CampoLocalLista::where('GEN_CampoLocal_GEN_CampoLocal_ID','=',$suma)->get();?>
<div class="col-md-3 col-md-offset-1">
        <div class="row">
        <h4>Lista de Valores</h4>
        @if($listavalor->count())
            @foreach($listavalor as $campolocal)
                <h4>{{$campolocal->GEN_CampoLocalLista_Valor}}</h4>
               
        @endforeach
        @endif
        </div>
    </div> 

    
    @if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="alert alert-danger">:message</li>')) }}
	</ul>
     @endif


     
               
             {{ Form::open(array('class' => "form-horizontal" , 'role' => 'form' , 'route' => array('listavalor', $suma))) }}
             
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

    

@stop
