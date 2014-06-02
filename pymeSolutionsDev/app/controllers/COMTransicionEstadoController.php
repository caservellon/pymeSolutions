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
            $Eanterior=COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_Activo','=',1)->lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');

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
                $model1= COMOrdenCompraTransicionEstado::all();
                foreach ($model1 as $value) {
                    if($value->COM_OrdenCompra_TransicionEstado_EstadoPrevio==Input::get('COM_OrdenCompra_TransicionEstado_EstadoPrevio') && $value->COM_OrdenCompra_TransicionEstado_EstadoActual==Input::get('COM_OrdenCompra_TransicionEstado_EstadoActual') && $value->COM_OrdenCompra_TransicionEstado_EstadoPosterior==Input::get('COM_OrdenCompra_TransicionEstado_EstadoPosterior')){
                        $Eanterior=COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_Activo','=',1)->lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');
                        $COM_OrdenCompra_TransicionEstado= COMOrdenCompraTransicionEstado::find($value->COM_OrdenCompra_TransicionEstado_Id);
                        $COM_EstadoOrdenCompra = COM_EstadoOrdenCompra::find($COM_OrdenCompra_TransicionEstado->COM_OrdenCompra_TransicionEstado_EstadoActual);
                        return View::make('COM_OrdenCompra_TransicionEstado.EditarTransicionMensaje',array('COM_EstadoOrdenCompra'=>$COM_EstadoOrdenCompra ,'Eanterior'=>$Eanterior,'COM_OrdenCompra_TransicionEstado'=>$COM_OrdenCompra_TransicionEstado,'mensaje'=>'Esta transicion ya fue creada, puede o no modificarla'));
	
                        //return 'esta transision ya hasido creada';
                    }
                    }
                    $model=new COMOrdenCompraTransicionEstado;
                        $model->COM_OrdenCompra_TransicionEstado_EstadoPrevio=Input::get('COM_OrdenCompra_TransicionEstado_EstadoPrevio');
                        $model->COM_OrdenCompra_TransicionEstado_EstadoPosterior=Input::get('COM_OrdenCompra_TransicionEstado_EstadoPosterior');
                        $model->COM_OrdenCompra_TransicionEstado_EstadoActual=Input::get('COM_OrdenCompra_TransicionEstado_EstadoActual');
                        if(Input::has('COM_OrdenCompra_TransicionEstado_Observacion')){
                            $model->COM_OrdenCompra_TransicionEstado_Observacion=Input::get('COM_OrdenCompra_TransicionEstado_Observacion');
                        }else{
                            $model->COM_OrdenCompra_TransicionEstado_Observacion='Prefirio no guardar una observacion';
                        }
                        
                        if(Input::has('COM_OrdenCompra_TransicionEstado_Activo')){
                            $model->COM_OrdenCompra_TransicionEstado_Activo=1;
                        }else{
                            $model->COM_OrdenCompra_TransicionEstado_Activo=0;
                        }
                        $model->COM_TansicionEstado_FechaCreacion=date('Y-m-d');
                        $model->COM_Usuario_idUsuarioCreo=1;
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
            return View::make('COM_OrdenCompra_TransicionEstado.EditarTransicion',array('COM_EstadoOrdenCompra'=>$COM_EstadoOrdenCompra ,'Eanterior'=>$Eanterior,'COM_OrdenCompra_TransicionEstado'=>$COM_OrdenCompra_TransicionEstado));
	}

	public function ActualizarTransicion()
	{
            $input=Input::all();
            $validacion=Validator::make($input, COMOrdenCompraTransicionEstado::$reglas);
            if($validacion->passes()){
                $model= COMOrdenCompraTransicionEstado::find(Input::get('COM_OrdenCompra_TransicionEstado_Id'));
                $model->COM_OrdenCompra_TransicionEstado_EstadoPrevio=Input::get('COM_OrdenCompra_TransicionEstado_EstadoPrevio');
                $model->COM_OrdenCompra_TransicionEstado_EstadoPosterior=Input::get('COM_OrdenCompra_TransicionEstado_EstadoPosterior');
                $model->COM_OrdenCompra_TransicionEstado_Observacion=Input::get('COM_OrdenCompra_TransicionEstado_Observacion');
                 if(Input::has('COM_OrdenCompra_TransicionEstado_Activo')){
                     $model->COM_OrdenCompra_TransicionEstado_Activo=1;
                }else{
                     $model->COM_OrdenCompra_TransicionEstado_Activo=0;
                }
                $model->COM_TansicionEstado_FechaModificacion=date('Y-m-d');
                $model->COM_Usuario_idUsuarioModifico=1;
                $model->update();
                return 'Datos Actualizados';
            }
            $Eanterior=COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_Activo','=',1)->lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');
            $COM_OrdenCompra_TransicionEstado= COMOrdenCompraTransicionEstado::find(Input::get('COM_OrdenCompra_TransicionEstado_Id'));
            $COM_EstadoOrdenCompra=COM_EstadoOrdenCompra::find($COM_OrdenCompra_TransicionEstado->COM_OrdenCompra_TransicionEstado_EstadoActual);
            return View::make('COM_OrdenCompra_TransicionEstado.EditarTransicion',array('COM_EstadoOrdenCompra'=>$COM_EstadoOrdenCompra,'Eanterior'=>$Eanterior,'COM_OrdenCompra_TransicionEstado'=>$COM_OrdenCompra_TransicionEstado))->withErrors($validacion);
            
	}
        public function noRepetido($anterior,$actual,$siguiente){
            $model1= COMOrdenCompraTransicionEstado::all();
            foreach ($model1 as $value) {
                if($value->COM_OrdenCompra_TransicionEstado_EstadoPrevio==$anterior && $value->COM_OrdenCompra_TransicionEstado_EstadoActual==$actual && $value->COM_OrdenCompra_TransicionEstado_EstadoPosterior==$siguiente){
                    echo $value->COM_OrdenCompra_TransicionEstado_Id;
                    return false;
                }
            }   
            return true;
        }
}
?>