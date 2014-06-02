<?php

class PagoComprasController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function index()
	{	

		$OrdenesPago=comContabilidad::OrdenesSinPagar();
		return View::make('PagoCompras.index',compact('OrdenesPago'));
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function paid()
	{
		
		$id=Input::get('id');
		$osp=comContabilidad::OrdenesSinPagar();
		$osp=$osp->find($id);
		

		DB::table('CON_LibroDiario')->insertGetId(
			array('CON_LibroDiario_Observacion' =>'Asiento SemiAutomatico: Proveedor '.invContabilidad::ProveedorInfo($osp->COM_Proveedor_IdProveedor)->INV_Proveedor_Nombre,
				  'CON_LibroDiario_FechaCreacion'=> date('Y-m-d H:i:s'),
				  'CON_LibroDiario_FechaModificacion'=>date('Y-m-d H:i:s'),
				  'CON_LibroDiario_Monto'=>$osp->COM_OrdenCompra_Monto,
				  'CON_MotivoTransaccion_ID'=>11,
				  'CON_LibroDiario_Revertido'=> 1)
			);
		comContabilidad::cambiarAPagada($id);
	  	return ":D ".Input::get('id');
	}

}
