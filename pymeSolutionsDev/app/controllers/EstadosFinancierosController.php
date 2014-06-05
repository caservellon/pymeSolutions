<?php


	class EstadosFinancierosController extends BaseController {



		public function index(){

			$Periodos = ClasificacionPeriodo::all()->lists('CON_ClasificacionPeriodo_Nombre','CON_ClasificacionPeriodo_ID');

			return View::make('EstadosFinancieros.index')
				->with('Periodos',$Periodos);
		}
	}