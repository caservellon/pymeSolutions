<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'SEG_Usuarios';
	protected $primaryKey = 'SEG_Usuarios_ID';
	protected $fillable = array('SEG_Usuarios_Username', 'SEG_Usuarios_Email', 'SEG_Usuarios_Contrasena', 'SEG_Usuarios_Nombre','SEG_Usuarios_Activo');
	public $timestamps = false;

	public static $rules = array(
		'SEG_Usuarios_Username' => 'unique:SEG_Usuarios'
	);
	
	public function getAuthIdentifier()
	{
	    return $this->getKey();
	}
	  
    public function getAuthPassword()
    {
	    return $this->SEG_Usuarios_Contrasena;
    } 
	  
    public function getRememberToken()
    {
	    return $this->SEG_Usuarios_Token;
    }
	  
    public function setRememberToken($value)
    {
	    $this->SEG_Usuarios_Token = $value;
	}
	  
	public function getRememberTokenName()
	{
	    return "SEG_Usuarios_Token";
	}
	  
	public function getReminderEmail()
	{
	    return $this->SEG_Usuarios_Email;
	}

}