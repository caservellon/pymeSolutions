<?php

class SubcuentaController extends BaseController {

	/**
	 * Subcuentum Repository
	 *
	 * @var Subcuentum
	 */
	protected $Subcuentum;

	public function __construct(Subcuentum $Subcuentum)
	{
		$this->Subcuentum = $Subcuentum;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Seguridad::ListarSubcuentas()) {
			$Subcuenta = $this->Subcuentum->all();
			$Catalogo = CatalogoContable::all();
			$Clasificacion =ClasificacionCuenta::all();

			return View::make('Subcuenta.index', compact('Subcuenta','Catalogo','Clasificacion'));
		}else{
				return Redirect::to('/403');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Seguridad::AgregarSubcuentas()) {
			$Catalogo =CatalogoContable::all()->lists('CON_CatalogoContable_Nombre','CON_CatalogoContable_ID');
	    	$selected = array();
			return View::make('Subcuenta.create',compact('Catalogo','selected'));
		}else{
				return Redirect::to('/403');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Seguridad::AgregarSubcuentas()) {
			$input = Input::all();
			$validation = Validator::make($input, Subcuentum::$rules);

			if ($validation->passes())
			{
				$this->Subcuentum->create($input);

				return Redirect::action('SubcuentaController@index');
			}
			$Catalogo =CatalogoContable::all()->lists('CON_CatalogoContable_Nombre','CON_CatalogoContable_ID');
	    	$selected = array();

			return Redirect::action('SubcuentaController@create',compact('Catalogo','selected'))
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
		}else{
				return Redirect::to('/403');
		}
	}
}
