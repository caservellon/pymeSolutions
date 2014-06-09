<?php for($i=0; $i<count($email); $i++){ $orden= OrdenCompra::find($email[$i]); ?>
<?php $proveedores = invCompras::ProveedorCompras($orden->COM_Proveedor_IdProveedor);
$empresa= Seguridad::Compania(); ?>
            <div class="row">
    <div class="col-md-4 " ></div>
    <div class="col-md-4 " style="text-align: center">
        <h2> Orden de Compra</h2>
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
                                <th>Precio Unitario</th>
                                <th>Unidad</th>
                                <th>FormaPago</th>
                                <?php $lista = CampoLocal::where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_OC%')->get();
                                foreach ($lista as $campo){ ?>
                                    <th><?php echo $campo->GEN_CampoLocal_Nombre ?></th>
                                <?php } ?>
                                
			</tr>
		</thead>

		<tbody>
                    
                    
                 <?php $detalle = COMDetalleOrdenCompra::where('COM_DetalleOrdenCompra_idOrdenCompra','=', $orden->COM_OrdenCompra_IdOrdenCompra)->get();  
                       $subTotal=0;
                 ?>
                    <?php 
                    foreach($detalle as $key){ 
                       
                    if($orden->COM_OrdenCompra_IdOrdenCompra == $key->COM_DetalleOrdenCompra_idOrdenCompra){
                    $cualquierProducto1= Producto::find($key->COM_Producto_idProducto) ?>
                                    <tr>
					
                                       
                                        
					<td><?php echo $cualquierProducto1-> INV_Producto_Nombre; ?></td>
					<td><?php echo $cualquierProducto1->INV_Producto_Descripcion ?></td>
                                        <td><?php echo $key->COM_DetalleOrdenCompra_Cantidad ?></td>
					<td><?php echo $key->COM_DetalleOrdenCompra_PrecioUnitario ?></td>
                                        
                                        <?php $unidad= invCompras::UnidadCompras($cualquierProducto1->INV_UnidadMedida_ID) ?>
                                        <td><?php echo $unidad->INV_UnidadMedida_Nombre ?></td>
                                        <?php $forma= invCompras::FormaPagoCompras($orden->COM_OrdenCompra_FormaPago) ?>
                                        <td><?php echo $forma->INV_FormaPago_Nombre ?></td>
                                        <?php foreach (DB::table('GEN_CampoLocal')->where('GEN_CampoLocal_Activo','1')->where('GEN_CampoLocal_Codigo','LIKE','COM_OC%')->get() as $campo){ 
					    if (DB::table('COM_ValorCampoLocal')->where('COM_CampoLocal_IdCampoLocal',$campo->GEN_CampoLocal_ID)->where('COM_OrdenCompra_IdOrdenCompra',$orden->COM_OrdenCompra_IdOrdenCompra)->count() > 0 ){ ?>
					    	<td><?php echo DB::table('COM_ValorCampoLocal')->where('COM_CampoLocal_IdCampoLocal',$campo->GEN_CampoLocal_ID)->where('COM_OrdenCompra_IdOrdenCompra',$orden->COM_OrdenCompra_IdOrdenCompra)->first()->COM_ValorCampoLocal_Valor ?></td>
                                            <?php }else{?>
					    	<td></td>
                                        <?php }} ?>
					
                                       
                                        
                                        
                                </tr>
                    <?php $subTotal=$subTotal+($key->COM_DetalleOrdenCompra_PrecioUnitario*$key->COM_DetalleOrdenCompra_Cantidad);}}?>
                </tbody> 
             </table>
          </div>
<div class='row'>
    <div style="text-align:left;" >
    <div>
        <label>Plan de Pago: </labe><label><?php echo $orden->COM_OrdenCompra_CantidadPago; ?></label>
    </div>
        <div>
            
           <label>Periodo Gracia: </labe><label><?php echo $orden->COM_OrdenCompra_PeriodoGracia; ?></label> 
        </div>
        
      
</div>
<div class="venta-info" style="text-align:right;" >
    <div>
        <label>Sub Total: </labe><label><?php echo $subTotal; ?></label>
        </div>
        <div>
            <?php $ISV=($orden->COM_OrdenCompra_ISV/100)*$subTotal; ?>
           <label>ISV: </labe><label><?php echo $ISV; ?></label> 
        </div>
        <hr>
        <div>
            <label>Total: </label> <label><?php echo $orden->COM_OrdenCompra_Total; ?></label>
              
        </div>
</div>


            <div class="row" >
                <div class="col-md-6" ><label></label></div>
                <div class="col-md-6" style="text-align: right"><h5>Nombre del Oficial de Compras</h5></div>
            </div>
            <hr>
            <?php } ?>

             
                
               
          
                





