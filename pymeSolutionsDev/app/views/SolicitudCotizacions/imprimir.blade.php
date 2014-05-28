@extends('layouts.scaffold')

@section('main')

<div class="page-header clearfix">
      <h3 class="pull-left">Solicitud Cotizacion &gt; <small>Imprimir</small></h3>
      <div class="pull-right">
        <a href="{{{ URL::to('Compras/SolicitudCotizacion/Imprimir') }}}" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Atras</a>
      </div>
</div>  
<?php 

 

$proveedores = invCompras::ProveedorCompras($imprimir->Proveedor_idProveedor); ?>
{{ Form::open(array('route' => array('Compras.SolicitudCotizacions.store'), 'class' => "form-horizontal" , 'role' => 'form' )) }}
<div class="row">
    <div class="col-md-1 col-md-offset-10"> {{ Form::submit('Imprimir', array('class' => 'btn btn-default btn-md')) }}</div>
</div> 
            <div class="row">
    <div class="col-md-4 " ></div>
    <div class="col-md-4 " style="text-align: center">
        <h2> Solicitud de Cotizacion</h2>
        <h5>Empresa X S.A.</h5>
        <h5>Colonia la America, Tegucigalpa,Francisco Morazán</h5>
        <h5>Honduras C.A.</h5>
    </div>
    <div class="col-md-4 " style="text-align: right">
        <h5 >Tel.2234-9000 Fax.2234-9000</h5>
    </div>
    </div>
            <div class="row">
             <div class="col-md-4">
            <h4>Para:</h4>
            <h5><?php echo $proveedores->INV_Proveedor_Nombre ?></h5>
            <h5><?php echo $proveedores->INV_Proveedor_Email ?></h5>
            <h5><?php echo $proveedores->INV_Proveedor_Direccion ?></h5>
            <h5><?php echo $proveedores->INV_Proveedor_Telefono ?></h5>
             </div>
            </div>

                <div class="table-responsive">
                <table class="table table-striped table-bordered">
		<thead>
			<tr>
				
				<th>Nombre Producto</th>
				<th>Descripcion Producto</th>
                                <th>Cantidad a Solicitar</th>
                                <th>Unidad</th>
                                <th>FormaPago</th>
                                <?php $lista = CampoLocal::where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get();
                                foreach ($lista as $campo){ ?>
                                    <th><?php echo $campo->GEN_CampoLocal_Nombre ?></th>
                                <?php } ?>
                                
			</tr>
		</thead>

		<tbody>
                    
                    
                 <?php $detalle = DetalleSolicitudCotizacion::where('SolicitudCotizacion_idSolicitudCotizacion','=', $imprimir->COM_SolicitudCotizacion_IdSolicitudCotizacion)->get(); 
                    
                    foreach($detalle as $key){ 
                       
                    
                    $cualquierProducto1= invCompras::ProductoCompras($key->Producto_idProducto); ?>
                                    <tr>
					
                                       
                                        
					<td><?php echo $cualquierProducto1->INV_Producto_Nombre; ?></td>
					<td><?php echo $cualquierProducto1->INV_Producto_Descripcion ?></td>
                                        <td><?php echo $key->cantidad ?></td>
					
                                        
                                        <?php $unidad= invCompras::UnidadCompras($cualquierProducto1->INV_UnidadMedida_ID) ?>
                                        <td><?php echo $unidad->INV_UnidadMedida_Nombre ?></td>
                                        <?php $forma= invCompras::FormaPagoCompras($imprimir->COM_SolicitudCotizacion_FormaPago) ?>
                                        <td><?php echo $forma->INV_FormaPago_Nombre ?></td>
                                        <?php foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_SC%')->get() as $campo){ 
					    if (DB::table('COM_ValorCampoLocal')->where('COM_CampoLocal_IdCampoLocal',$campo->GEN_CampoLocal_ID)->where('COM_SolicitudCotizacion_IdSolicitudCotizacion',$imprimir->COM_SolicitudCotizacion_IdSolicitudCotizacion)->count() > 0 ){ ?>
					    	<td><?php echo DB::table('COM_ValorCampoLocal')->where('COM_CampoLocal_IdCampoLocal',$campo->GEN_CampoLocal_ID)->where('COM_SolicitudCotizacion_IdSolicitudCotizacion',$imprimir->COM_SolicitudCotizacion_IdSolicitudCotizacion)->first()->COM_ValorCampoLocal_Valor ?></td>
                                            <?php }else{ ?>
					    	<td></td>
                                        <?php } ?>
					
                                       
                                        
                                        
                                </tr>
                                        <?php }} ?>
                </tbody> 
             </table>
          </div>
          <div class="col-md-4">
            <p>Por favor mandar la cantidad de pagos a realizar y el periodo de gracia para realizar el primer pago a partir de enviar la cotizacion</p>
          </div>
            <div class="row" >
                <div class="col-md-6" ><label></label></div>
                <div class="col-md-6" style="text-align: right"><h5>Nombre del Oficial de Compras</h5></div>
            </div>
            <hr>
            {{Form::close()}}
@stop