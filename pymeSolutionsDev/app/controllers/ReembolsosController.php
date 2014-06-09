<?php

//Route::get('unidadmonetarias', 'UnidadMonetaria@index');

class ReembolsosController extends BaseController {

	
	public function index()
	{
		if (Seguridad::VerReembolsos()) {
        	return View::make('Reembolsos.index')
       				->with('Reembolsos',comContabilidad::Reembolsos());
       	}else{
				return Redirect::to('/403');
		}
	}


	public function registrarReembolso($id){
		if (Seguridad::RealizarReembolso()) {
			//$id=Input::get('id');
			$rmb=comContabilidad::Reembolsos();
			$rmb=$rmb->find($id);
			
			Contabilidad::GenerarTransaccionCmpSM(12,$rmb->COM_ReembosoDevolucionCompras_Monto,$rmb->COM_ReembosoDevolucionCompras_Proveedor);
			comContabilidad::CambiaEstados($id);
		  	return Redirect::route('con.reembolsos');
	  	}else{
				return Redirect::to('/403');
		}
	}

}
