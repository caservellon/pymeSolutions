<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Validator::extend('alpha_spaces', function($attribute, $value, $parameters)
{
    return preg_match('/^[\pL\s]+$/u', $value);
    
});  
Validator::extend('Numbre_Decimal', function($attribute, $value, $parameters)
{
    return preg_match('/^\d+(\.\d{1,2})?$/', $value);
    
});  

Validator::extend('alphanum_spaces', function($attribute, $value, $parameters)
{
    return preg_match('/^([-a-z0-9_-áéíóúûü-\s])+$/i', $value);

});

Validator::extend('alphanumdotspaces', function($attribute, $value, $parameters)
{
    return preg_match('/^([.-a-z0-9_-áéíóúûü-\s])+$/i', $value);
    
});

Validator::extend('decimal', function($attribute, $value, $parameters)
{
	$EsDecimalValido = false;
	$EsMayorCero = false;
	
	if (preg_match('/^\d+(\.\d{1,2})?$/', $value)){
		$EsDecimalValido = true;
		
		if ($value > 0){
			$EsMayorCero = true;
		}
	}
	
    return $EsDecimalValido && $EsMayorCero;

});

Validator::extend('is_positive', function($attribute, $value, $parameters)
{
	return $value > 0;
});

?>
