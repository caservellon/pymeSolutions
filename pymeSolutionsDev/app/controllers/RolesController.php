<?php

//Route::get('unidadmonetarias', 'UnidadMonetaria@index');

class RolesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $UnidadMonetaria;

	public function __construct(UnidadMonetaria $UnidadMonetaria){
		$this->UnidadMonetaria = $UnidadMonetaria;
	}

	public function index()
	{
		return View::make('Roles.index');
	}

	public function create()
	{
		$model = Role::find(1);
		$columnas =  $model->getAllColumnsNames();
        return View::make('Roles.create',compact('columnas'));
	}

}