@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Campo Local &gt; <small>Editar Campo Local</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Compras/Configuracion/OrdenCompra') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>
@if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="alert alert-danger">:message</li>')) }}
	</ul>
            
@endif
             {{ Form::model($OrdenCompra, array('method' => 'PATCH', 'route' => array('actualizar', 'id'=>$OrdenCompra->GEN_CampoLocal_ID), 'class' => 'form-horizontal', 'role' => 'form' )) }}
            
             
             
                 <div class="form-group">
                     {{ Form::label('GEN_CampoLocal_Nombre', 'Nombre', array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-4">
                         {{ Form::text('GEN_CampoLocal_Nombre', $OrdenCompra->GEN_Campo_Local_Nombre ,array('class' => 'form-control', 'id' => 'GEN_CampoLocal_Nombre', 'placeholder'=>'Nombre')) }}
                     </div>
                     
                 </div>
                 <div class="form-group" >
                     
                     {{ Form::label('GEN_CampoLocal_Tipo', 'Tipo de Campo', array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-5">
                         {{ Form::select('GEN_CampoLocal_Tipo', array('TXT' => 'Texto', 'INT' => 'Entero', 'FLOAT' => 'Decimal', 'LIST' => 'Lista de Valores'),null, array('disabled', 'class' => 'col-md-4 form-control')) }}
                     </div>
                     
                     
                 </div>
                 <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <label class="checkbox-inline control-label">
                        {{ Form::checkbox('GEN_CampoLocal_Activo') }}
                        Activo
                    </label>
                <label class="checkbox-inline control-label">
                {{ Form::checkbox('GEN_CampoLocal_Requerido') }}
                Requerido
                
                </label>
            <label class="checkbox-inline control-label"> 
                {{ Form::checkbox('GEN_CampoLocal_ParametroBusqueda') }}
                Parámetro de Busqueda 
            </label>
             </div>
            </div>
             <div class="row">
                
                <div class="col-md-1 col-md-offset-7">{{ Form::submit('Actualizar', array('class' => 'btn btn-default btn-md ')) }}</div>
                
            </div>
             
             {{ Form::close() }}
             
             



@stop
