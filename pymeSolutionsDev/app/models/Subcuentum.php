<?php

class Subcuentum extends Eloquent {
	
	public function CatalogoContable(){
		return $this->belongsTo('CatalogoContable','CON_CatalogoContable_ID');
	}


	protected $guarded = array();
	public $timestamps = false;
	protected $table ='CON_Subcuenta';
	protected $primaryKey='CON_Subcuenta_ID';

	public static $rules = array(
		//'CON_Subcuenta_ID' => 'required',
		'CON_Subcuenta_Codigo' => 'required|numeric',
		'CON_Subcuenta_Nombre' => 'required|max:45|alpha',
		/*'CON_Subcuenta_FechaCreacion' => 'required',
		'CON_Subcuenta_FechaModificacion' => 'required', */
		'CON_CatalogoContable_ID' => 'required'
	);
}
