<?php

class CotizacionsController extends BaseController {

	/**
	 * Cotizacion Repository
	 *
	 * @var Cotizacion
	 */
	protected $Cotizacion;

	public function __construct(Cotizacion $Cotizacion)
	{
		$this->Cotizacion = $Cotizacion;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Cotizacions = $this->Cotizacion->all();

		return View::make('Cotizacions.index', compact('Cotizacions'));
	}
        
        public function parametrizar(){
            
            return View::make('Cotizacions.parametrizar');
        }
        
        public function editarParametrizar(){
            
            return View::make('Cotizacions.editarParametrizar');
        }

        /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Cotizacions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
        public function campoLocal(){
            
                $input = Input::all();
		$validation = Validator::make($input, CampoLocal::$rules);
                
		if ($validation->passes())
		{
                        
                        
			$this->CampoLocal->create($input);
                       
			return Redirect::route('parametrizar');
		}

		return Redirect::route('parametrizar')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
        }
        
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Cotizacion::$rules);

		if ($validation->passes())
		{
                        
			$this->Cotizacion->create($input);

			return Redirect::route('Cotizacions.index');
		}

		return Redirect::route('Cotizacions.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$Cotizacion = $this->Cotizacion->findOrFail($id);

		return View::make('Cotizacions.show', compact('Cotizacion'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Cotizacion = $this->Cotizacion->find($id);

		if (is_null($Cotizacion))
		{
			return Redirect::route('Cotizacions.index');
		}

		return View::make('Cotizacions.edit', compact('Cotizacion'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_method');
		$validation = Validator::make($input, Cotizacion::$rules);

		if ($validation->passes())
		{
			$Cotizacion = $this->Cotizacion->find($id);
			$Cotizacion->update($input);

			return Redirect::route('Cotizacions.show', $id);
		}

		return Redirect::route('Cotizacions.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->Cotizacion->find($id)->delete();

		return Redirect::route('Cotizacions.index');
	}

}
