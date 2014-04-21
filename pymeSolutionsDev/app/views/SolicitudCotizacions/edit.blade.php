@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Solicitud Cotizacion &gt; <small>Editar Solicitud Cotizacion</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Compras/SolicitudCotizacions') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>

             {{ Form::model($Solicitud, array('method' => 'PATCH', 'route' => array('Compras.SolicitudCotizacions.update', $Solicitud->COM_SolicitudCotizacion_IdSolicitudCotizacion), 'class' => 'form-horizontal', 'role' => 'form' )) }}
            
             
             
                 <div class="form-group">
                     {{ Form::label('COM_SolicitudCotizacion_Codigo', 'Codigo', array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-4">
                         {{ Form::text('COM_SolicitudCotizacion_Codigo', null, array('disabled', 'class' => 'col-md-4 form-control')) }}
                     </div>
                     
                 </div>
                 <div class="form-group" >
                     
                     {{ Form::label('COM_SolicitudCotizacion_Recibido', 'Estado', array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-5">
                         {{ Form::select('COM_SolicitudCotizacion_Recibido', array('1' => 'Recibido', '0' => 'En Espera'), '0',array('class' => 'col-md-4 form-control')) }}
                     </div>
                     
                     
                 </div>
                 <div class="form-group">
                <div class="col-md-6 col-md-offset-2">
                    <label class="checkbox-inline control-label">
                        {{ Form::checkbox('COM_SolicitudCotizacion_Activo') }}
                        Activo
                    </label>
                
             </div>
            </div>
             <div class="row">
                
                <div class="col-md-1 col-md-offset-7">{{ Form::submit('Actualizar', array('class' => 'btn btn-default btn-md ')) }}</div>
                
            </div>
             
             {{ Form::close() }}
             
             



@stop
