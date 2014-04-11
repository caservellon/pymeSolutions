<?php

class OrdenCompraController extends BaseController {

	public function VistaTodasOrdenesCompra(){
		return View::make('COM_OrdenCompra.TodasOrdenesCompra');
	}
	
	public function VistaDetallesOrdenCompra(){
		return View::make('COM_OrdenCompra.DetallesOrdenCompra');
	}
	
	public function VistaNuevaOrdenCompra(){
		return View::make('COM_OrdenCompra.newOrdenCompra');
	}
	
	public function DetallesOrdenCompra(){
		$input = Input::except(array('_token', 'Detalle'));
		
		$OrdenCompraSeleccionada = False;
		
		if (Input::has('Detalle')){
			foreach ($input as $Codigo){
				$CodigoOrdenCompra = $Codigo;
				$OrdenCompraSeleccionada = True;
			}
			
			if ($OrdenCompraSeleccionada){
				return Redirect::route('OrdenesCompraDetallesOrdenCompra', array('CodigoOrdenCompra' => $CodigoOrdenCompra));
			}
			
		}elseif (Input::has('Buscar')){
			
		}
	}
	
}