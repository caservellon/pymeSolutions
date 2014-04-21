<?php

class MotivoMovimiento extends Eloquent {
	protected $guarded = array();

	protected $table = 'INV_MotivoMovimiento';
	protected $primaryKey = 'INV_MotivoMovimiento_ID';

	public $timestamps = false;

	public static $rules = array(
		'INV_MotivoMovimiento_ID' => '',
		'INV_MotivoMovimiento_Nombre' => 'regex:/^[a-z A-Z]?/|Between:1,128',
		'INV_MotivoMovimiento_TipoMovimiento' => 'Integer',
		'INV_MotivoMovimiento_Observaciones' => 'Between:1,512',
		'INV_MotivoMovimiento_FechaCreacion' => '',
		'INV_MotivoMovimiento_UsuarioCreacion' => '',
		'INV_MotivoMovimiento_FechaModificacion' => '',
		'INV_MotivoMovimiento_UsuarioModificacion' => '',
		'INV_MotivoMovimiento_Activo' => 'Integer'
	);
}
