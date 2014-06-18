<?php

class MotivoTransaccion extends Eloquent {
	protected $guarded = array();
	public $timestamps=false;
	protected $table = 'CON_MotivoTransaccion';
	protected $primaryKey = 'CON_MotivoTransaccion_ID';
	//public static $CON_MotivoTransaccion_FechaCreacion=date("Y-m-d");
	//public static $defaults=true;
	
	public static $rules = array(
		'CON_MotivoTransaccion_Codigo' => 'required|unique:CON_MotivoTransaccion,CON_MotivoTransaccion_Codigo',
		'CON_MotivoTransaccion_Descripcion' => 'required'
	);

	public function __construct(){
		$User=Auth::user()->SEG_Usuarios_Username;
		$Date=date("Y-m-d");
		$this->attributes=array('CON_MotivoTransaccion_FechaCreacion'=>$Date);
		$this->attributes=array('CON_MotivoTransaccion_FechaModificacion'=>$Date);
		$this->attributes=array('CON_MotivoTransaccion_UsuarioCreacion'=>$User);
		$this->attributes=array('CON_MotivoTransaccion_UsuarioModificacion'=>$User);
	}

}
