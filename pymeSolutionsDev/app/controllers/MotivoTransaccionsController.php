<?php

class MotivoTransaccionsController extends BaseController {

	/**
	 * MotivoTransaccion Repository
	 *
	 * @var MotivoTransaccion
	 */
	protected $MotivoTransaccion;

	public function __construct(MotivoTransaccion $MotivoTransaccion)
	{
		$this->MotivoTransaccion = $MotivoTransaccion;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$MotivoTransaccions = $this->MotivoTransaccion->all();

		return View::make('MotivoTransaccions.index', compact('MotivoTransaccions'));
	}

	public function i_m_gay(){
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('MotivoTransaccions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, MotivoTransaccion::$rules);

		if ($validation->passes())
		{
			$Motivo=new MotivoTransaccion;
			$Motivo->create($input);
			//$this->MotivoTransaccion->create($input);

			return Redirect::action('MotivoTransaccionsController@index');
		}

		return Redirect::action('MotivoTransaccionsController@create')
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
		$MotivoTransaccion = $this->MotivoTransaccion->findOrFail($id);

		return View::make('MotivoTransaccions.show', compact('MotivoTransaccion'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$MotivoTransaccion = $this->MotivoTransaccion->find($id);

		if (is_null($MotivoTransaccion))
		{
			return Redirect::route('MotivoTransaccions.index');
		}

		return View::make('MotivoTransaccions.edit', compact('MotivoTransaccion'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, MotivoTransaccion::$rules);

		if ($validation->passes())
		{
			$MotivoTransaccion = $this->MotivoTransaccion->find($id);
			$MotivoTransaccion->update($input);

			return Redirect::route('MotivoTransaccions.show', $id);
		}

		return Redirect::route('MotivoTransaccions.edit', $id)
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
		$this->MotivoTransaccion->find($id)->delete();

		return Redirect::route('MotivoTransaccions.index');
	}

}
