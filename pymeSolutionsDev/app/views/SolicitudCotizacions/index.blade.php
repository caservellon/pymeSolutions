@extends('layouts.scaffold')

@section('main')



<h2 class="sub-header">Todas las Solicitudes de Cotizacion</h2>
<div class="pull-right">
        <a href="{{{ URL::to('Compras/SolicitudCotizacion') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
          <div  class="col-md-9" >
                          
                                 <div class="col-xs-5 col-sm-6 col-md-12">
                                    {{ Form::open(array('route' => 'SolicitudCotizacions.search_index')) }}
                                    {{ Form::label('SearchLabel', 'Busqueda: ', array('class' => 'col-md-2 control-label')) }}
                                    {{ Form::text('search', null, array('class' => 'col-md-4', 'form-control', 'id' => 'search', 'placeholder'=>'Buscar por nombre, ciudad, codigo..')) }}
                                    {{ Form::submit('Buscar', array('class' => 'btn btn-success btn-sm' )) }}
                                    {{ Form::close() }}
                                </div>
             
             
          </div>
            @if($SolicitudCotizacions->count())
            
                <div class="table-responsive">
                <table class="table table-striped">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Proveedor</th>
				<th>Fecha</th>
				<th>Usuario</th>
				<th>Estado</th>
                                <th>FormaPago</th>
                                <th>PlanPago</th>
                                <th>PeriodoGracia</th>
				@foreach($CamposLocales as $CampoLocal)
                                                @if($CampoLocal->GEN_CampoLocal_Activo==1)
						<th>{{{ $CampoLocal->GEN_CampoLocal_Nombre }}}</th>
                                                @endif
				@endforeach
				<th>Activo</th>
				
			</tr>
		</thead>

		<tbody>
			@foreach ($SolicitudCotizacions as $editars)
				<tr>
					<td>{{{ $editars->COM_SolicitudCotizacion_Codigo }}}</td>
                                        <?php $proveedor= invCompras::ProveedorCompras($editars->Proveedor_idProveedor) ?>
					<td><a>{{{ $proveedor->INV_Proveedor_Nombre }}}</a></td>
					<td>{{{ $editars->COM_SolicitudCotizacion_FechaEmision }}}</td>
					@if($editars->COM_Usuario_idUsuarioCreo==1)
                                           <td>Juan</td>
                                           @endif
					@if($editars->COM_SolicitudCotizacion_Recibido == 1)
							<td>Recibido</td>
						@else
							<td>En Espera</td>
						@endif
                                         <?php $forma= invCompras::FormaPagoCompras($editars->COM_SolicitudCotizacion_FormaPago) ?>
                                        <td>{{{ $forma->INV_FormaPago_Nombre }}}</td>
                                        <td>{{{ $editars->COM_SolicitudCotizacion_CantidadPago }}}</td>
                                        <td>{{{ $editars->COM_SolicitudCotizacion_PeriodoGracia }}}</td>
                                        
					@foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get() as $campo)
					    @if (DB::table('COM_ValorCampoLocal')->where('COM_CampoLocal_IdCampoLocal',$campo->GEN_CampoLocal_ID)->where('COM_SolicitudCotizacion_IdSolicitudCotizacion',$editars->COM_SolicitudCotizacion_IdSolicitudCotizacion)->count() > 0 )
					    	<td>{{{ DB::table('COM_ValorCampoLocal')->where('COM_CampoLocal_IdCampoLocal',$campo->GEN_CampoLocal_ID)->where('COM_SolicitudCotizacion_IdSolicitudCotizacion',$editars->COM_SolicitudCotizacion_IdSolicitudCotizacion)->first()->COM_ValorCampoLocal_Valor }}}</td>
					    @else
					    	<td></td>
					    @endif
					@endforeach
					
					@if($editars->COM_SolicitudCotizacion_Activo == 1)
							<td>Activo</td>
						@else
							<td>Inactivo</td>
						@endif

					<td>{{ link_to_route('Compras.SolicitudCotizacions.edit', 'Editar', array($editars->COM_SolicitudCotizacion_IdSolicitudCotizacion),array('class' => 'btn btn-info')) }}</td>

                                        <td>{{ link_to_route('detalle', 'Detalle', array('prov'=>$editars->Proveedor_idProveedor, 'solCot'=> $editars->COM_SolicitudCotizacion_IdSolicitudCotizacion), array('class' => 'btn btn-success')) }}</td>

        
                                </tr>
                @endforeach
                
            
                </tbody> 
             </table>
          </div>
   
                







            


@endif
<div>
                <h6>{{$SolicitudCotizacions->links()}}</h6>
            </div>

@stop
