<?php

class CierrePeriodoController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		//$CierrePeriodos = LibroDiario::all();
        return View::Make('CierrePeriodo.index');
    }

    public function mayorizar(){
    	if (Request::ajax()){
    		DB::select(DB::Raw('Call CON_Mayorizacion(1,"?");'),array(date("Y-m-d H:i:s")));
    		return ':D';
    	}
    	return ":(";
    }

    public function balanza(){

    	if(Request::ajax()){
    		return ':D';
    	}
    	return ':(';
    }

    public function estado(){
    	if(Request::ajax()){
    		return ':D';
    	}
    	return ':(';

    }

    public function balance(){
    	if(Request::ajax()){
    		return ':D';
    	}
    	return ':(';
    }
	

}
