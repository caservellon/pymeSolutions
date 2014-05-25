<?php

class RolesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $Role;

	public function __construct(Role $Role){
		$this->Role = $Role;
	}

	public function store(){
		$input = Input::all();
		$validation = Validator::make($input, Role::$rules);

		if ($validation->passes())
		{
		
			$this->Role->create($input);

			return Redirect::route('Auth.Roles.index');
		}

		return Redirect::route('Auth.Roles.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
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

	public function ejemplo(){
		if (Seguridad::CrearPersona()) {
			return View::make('Roles.ejemplo');
		} else {
			return Redirect::to('/403');
		}
	}

}