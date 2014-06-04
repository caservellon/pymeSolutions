<?php

//Route::get('unidadmonetarias', 'UnidadMonetaria@index');

class ReembolsosController extends BaseController {

	
	public function index()
	{
		
        return View::make('Reembolsos.index')
       			->with('Reembolsos',comContabilidad::Reembolsos());
	}


	public function registrarReembolso($id){

		//$id=Input::get('id');
		$rmb=comContabilidad::Reembolsos();
		$rmb=$rmb->find($id);
		
		Contabilidad::GenerarTransaccionCmpSM(12,$rmb->COM_ReembosoDevolucionCompras_Monto,$rmb->COM_ReembosoDevolucionCompras_Proveedor);
		comContabilidad::CambiaEstados($id);
	  	return Redirect::route('con.reembolsos');
	}

}
