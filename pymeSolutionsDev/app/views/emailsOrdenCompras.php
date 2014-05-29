<?php for($i=0; $i<count($email); $i++){ $orden= OrdenCompra::find($email[$i]); ?>
<?php $proveedores = invCompras::ProveedorCompras($orden->COM_Proveedor_IdProveedor); ?>
            <div class="row">
    <div class="col-md-4 " ></div>
    <div class="col-md-4 " style="text-align: center">
        <h2> Orden de Compra</h2>
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
                    
                    
                 <?php $detalle = COMDetalleOrdenCompra::all(); 
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
                                        <?php $forma= invCompras::FormaPagoCompras($solCot->COM_SolicitudCotizacion_FormaPago) ?>
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
<div class="venta-info" style="text-align:right;" >
    <div>
        <label>Sub Total: </labe><label><?php echo $subTotal; ?></label>
        </div>
        <div>
            <?php $ISV=($orden->COM_OrdenCompra_ISV/100); ?>
           <label>ISV: </labe><label><?php echo $ISV; ?></label> 
        </div>
        <div>
         <span class="bold-span">ISV: </span> <span class="bold-span"><label style="margin-left:68px; text-align:right;">Lps.</label> <input type="text"  id="isv" value="{{$subTotal*0.15}}" readonly="readonly" style="border-width:0;  background-color:rgba(0,0,0,0); max-width:90px; text-align:right;"/></span>
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

             
                
               
          
                





