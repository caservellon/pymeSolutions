<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



class ReembolsoDevolucionCompra extends Eloquent {
	protected $guarded = array();
    protected $table = 'COM_ReembosoDevolucionCompras';
	protected $primaryKey = 'COM_ReembosoDevolucionCompras_ID';
	 
	public $timestamps = false;
	
	public static $rules = array(
  'COM_ReembosoDevolucionCompras_ID' => 'required' ,
  'COM_ReembosoDevolucionCompras_FechaCreacion' => 'required' ,
  'COM_ReembosoDevolucionCompras_UsuarioCreo' => 'required' ,
  'COM_ReembosoDevolucionCompras_Monto' => 'required' ,
  'COM_ReembosoDevolucionCompras_Proveedor' => 'required' ,
  'COM_DevolucionCompra_COM_DevolucionCompra_ID' => 'required' 

	);
	
	public static $rule = array(
		
	);
}
?>