@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Campo Local &gt; <small>Nuevo Campo Local</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Compras/Configuracion/OrdenCompra') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atras</a>
      </div>
</div>


    @if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="alert alert-danger">:message</li>')) }}
	</ul>
 @endif

             
             {{ Form::open(array('route' => 'campoLocalOrden', 'class' => "form-horizontal" , 'role' => 'form' )) }}       
                 
             <div class="form-group">
                     {{ Form::label('GEN_CampoLocal_Nombre', 'Nombre',array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-4">
                        {{ Form::text('GEN_CampoLocal_Nombre', null, array('class' => 'form-control', 'id' => 'GEN_CampoLocal_Nombre', 'placeholder'=>'Nombre')) }}
                     </div>
                 </div>
                 <div class="form-group">
                     
                     {{ Form::label('GEN_CampoLocal_Tipo', 'Tipo de Campo', array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-5">
                        {{ Form::select('GEN_CampoLocal_Tipo', array('TXT' => 'Texto', 'INT' => 'Entero', 'FLOAT' => 'Decimal', 'LIST' => 'Lista de Valores'),'TXT',array('class' => 'col-md-4 form-control'))}}
                     </div>
                 </div>      
                 <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <label class="checkbox-inline control-label">
                        {{ Form::checkbox('GEN_CampoLocal_Activo','1',true) }}
                        Activo
                    </label>
                <label class="checkbox-inline control-label">
                {{ Form::checkbox('GEN_CampoLocal_Requerido', '1') }}
                Requerido
                
                </label>
            <label class="checkbox-inline control-label"> 
                {{ Form::checkbox('GEN_CampoLocal_ParametroBusqueda', '1') }}
                Parámetro de Busqueda 
            </label>
             </div>
            </div>
                 <div class="form-group">
                  
             <div class="form-group">
                <div class="col-md-5 ">
                
                {{ Form::submit('Guardar', array('class' => 'btn btn-info')) }}
                </div>
            </div>
             {{ Form::close() }}


        </div>
    

@stop