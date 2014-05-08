<?php

class ContabilidadController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function index()
	{
        return View::make('contabilidad.index');
	}

	public function config()
	{
        return View::make('contabilidad.config');
	}


	

}
