<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
Validator::extend('alpha_spaces', function($attribute, $value, $parameters)
{
    return preg_match('/^([-a-z0-9_-áéíóúûü-\s])+$/i', $value);
    
});  
?>