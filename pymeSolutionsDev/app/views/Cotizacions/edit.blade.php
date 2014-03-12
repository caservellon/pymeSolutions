@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Configuracion &gt; <small>editar Parametrizar Cotizacion</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Compras/Cotizacions/editarParametrizar') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span>atras</a>
      </div>
</div>
<h1>Editar Parametrizacion</h1>

	<div class="col-md-4 col-md-offset-1">
             
             <div class="row">
                 <h4>Actualizar Campos Locales</h4>
             </div>
            @if ($errors->any())
	<ul>
		{{ implode('', $errors->all('<li class="error">:message</li>')) }}
	</ul>
@endif
             {{ Form::model($Cotizacion, array('method' => 'PATCH', 'route' => array('Compras.Cotizacions.update', $Cotizacion->GEN_CampoLocal_ID))) }}
            <div class="row">
                
                <div class="col-md-1 col-md-offset-7">{{ Form::submit('Actualizar', array('class' => 'btn btn-default btn-md ')) }}</div>
            </div>
             
                 <div class="form-group">
                     {{ Form::label('GEN_CampoLocal_Nombre', 'Nombre') }}
                     {{ Form::text('GEN_CampoLocal_Nombre') }}
                 </div>
                 <div class="form-group" >
                     
                     {{ Form::label('GEN_CampoLocal_Tipo', 'Tipo') }}
                     {{ Form::select('GEN_CampoLocal_Tipo', array('Numerico'=>'Numerico', 'Texto'=>'Texto', 'Float'=>'Float', 'ListaValor'=>'Lista de Valor'),null, array('disabled')) }}
                     
                 </div>
                 <div class="form-group">
                     {{ Form::checkbox('GEN_CampoLocal_Requerido') }}
                     {{ Form::label('GEN_CampoLocal_Requerido', 'Requerido') }}
                     <!--{{ Form::select('GEN_CampoLocal_Requerido', array('1' => 'Activado', '0' => 'Desactivado')) }}-->
            
                 </div>
                 <div class="form-group">
                     {{ Form::checkbox('GEN_CampoLocal_ParametroBusqueda') }}
                     {{ Form::label('GEN_CampoLocal_ParametroBusqueda', 'Parametro de Busqueda') }}
<!--                     {{ Form::select('GEN_CampoLocal_ParametroBusqueda', array('1' => 'Activado', '0' => 'Desactivado')) }}-->
                 </div>
                 <div class="form-group">
                     {{ Form::checkbox('GEN_CampoLocal_Activo') }}
                     {{ Form::label('GEN_CampoLocal_Activo', 'Activo') }}
                     <!--{{ Form::select('GEN_CampoLocal_Activo', array('1' => 'Activado', '0' => 'Inactivo')) }}-->
                
                  </div>
             {{ Form::close() }}



@stop