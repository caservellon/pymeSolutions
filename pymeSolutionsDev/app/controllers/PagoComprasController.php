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
			$pago= new PagoCompras;
			$pago->CON_Pago_ID=$OrdenesPago['idop'];
			$pago->CON_Pago_PorPagar=$OrdenesPago['total']-($OrdenesPago['total']/$dias);
			$pago->save();
		}

	  	return ":D ".Input::get('id');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('PagoCompras.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('PagoCompras.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
