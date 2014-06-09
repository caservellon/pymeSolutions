@extends('layouts.scaffold')

@section('main')
<?php $empresa= Seguridad::Compania(); ?>
<div class="page-header clearfix">
      <h3 class="pull-left">Solicitud Cotizacion &gt; <small>Detalle</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Compras/SolicitudCotizacions') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atras</a>
      </div>
</div>  


            
            
            <div class="row">
    <div class="col-md-4 " ></div>
    <div class="col-md-4 " style="text-align: center">
        <h2> Solicitud de Cotizacion</h2>
        <h5><?php echo $empresa->SEG_Config_NombreEmpresa; ?></h5>
        <h5><?php echo $empresa->SEG_Config_Direccion; ?></h5>
        <h5>Honduras C.A.</h5>
    </div>
    <div class="col-md-4 " style="text-align: right">
        <h5 >Tel: <?php echo " ".$empresa->SEG_Config_Telefono; echo '  '; echo $empresa->SEG_Config_Telefono2; ?></h5>
    </div>
</div>
            <div class="row">
             <div class="col-md-4">
            <h4>Para:</h4>
            <h5>{{{$proveedor->INV_Proveedor_Nombre}}}</h5>
            <h5>{{$proveedor->INV_Proveedor_Email}}</h5>
            <h5>{{$proveedor->INV_Proveedor_Direccion}}</h5>
            <h5>{{$proveedor->INV_Proveedor_Telefono}}</h5>
             </div>
            </div>
            
            
                <div class="table-responsive">
                <table class="table table-striped table-bordered">
		<thead>
			<tr>
				
				<th>Nombre</th>
				<th>Descripcion</th>
                                <th>Cantidad a Solicitar</th>
                                <th>Unidad</th>
                                <?php // $lista = CampoLocal::where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get();
//                                foreach ($lista as $campo){ ?>
<!--                                    <th><?php //echo $campo->GEN_CampoLocal_Nombre ?></th>-->
                                <?php //} ?>
                                
                                
                                
			</tr>
		</thead>

		<tbody>
                    
                    
                <?php $oficial=''; ?>
                    @foreach($solicitud as $key)
                
			
                        
                                    <?php $cualquierProducto1= invCompras::ProductoCompras($key->Producto_idProducto);  ?>
                                    
                                    <tr>
					
                                       
                                        
					<td>{{{ $cualquierProducto1->INV_Producto_Nombre }}}</td>
					<td>{{{ $cualquierProducto1->INV_Producto_Descripcion }}}</td>
                                        <td>{{{$key->COM_DetalleSolicitudCotizacion_cantidad}}}</td>
					
                                        
                                        <?php $unidad= invCompras::UnidadCompras($cualquierProducto1->INV_UnidadMedida_ID) ?>
                                        <td>{{{ $unidad->INV_UnidadMedida_Nombre }}}</td>
                                      <?php // foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get() as $campo){ 
//					    if (DB::table('COM_ValorCampoLocal')->where('COM_CampoLocal_IdCampoLocal',$campo->GEN_CampoLocal_ID)->where('COM_SolicitudCotizacion_IdSolicitudCotizacion',$key->SolicitudCotizacion_idSolicitudCotizacion)->count() > 0 ){ ?>
					    	<!--<td><?php // echo DB::table('COM_ValorCampoLocal')->where('COM_CampoLocal_IdCampoLocal',$campo->GEN_CampoLocal_ID)->where('COM_SolicitudCotizacion_IdSolicitudCotizacion',$key->SolicitudCotizacion_idSolicitudCotizacion)->first()->COM_ValorCampoLocal_Valor ?></td>-->
                                            <?php // }else{?>
<!--					    	<td></td>-->
                                        <?php // }} ?>
                                        
                                        
                                </tr>
                               
                     <?php $oficial=$key->COM_Usuario_idUsuarioCreo; ?>
                    @endforeach
                </tbody> 
             </table>
          </div>
          <div class="row" >
                <div class="col-md-6" ><label></label></div>
                <div class="col-md-6" style="text-align: right"><label>Oficial Compras</label><h5>{{$oficial}}</h5></div>
            </div>
            <hr>   
                
               
          
                














@stop
