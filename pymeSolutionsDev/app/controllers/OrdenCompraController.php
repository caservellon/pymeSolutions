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
	
	
	public function search_index(){

		//Querys de las columnas propias de Proveedor
		$Proveedor = Proveedor::where('INV_Proveedor_Nombre', '=', Input::get('search')) 
		->orWhere('INV_Proveedor_Codigo', '=', Input::get('search'))
		->orWhere('INV_Proveedor_RepresentanteVentas', '=', Input::get('search'))	
		->get();	

		//Querys de las columnas que tiene relacion con la tabla Proveedor
		$queryCiudad = DB::select('SELECT INV_Ciudad_ID FROM INV_Ciudad WHERE INV_Ciudad_Nombre = ?', array(Input::get('search')));
		$queryProducto = DB::select('SELECT INV_Proveedor_ID FROM INV_Producto_Proveedor WHERE INV_Producto_ID = (SELECT INV_Producto_ID FROM INV_Producto WHERE INV_Producto_Nombre = ?)', array(Input::get('search')));

		//Se evalua si la Query trae algo
		if(!empty($queryCiudad)){
			$temp = array();
			//En un arreglo 'temp' se capturan los ID de esas columnas que devolvio la Query
			foreach ($queryCiudad as $qC) {
				array_push($temp, $qC->INV_Ciudad_ID);
			}
			$Proveedor = Proveedor::whereIn('INV_Ciudad_ID', $temp)->get();
		}
		
		//Se evalua si la Query trae algo
		if(!empty($queryProducto)){
			$temp = array();
			//En un arreglo 'temp' se capturan los ID de esas columnas que devolvio la Query
			foreach ($queryProducto as $qP) {
				array_push($temp, $qP->INV_Proveedor_ID);
			}
			$Proveedor =  Proveedor::whereIn('INV_Proveedor_ID', $temp)->get();	
		}

		return View::make('Proveedor.index', compact('Proveedor'));
	}
}