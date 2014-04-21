

            
            <?php for($i=0; $i<count($email); $i++){ $solCot= SolicitudCotizacion::find($email[$i]); ?>
            <?php $proveedores = Proveedor::find($solCot->Proveedor_idProveedor); ?>
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
                                
                                
			</tr>
		</thead>

		<tbody>
                    
                    
                 <?php $detalle = DetalleSolicitudCotizacion::all(); ?>
                    <?php 
                    foreach($detalle as $key){ 
                       
                    if($solCot->COM_SolicitudCotizacion_IdSolicitudCotizacion == $key->SolicitudCotizacion_idSolicitudCotizacion){
                    $cualquierProducto1= Producto::find($key->Producto_idProducto) ?>
                                    <tr>
					
                                       
                                        
					<td><?php echo $cualquierProducto1-> INV_Producto_Nombre; ?></td>
					<td><?php echo $cualquierProducto1->INV_Producto_Descripcion ?></td>
                                        <td><?php echo $key->cantidad ?></td>
					
                                        
                                        <?php $unidad= UnidadMedida::find($cualquierProducto1->INV_UnidadMedida_ID) ?>
                                        <td><?php echo $unidad->INV_UnidadMedida_Nombre ?></td>
                                       
                                        
                                        
                                </tr>
                    <?php }}?>
                </tbody> 
             </table>
          </div>
            <div class="row" >
                <div class="col-md-6" ><label></label></div>
                <div class="col-md-6" style="text-align: right"><h5>Nombre del Oficial de Compras</h5></div>
            </div>
            <hr>
            <?php } ?>

             
                
               
          
                





