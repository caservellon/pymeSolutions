<?php

class COMTransicionEstadoController extends BaseController {

	public function ListaTransiciones()
	{
        if(Seguridad::ModificarTransicionesEstado()){
           $data1 = COMOrdenCompraTransicionEstado::paginate();
           return View::make('COM_OrdenCompra_TransicionEstado.ListarEstadoCompra', compact('data1'));
           }else {
            return Redirect::to('/403');
        }
	}
        public function ListaEstados()
	{
        if(Seguridad::NuevaTransicionEstado()){
           $data1 = COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_Activo','=',1)->paginate();
           return View::make('COM_OrdenCompra_TransicionEstado.ListaEstados', compact('data1'));
           }else {
            return Redirect::to('/403');
        }
	}
        
        public function NuevaTransicionEstado()
        {
            if(Seguridad::detalleNuevaTransicionesEstado()){
            $COM_EstadoOrdenCompra = COM_EstadoOrdenCompra::find(Input::get('id'));
            $Eanterior=COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_Activo','=',1)->lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');

		if (is_null($COM_EstadoOrdenCompra))
		{
			return Redirect::action('ListaEstados');
		}

		return View::make('COM_OrdenCompra_TransicionEstado.NuevaTransicionEstado',array('COM_EstadoOrdenCompra'=>$COM_EstadoOrdenCompra ,'Eanterior'=>$Eanterior,'Esiguiente'=>$Eanterior));
        }else {
            return Redirect::to('/403');
        }
        }
	 
	public function AlmacenaTransicion()
	{
        if(Seguridad::GuardarTransicionEstado()){
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
                        $model->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
                        $model->save();
                         $ruta = route('index');
                 $mensajeBD = Mensaje::find(1);
                    $mensaje= $mensajeBD->GEN_Mensajes_Mensaje;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
                }
                    
                
            
            $Eanterior=COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_Activo','=',1)->lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');
            $COM_EstadoOrdenCompra=COM_EstadoOrdenCompra::find(Input::get('COM_OrdenCompra_TransicionEstado_EstadoActual'));
            return View::make('COM_OrdenCompra_TransicionEstado.NuevaTransicionEstado',array('COM_EstadoOrdenCompra'=>$COM_EstadoOrdenCompra ,'Eanterior'=>$Eanterior,'Esiguiente'=>$Eanterior))->withErrors($validacion);
            }else {
            return Redirect::to('/403');
        }
	}

	public function EditarTransicion()
	{
        if(Seguridad::detalleTransicionesEstado()){
            $Eanterior=COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_Activo','=',1)->lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');
            $COM_OrdenCompra_TransicionEstado= COMOrdenCompraTransicionEstado::find(Input::get('id'));
            $COM_EstadoOrdenCompra = COM_EstadoOrdenCompra::find($COM_OrdenCompra_TransicionEstado->COM_OrdenCompra_TransicionEstado_EstadoActual);
            return View::make('COM_OrdenCompra_TransicionEstado.EditarTransicion',array('COM_EstadoOrdenCompra'=>$COM_EstadoOrdenCompra ,'Eanterior'=>$Eanterior,'COM_OrdenCompra_TransicionEstado'=>$COM_OrdenCompra_TransicionEstado));
            }else {
            return Redirect::to('/403');
        }
	}

	public function ActualizarTransicion()
	{
        if(Seguridad::ActualizarTransicionEstado()){
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
                $model->COM_Usuario_idUsuarioModifico=Auth::user()->SEG_Usuarios_Nombre;
                $model->update();
                 $ruta = route('index');
                 $mensajeBD = Mensaje::find(1);
                    $mensaje= $mensajeBD->GEN_Mensajes_Mensaje;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
            }
            $Eanterior=COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_Activo','=',1)->lists('COM_EstadoOrdenCompra_Nombre','COM_EstadoOrdenCompra_IdEstadoOrdenCompra');
            $COM_OrdenCompra_TransicionEstado= COMOrdenCompraTransicionEstado::find(Input::get('COM_OrdenCompra_TransicionEstado_Id'));
            $COM_EstadoOrdenCompra=COM_EstadoOrdenCompra::find($COM_OrdenCompra_TransicionEstado->COM_OrdenCompra_TransicionEstado_EstadoActual);
            return View::make('COM_OrdenCompra_TransicionEstado.EditarTransicion',array('COM_EstadoOrdenCompra'=>$COM_EstadoOrdenCompra,'Eanterior'=>$Eanterior,'COM_OrdenCompra_TransicionEstado'=>$COM_OrdenCompra_TransicionEstado))->withErrors($validacion);
            }else {
            return Redirect::to('/403');
        }
            
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