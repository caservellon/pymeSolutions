<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

Validator::extend('alpha_spaces', function($attribute, $value, $parameters)
{
    return preg_match('/^[\pL\s]+$/u', $value);
    
});

Validator::extend('is_time',function($attribute, $value, $parameters)
{
	return preg_match('/^(2[0-3]|[0-1]?[0-9]):[0-5]?[0-9](:[0-5]?[0-9])?/', $value);
});

Validator::extend('num_decimal', function($attribute, $value, $parameters)
{
    return preg_match('/^\d+(\.\d{1,2})?$/', $value);
    
});  

Validator::extend('alphanum_spaces', function($attribute, $value, $parameters)
{
    return preg_match('/^([-a-z0-9_-áéíóúûü-\s])+$/i', $value);

});

Validator::extend('alphanumdotspaces', function($attribute, $value, $parameters)
{
    return preg_match('/^([.-a-z0-9,_-áéíóúûü-\s])+$/i', $value);
    
});
Validator::extend('HigherDate', function($attribute, $value, $parameters)
{
	var_dump($value);
	return $value > date("Y-m-d H:i:s"); 
});
Validator::extend('is_valid_validation_mask', function($attribute, $value, $parameters){
	return preg_match_all('/[#\/_\-\.L]*/', $value) == 2;
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
