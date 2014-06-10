@extends('layouts.scaffold')

@section('main')



<h2 class="sub-header">Todas las Ordenes de Compra</h2>
@if((Seguridad::nuevaOrdenCompraSinCotizacion()) || (Seguridad::nuevaOrdenCompraConCotizacion()) )
<div class="btn-agregar">
    <a type="button" href="{{ URL::to('/Compras/OrdenCompra/Crear') }}" class="btn btn-default">
        <span class="glyphicon glyphicon-shopping-cart"></span> Agregar Ordenes de Compra
    </a>
</div>
@endif
<!--          <div  class="col-md-9" >
                          
                                 <div class="col-xs-5 col-sm-6 col-md-12">
                                    {{ Form::open(array('route' => 'SolicitudCotizacions.search_index')) }}
                                    {{ Form::label('SearchLabel', 'Busqueda: ', array('class' => 'col-md-2 control-label')) }}
                                    {{ Form::text('search', null, array('class' => 'col-md-4', 'form-control', 'id' => 'search', 'placeholder'=>'Buscar por nombre, ciudad, codigo..')) }}
                                    {{ Form::submit('Buscar', array('class' => 'btn btn-success btn-sm' )) }}
                                    {{ Form::close() }}
                                </div>
             
             
          </div>-->
            @if($OrdenCompra->count())
            
                <div class="table-responsive">
                <table class="table table-striped">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Proveedor</th>
				<th>FechaEmision</th>
                                <th>FechaEntrega</th>
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
			@foreach ($OrdenCompra as $editars)
                        
				<tr>
					<td>{{{ $editars->COM_OrdenCompra_Codigo }}}</td>
                                        <?php $proveedor= invCompras::ProveedorCompras($editars->COM_Proveedor_IdProveedor) ?>
					<td><a>{{{ $proveedor->INV_Proveedor_Nombre }}}</a></td>
					<td>{{{ $editars->COM_OrdenCompra_FechaEmision }}}</td>
                                        <td>{{{ $editars->COM_OrdenCompra_FechaEntrega }}}</td>
					
                                           <td>Admin</td>
                                           <!--ayudarme con la parte del estado de la orden-->
                                           <?php 
                                              $historial= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_IdOrdenCompra','=',$editars->COM_OrdenCompra_IdOrdenCompra)->where('COM_TransicionEstado_Activo','=','1')->first();
                                              $estadoa= COM_EstadoOrdenCompra::find($historial->COM_EstadoOrdenCompra_IdEstAct);
                                              
                                           ?>
                                           <td>{{$estadoa->COM_EstadoOrdenCompra_Nombre}}</td>
                                         <?php $forma= invCompras::FormaPagoCompras($editars->COM_OrdenCompra_FormaPago) ?>
                                        <td>{{{ $forma->INV_FormaPago_Nombre }}}</td>
                                        <td>{{{ $editars->COM_OrdenCompra_CantidadPago }}}</td>
                                        <td>{{{ $editars->COM_OrdenCompra_PeriodoGracia }}}</td>
                                        
					@foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_OC%')->get() as $campo)
					    @if (DB::table('COM_ValorCampoLocal')->where('COM_CampoLocal_IdCampoLocal',$campo->GEN_CampoLocal_ID)->where('COM_OrdenCompra_IdOrdenCompra',$editars->COM_OrdenCompra_IdOrdenCompra)->count() > 0 )
					    	<td>{{{ DB::table('COM_ValorCampoLocal')->where('COM_CampoLocal_IdCampoLocal',$campo->GEN_CampoLocal_ID)->where('COM_OrdenCompra_IdOrdenCompra',$editars->COM_OrdenCompra_IdOrdenCompra)->first()->COM_ValorCampoLocal_Valor }}}</td>
					    @else
					    	<td></td>
					    @endif
					@endforeach
					
					@if($editars->COM_OrdenCompra_Activo == 1)
							<td>Activo</td>
						@else
							<td>Inactivo</td>
						@endif
                                       
                                        
					
                                        
                                        <!--<td>{{ link_to_route('detalle', 'Detalle', array('prov'=>$editars->Proveedor_idProveedor, 'solCot'=> $editars->COM_SolicitudCotizacion_IdSolicitudCotizacion), array('class' => 'btn btn-success')) }}</td>-->

        
                                </tr>
                                
                @endforeach
                
            
                </tbody> 
             </table>
          </div>
   
                







            


@endif
<br>
<br>
<br>

@if(!$OrdenCompra->count())
<div class="alert alert-danger">
    <strong>Oh no!</strong> No hay Ordenes de compra disponibles :(
</div>
@endif
<div>
                <h6>{{$OrdenCompra->links()}}</h6>
            </div>

@stop

