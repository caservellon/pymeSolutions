@extends('layouts.scaffold')

@section('main')
<div class="page-header clearfix">
      <h3 class="pull-left">Solicitud Cotizacion &gt; <small>Editar Solicitud Cotizacion</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Compras/SolicitudCotizacions') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>


             {{ Form::model($Solicitud, array('method' => 'PATCH', 'route' => array('Compras.SolicitudCotizacions.update', $Solicitud->COM_SolicitudCotizacion_IdSolicitudCotizacion), 'class' => 'form-horizontal', 'role' => 'form' )) }}
            @if ($errors->any())
            <div class="alert alert-danger">
    {{ implode('', $errors->all('<li >:message</li>')) }}
</div>
@endif   
             
             <?php $proveedores= invCompras::ProveedorCompras($Solicitud->Proveedor_idProveedor);
                    ?>
                 <div class="form-group">
                     {{ Form::label('COM_SolicitudCotizacion_Codigo', 'Codigo', array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-4">
                         {{ Form::text('COM_SolicitudCotizacion_Codigo', null, array('disabled', 'class' => 'col-md-4 form-control')) }}
                     </div>
                     
                 </div>
                 <div class="form-group" >
                     
                     {{ Form::label('COM_SolicitudCotizacion_Recibido', 'Estado', array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-5">
                         {{ Form::select('COM_SolicitudCotizacion_Recibido', array('1' => 'Recibido', '0' => 'En Espera'), $Solicitud->COM_SolicitudCotizacion_Recibido, array('class' => 'col-md-4 form-control')) }}
                     </div>
                     
                     
                 </div>
                 <div class="form-group" >
                     
                     {{ Form::label('COM_SolicitudCotizacion_FormaPago', 'Forma Pago', array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-5">
                         <?php $formapago=DB::table('INV_Proveedor_FormaPago')->where('INV_Proveedor_ID', '=',$proveedores->INV_Proveedor_ID)->get();
                  $form=array();
                  $id=array();
                  foreach ($formapago as $forma){
                         $id[]=$forma->INV_FormaPago_ID;
                   }
                   $m= invCompras::FormaPagolista($id);
                   $formas = invCompras::FormaPagoCompras($Solicitud->COM_SolicitudCotizacion_FormaPago);
                 
           ?>
           {{ Form::select('formapago'.$proveedores->INV_Proveedor_Nombre,$m, $formas->INV_FormaPago_Nombre , array('class' => 'col-md-4 form-control')) }}
                     </div>
                     
                     
                 </div>
                 <div class="form-group">
                     {{ Form::label('COM_SolicitudCotizacion_CantidadPago', 'Plan de Pago', array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-4">
                         {{ Form::text('COM_SolicitudCotizacion_CantidadPago', null, array('class' => 'col-md-4 form-control')) }}
                     </div>
                     
                 </div>
                 <div class="form-group">
                     {{ Form::label('COM_SolicitudCotizacion_PeriodoGracia', 'Periodo Gracia', array('class' => 'col-md-2 control-label')) }}
                     <div class="col-md-4">
                         {{ Form::text('COM_SolicitudCotizacion_PeriodoGracia', null, array('class' => 'col-md-4 form-control')) }}
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
            <div class="page-header clearfix">
      <h3 class="pull-left">Solicitud cotizacion &gt; <small>Campos Locales</small></h3>
    </div>
        
        @foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get() as $campo)
            <div class="campo-local-tipo form-group">
                {{ Form::label($campo->GEN_CampoLocal_Codigo, $campo->GEN_CampoLocal_Nombre.":", array('class' => 'col-md-2 control-label')) }}
                @if ($campo->GEN_CampoLocal_Requerido)
                    <label>*</label>
                @endif
                <div class="col-md-5">
                    @if ($campo->GEN_CampoLocal_Tipo == 'TXT' || $campo->GEN_CampoLocal_Tipo == 'INT' || $campo->GEN_CampoLocal_Tipo == 'FLOAT')
                        @if (DB::table('COM_ValorCampoLocal')->where('COM_CampoLocal_IdCampoLocal',$campo->GEN_CampoLocal_ID)->where('COM_SolicitudCotizacion_IdSolicitudCotizacion',$Solicitud->COM_SolicitudCotizacion_IdSolicitudCotizacion)->count() > 0 )
                            {{ Form::text($campo->GEN_CampoLocal_Codigo,DB::table('COM_ValorCampoLocal')->where('COM_CampoLocal_IdCampoLocal',$campo->GEN_CampoLocal_ID)->where('COM_SolicitudCotizacion_IdSolicitudCotizacion',$Solicitud->COM_SolicitudCotizacion_IdSolicitudCotizacion)->first()->COM_ValorCampoLocal_Valor, array('disabled','class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                        @else
                            {{ Form::text($campo->GEN_CampoLocal_Codigo,null, array('disabled','class' => 'form-control', 'id' => $campo->GEN_CampoLocal_Codigo)) }}
                        @endif
                    @endif
                    @if ($campo->GEN_CampoLocal_Tipo == 'LIST')
                        {{ Form::select($campo->GEN_CampoLocal_Codigo, DB::table('GEN_CampoLocalLista')->where('GEN_CampoLocal_GEN_CampoLocal_ID',$campo->GEN_CampoLocal_ID)->lists('GEN_CampoLocalLista_Valor','GEN_CampoLocalLista_ID'),NULL, array('disabled')) }}
                    @endif
                </div>
            </div> 
        @endforeach


   
             <div class="row">
                
                <div class="col-md-1 col-md-offset-7">{{ Form::submit('Actualizar', array('class' => 'btn btn-default btn-md ')) }}</div>
                
            </div>
             
             {{ Form::close() }}
             
             



@stop
