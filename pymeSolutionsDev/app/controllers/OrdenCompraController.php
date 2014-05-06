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
		$IndiceActual = 0;
		
		if (Input::has('Detalle')){
			foreach ($input as $Codigo){
				$CodigosOrdenCompra[$IndiceActual] = $Codigo;
				$OrdenCompraSeleccionada = True;
				$IndiceActual += 1;
			}
			
			if ($OrdenCompraSeleccionada){
				return Redirect::route('OrdenesCompraDetallesOrdenCompra', array('CodigosOrdenCompra' => $CodigosOrdenCompra));
			}else{
				return Redirect::route('OrdenesDeCompraTodasOrdenesCompra', array('Error' => 'Sin Seleccion'));
			}
			
		}elseif (Input::has('Buscar')){
			
		}
	}
	
}