<?php

class PagoComprasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{
		if (Seguridad::VerPagos()) {
			$OrdenesPago=comContabilidad::OrdenesSinPagar();
			return View::make('PagoCompras.index',compact('OrdenesPago'));
		}else{
				return Redirect::to('/403');
		}
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function paid()
	{
		if (Seguridad::RealizarPagos()) {
			$id=Input::get('id');
			$osp=comContabilidad::OrdenesSinPagar();
			$osp=$osp->find($id);
			
			Contabilidad::GenerarTransaccionCmpSM(13,$osp->COM_OrdenCompra_Monto,$osp->COM_Proveedor_IdProveedor);
			comContabilidad::cambiarAPagada($id);
		  	return ":D ".Input::get('id');
	  	}else{
				return Redirect::to('/403');
		}
	}

}
