<?php

//Route::get('unidadmonetarias', 'UnidadMonetaria@index');

class LibroMayorController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		$LibroMayor = DB::select(DB::raw('CALL CON_BalanzaComprobacion(1)'));
        return View::make('LibroMayor.index')
        ->with('Libro',$LibroMayor);
	}

}
