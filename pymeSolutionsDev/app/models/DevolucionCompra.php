<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



class DevolucionCompra extends Eloquent {
	protected $guarded = array();
    protected $table = 'COM_DevolucionCompra';
	protected $primaryKey = 'COM_DevolucionCompra_ID';
	 
	public $timestamps = false;
	
	public static $rules = array(
			'COM_DevolucionCompra_ID' => 'required' ,
  			'COM_DevolucionCompra_Codigo' => 'required' ,
  			'COM_DevolucionCompra_FechaEmision' => 'required',
  			'COM_DevolucionCompra_Activo' => 'required' ,
  			'COM_DevolucionCompra_Total' => 'required' ,
  			'COM_DevolucionCompra_FormaPago' => 'required' ,
  			'COM_DevolucionCompra_UsuarioCreo' => 'required' ,
  			'COM_OrdenCompra_COM_OrdenCompra_IdOrdenCompra' => 'required'
	);
	
	public static $rule = array(
		
	);
}
?>