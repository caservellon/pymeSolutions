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
		$OrdenesPago=comContabilidad::OrdenesSinPagar();
		$OrdenesPago=$OrdenesPago[$id];
		$pago=PagoCompras::find($OrdenesPago['idop']);
		$dias=invContabilidad::getFormaPago($OrdenesPago['idfp']);
		$dias=$dias['Dias'];
		if($pago){
			$tmp=$pago->CON_Pago_PorPagar;
			$tmp2=2*$OrdenesPago['total']/$dias;
			if($tmp<=$tmp2){
				comContabilidad::cambiarAPagada($OrdenesPago['idop']);
				$pago->CON_Pago_PorPagar=0;
			}else{
				$pago->CON_Pago_PorPagar=$tmp-$tmp2;
			}
			$pago->update();
			
		}else{
			$tmp=$OrdenesPago['total'];
			$pago= new PagoCompras;
			$pago->CON_Pago_ID=$OrdenesPago['idop'];
			$pago->CON_Pago_PorPagar=$tmp-($tmp/$dias);
			$pago->save();
		}

	  	return ":D ".Input::get('id');
	}

}
