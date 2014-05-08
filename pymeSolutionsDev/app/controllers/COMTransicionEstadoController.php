<?php

class COMTransicionEstadoController extends BaseController {

	public function ListaTransiciones()
	{
           $data1 = COMOrdenCompraTransicionEstado::paginate();
           return View::make('COM_OrdenCompra_TransicionEstado.ListarEstadoCompra', compact('data1'));
	}
        public function ListaEstados()
	{
           $data1 = COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_Activo','=',1)->paginate();
           return View::make('COM_OrdenCompra_TransicionEstado.ListaEstados', compact('data1'));
	}
        
        public function NuevaTransicionEstado()
        {
            $COM_EstadoOrdenCompra = COM_EstadoOrdenCompra::find(Input::get('id'));
            $Eanterior=COM_EstadoOrdenCompra::lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');

		if (is_null($COM_EstadoOrdenCompra))
		{
			return Redirect::action('ListaEstados');
		}

		return View::make('COM_OrdenCompra_TransicionEstado.NuevaTransicionEstado',array('COM_EstadoOrdenCompra'=>$COM_EstadoOrdenCompra ,'Eanterior'=>$Eanterior,'Esiguiente'=>$Eanterior));
        }
	 
	public function AlmacenaTransicion()
	{
            $input=Input::all();
            $validacion=Validator::make($input,  COMOrdenCompraTransicionEstado::$reglas);
            if($validacion->passes()){
               $model=new COMOrdenCompraTransicionEstado; 
                $model->COM_OrdenCompra_TransicionEstado_EstadoPrevio=Input::get('COM_OrdenCompra_TransicionEstado_EstadoPrevio');
                $model->COM_OrdenCompra_TransicionEstado_EstadoPosterior=Input::get('COM_OrdenCompra_TransicionEstado_EstadoPosterior');
                $model->COM_OrdenCompra_TransicionEstado_EstadoActual=Input::get('COM_OrdenCompra_TransicionEstado_EstadoActual');
                $model->COM_OrdenCompra_TransicionEstado_Observacion=Input::get('COM_OrdenCompra_TransicionEstado_Observacion');
                $model->save();
                return 'Transicion Creada';
            }
            $Eanterior=COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_Activo','=',1)->lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');
            $COM_EstadoOrdenCompra=COM_EstadoOrdenCompra::find(Input::get('COM_OrdenCompra_TransicionEstado_EstadoActual'));
            return View::make('COM_OrdenCompra_TransicionEstado.NuevaTransicionEstado',array('COM_EstadoOrdenCompra'=>$COM_EstadoOrdenCompra ,'Eanterior'=>$Eanterior,'Esiguiente'=>$Eanterior))->withErrors($validacion);
	}

	public function EditarTransicion()
	{
            $Eanterior=COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_Activo','=',1)->lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');
            $COM_OrdenCompra_TransicionEstado= COMOrdenCompraTransicionEstado::find(Input::get('id'));
            $COM_EstadoOrdenCompra = COM_EstadoOrdenCompra::find($COM_OrdenCompra_TransicionEstado->COM_OrdenCompra_TransicionEstado_EstadoActual);
            if (is_null($COM_EstadoOrdenCompra )|| is_null($COM_OrdenCompra_TransicionEstado))
		{
			return Redirect::action('ListaTransiciones');
		}
            return View::make('COM_OrdenCompra_TransicionEstado.EditarTransicion',array('COM_EstadoOrdenCompra'=>$COM_EstadoOrdenCompra ,'Eanterior'=>$Eanterior,'COM_OrdenCompra_TransicionEstado'=>$COM_OrdenCompra_TransicionEstado));
	}

	public function ActualizarTransicion()
	{
            $input=Input::all();
            $validacion=Validator::make($input,  COMOrdenCompraTransicionEstado::$reglas);
            if($validacion->passes()){
                $model= COMOrdenCompraTransicionEstado::find(Input::get('COM_OrdenCompra_TransicionEstado_Id'));
                $model->COM_OrdenCompra_TransicionEstado_EstadoPrevio=Input::get('COM_OrdenCompra_TransicionEstado_EstadoPrevio');
                $model->COM_OrdenCompra_TransicionEstado_EstadoPosterior=Input::get('COM_OrdenCompra_TransicionEstado_EstadoPosterior');
                $model->COM_OrdenCompra_TransicionEstado_Observacion=Input::get('COM_OrdenCompra_TransicionEstado_Observacion');
                $model->update();
                return 'Datos Actualizados';
            }
            $Eanterior=COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_Activo','=',1)->lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');
            $COM_OrdenCompra_TransicionEstado= COMOrdenCompraTransicionEstado::find(Input::get('id'));
            $COM_Estado = COM_EstadoOrdenCompra::find($COM_OrdenCompra_TransicionEstado->COM_OrdenCompra_TransicionEstado_EstadoActual);
            $COM_EstadoOrdenCompra = COM_EstadoOrdenCompra::find($COM_OrdenCompra_TransicionEstado->COM_OrdenCompra_TransicionEstado_EstadoActual);
            return View::make('COM_OrdenCompra_TransicionEstado.EditarTransicion',array('COM_EstadoOrdenCompra'=>$COM_EstadoOrdenCompra ,'Eanterior'=>$Eanterior,'COM_OrdenCompra_TransicionEstado'=>$COM_OrdenCompra_TransicionEstado))->withErrors($validacion);
	}

	
}
?>