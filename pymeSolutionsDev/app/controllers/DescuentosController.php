<?php

class DescuentosController extends BaseController {

	/**
	 * Descuento Repository
	 *
	 * @var Descuento
	 */
	protected $Descuento;

	public function __construct(Descuento $Descuento)
	{
		$this->Descuento = $Descuento;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Seguridad::VerDescuentos()){
			$Descuentos = $this->Descuento->where("VEN_DescuentoEspecial_Estado", 1)->orderBy('VEN_DescuentoEspecial_Precedencia', 'desc')->get();
			return View::make('Descuentos.index', compact('Descuentos'));
		} else {
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
		if (Seguridad::CrearDescuentos()){
			return View::make('Descuentos.create');
		} else {
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
		if (Seguridad::CrearDescuentos()){
			$input = Input::all();
			$validation = Validator::make($input, Descuento::$rules);

			if ($validation->passes())
			{
				$this->Descuento->create($input);

				return Redirect::route('Ventas.Descuentos.index');
			}

			return Redirect::route('Ventas.Descuentos.create')
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');	
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if (Seguridad::VerDescuentos()){
			$Descuento = $this->Descuento->findOrFail($id);
			return View::make('Descuentos.show', compact('Descuento'));
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(Seguridad::EditarDescuentos()){
			$Descuento = $this->Descuento->find($id);
			if (is_null($Descuento))
			{
				return Redirect::route('Ventas.Descuentos.index');
			}
			return View::make('Descuentos.edit', compact('Descuento'));
		} else {
			return Redirect::to('/403');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Seguridad::EditarDescuentos()){
			$input = array_except(Input::all(), '_method');
			$validation = Validator::make($input, Descuento::$rulesUpdate);

			if ($validation->passes())
			{
				$Descuento = $this->Descuento->find($id);
				$Descuento->update($input);

				return Redirect::route('Ventas.Descuentos.index');
			}

			return Redirect::route('Ventas.Descuentos.edit', $id)
				->withInput()
				->withErrors($validation)
				->with('message', 'There were validation errors.');
		} else {
			return Redirect::to('/403');
		}		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if(Seguridad::EliminarDescuentos()){
			$disc = Descuento::find($id);
			$disc->VEN_DescuentoEspecial_Estado = 0;
			$disc->save();
			return Redirect::route('Ventas.Descuentos.index');
		} else {
			return Redirect::to('/403');
		}	
	}

}
