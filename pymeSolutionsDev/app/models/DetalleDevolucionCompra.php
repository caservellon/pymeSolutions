<?php 
class DetalleDevolucionCompra extends Eloquent {
	protected $guarded = array();
    protected $table = 'COM_DetalleDevolucionCompra';
	protected $primaryKey = 'COM_DetalleDevolucionCompra_ID';
	 
	public $timestamps = false;
	
	public static $rules = array(
			'COM_DetalleDevolucionCompra_ID' => 'required' ,
  			'COM_DetalleDevolucionCompra_Codigo' => 'required' ,
  			'COM_DetalleDevolucionCompra_Cantidad' => 'required' ,
  			'COM_DetalleDevolucionCompra_PrecioUnitario' => 'required' ,
  			'COM_Producto_idProducto' => 'required' ,
  			'COM_Usuario_idUsuarioCreo' => 'required' ,
  			'COM_DetalleDevolucionCompra_FechaCreo' => 'required' ,
  			'COM_DevolucionCompra_ID' => 'required' 
	);
	
	public static $rule = array(
		
	);
}
?>