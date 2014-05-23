<?php

class Role extends Eloquent {
	protected $guarded = array();

	protected $table = 'SEG_Roles';
	protected $primaryKey = 'SEG_Roles_ID';

	public $timestamps = false;

	public static $rules = array(
	
	);
}
