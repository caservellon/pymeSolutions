@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Configuracion &gt; <small>Parametrizar Cotizacion</small></h3>
 
      <div class="pull-right">
        <a href="{{{ URL::to('Compras') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>atras</a>
      </div>
</div>


    
    <div class="row"> 
        
        <div class="col-md-3 col-md-offset-1">
            <h4>Campos por defecto</h4>
             <h5>Codigo del Proveedor</h5>
             <h5>Nombre del Proveedor</label>
             <h5>Codigo del Producto</h5>
             <h5>Nombre del Producto</h5>
             <h5>Cantidad del Producto</h5>
             <h5>Unidad de Medida</h5>
             <h5>Precio del producto</h5>
        </div>
        <div class="col-md-3 col-md-offset-1">   
             <h4 style="visibility: hidden">.</h4>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             <h5 class="is-hidden">Activo</h5>
             
         </div>
        <br>
    </div>
    
        <div class="row">
        
        @if($parametrizar->count())
            
            <div class="col-md-3 col-md-offset-1">
                <h4>Campos Locales</h4>
                @foreach($parametrizar as $campolocal)
                    <h5>{{$campolocal->GEN_CampoLocal_Nombre}}</h5>
                @endforeach
            </div>
                
        <div class="col-md-3 col-md-offset-1">
            <h4 style="visibility: hidden">.</h4>
            @foreach($parametrizar as $campolocal)
                @if($campolocal->GEN_CampoLocal_Activo==1)
                
                    <h5 class="is-hidden">Activo</h5>
                @else
                    <h5 class="is-hidden">Inactivo</h5>
                @endif 
            @endforeach
        </div>
                
        @endif
        </div>
<div class="col-md-3 col-md-offset-1">
    <div class="row">
                 <h4>Crear Campos Locales</h4>
    </div>
    @if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="alert alert-danger">:message</li>')) }}
	</ul>
 @endif
</div>
             
             <!--@inlcude('_menssages.errors')-->
             
             {{ Form::open(array('route' => 'campoLocal', 'class' => "form-horizontal" , 'role' => 'form' )) }}
            <div class="row">
                
                <div class="col-md-1 col-md-offset-7">{{ Form::submit('Guardar', array('class' => 'btn btn-default btn-md')) }}</div>
            </div>
             
                 <div class="form-group">
                     {{ Form::label('GEN_CampoLocal_Nombre', 'Nombre',array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-4">
                        {{ Form::text('GEN_CampoLocal_Nombre', null, array('class' => 'form-control', 'id' => 'GEN_CampoLocal_Nombre', 'placeholder'=>'Nombre')) }}
                     </div>
                 </div>
                 <div class="form-group">
                     
                     {{ Form::label('GEN_CampoLocal_Tipo', 'Tipo', array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-5">
                        {{ Form::select('GEN_CampoLocal_Tipo', array('Numerico'=>'Numerico', 'Texto'=>'Texto', 'Float'=>'Float', 'ListaValor'=>'Lista de Valor'), '1',array('class' => 'col-md-4 control-label'));}}
                     </div>
                 </div>
                 <div class="form-group">
                     <div class="col-md-5">
                         {{ Form::checkbox('GEN_CampoLocal_Requerido') }}
                     </div>
                     
                     {{ Form::label('GEN_CampoLocal_Requerido', 'Requerido', array('class' => 'col-md-2 control-label')) }}
                     <!--{{ Form::select('GEN_CampoLocal_Requerido', array('1' => 'Activado', '0' => 'Desactivado')) }}-->
            
                 </div>
                 <div class="form-group">
                     <div class="col-md-5">
                         {{ Form::checkbox('GEN_CampoLocal_ParametroBusqueda') }}
                     </div>
                         
                     
                     {{ Form::label('GEN_CampoLocal_ParametroBusqueda', 'Parametro de Busqueda', array('class' => 'col-md-2 control-label')) }}
                     <!--{{ Form::select('GEN_CampoLocal_ParametroBusqueda', array('1' => 'Activado', '0' => 'Desactivado')) }}-->
                 </div>
                 <div class="form-group">
                     <div class="col-md-5">
                         {{ Form::checkbox('GEN_CampoLocal_Activo','1',true) }}
                     </div>
                     
                     {{ Form::label('GEN_CampoLocal_Activo', 'Activo', array('class' => 'col-md-2 control-label')) }}
                     <!--{{ Form::select('GEN_CampoLocal_Activo', array('1' => 'Activado', '0' => 'Inactivo')) }}-->
                
                  </div>
             {{ Form::close() }}


        </div>
    

@stop