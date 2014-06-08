<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class COMEstadoOrdenCompraController extends BaseController
{
    public function NuevoEstadoOrden()
    {
      if(Seguridad::NuevoEstadoOrden()){
        $data1 = COM_EstadoOrdenCompra::skip(2)->take(10)->get();
        return View::make('COM_EstadoOrdenCompras.NEOC', compact('data1'));
        }else {
            return Redirect::to('/403');
        }
    }

    public function AlmacenaEstadoOrden()

    {
      if(Seguridad::AlmacenaestadoOrden()){
       $data1 = COM_EstadoOrdenCompra::take(5)->get();
       $input = Input::all();
            $validacion= Validator::make($input,COM_EstadoOrdenCompra::$reglas);
            if($validacion->passes()){
               $estadoOrden= new COM_EstadoOrdenCompra;
               $estadoOrden->COM_EstadoOrdenCompra_Nombre=Input::get('COM_EstadoOrdenCompra_Nombre');
               $estadoOrden->COM_EstadoOrdenCompra_Observacion=Input::get('COM_EstadoOrdenCompra_Observacion');
               $estadoOrden->COM_EstadoOrdenCompra_Activo=Input::get('COM_EstadoOrdenCompra_Activo');
               $estadoOrden->COM_Usuario_idUsuarioCreo=Auth::user()->SEG_Usuarios_Nombre;
               $estadoOrden->COM_EstadoOrdenCompra_FechaCreacion=date('Y-m-D');
                if(Input::has('COM_EstadoOrdenCompra_Activo')){
                     $estadoOrden->COM_EstadoOrdenCompra_Activo=1;
                }else{
                     $estadoOrden->COM_EstadoOrdenCompra_Activo=0;
                }
                $estadoOrden->save();
                $ruta = route('index');
                 $mensajeBD = Mensaje::find(1);
                    $mensaje= 'El Estado de Orden  '.$mensajeBD->GEN_Mensajes_Mensaje;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
        }
        return Redirect::route('NuevoEstadoOrdenCompra')->withInput()->withErrors($validacion);	
        }else {
            return Redirect::to('/403');
        }
    }
    public function index()
    {
      if(Seguridad::IndexEstadoorden()){
        $COM_EstadoOrdenCompra = COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_IdEstadoOrdenCompra', '>', 12)->paginate();
         return View::make('COM_EstadoOrdenCompras.LEOC')->with('data1', $COM_EstadoOrdenCompra);
         }else {
            return Redirect::to('/403');
        }
    }

    public function edit()
    {
      if(Seguridad::EditEstadoorden()){
        $COM_EstadoOrdenCompra = COM_EstadoOrdenCompra::find(Input::get('id'));

		if (is_null($COM_EstadoOrdenCompra))
		{
			return Redirect::action('index');
		}

		return View::make('COM_EstadoOrdenCompras.EEOC', compact('COM_EstadoOrdenCompra'));
    }else {
            return Redirect::to('/403');
        }
    }
    public function update()
    {
      if(Seguridad::EditEstadoorden()){
        $input= Input::all();
       $COM_EstadoOrdenCompra= COM_EstadoOrdenCompra::find(Input::get('COM_EstadoOrdenCompra_IdEstadoOrdenCompra'));
       $COM_EstadoOrdenCompra->COM_EstadoOrdenCompra_Nombre=Input::get('COM_EstadoOrdenCompra_Nombre');
       $COM_EstadoOrdenCompra->COM_EstadoOrdenCompra_Observacion=Input::get('COM_EstadoOrdenCompra_Observacion');
        $COM_EstadoOrdenCompra->COM_Usuario_idUsuarioModifico=Auth::user()->SEG_Usuarios_Nombre;
        $COM_EstadoOrdenCompra->COM_EstadoOrdenCompra_FechaModificacion=date('Y-m-d');
       
       
       $validacion= Validator::make($input,COM_EstadoOrdenCompra::$reglas);
       if($validacion->passes())
       {
           if(Input::has('COM_EstadoOrdenCompra_Activo')){
                     $COM_EstadoOrdenCompra->COM_EstadoOrdenCompra_Activo=1;
                }else{
                     $COM_EstadoOrdenCompra->COM_EstadoOrdenCompra_Activo=0;
                }
            $COM_EstadoOrdenCompra->update();
             $ruta = route('index');
                 $mensajeBD = Mensaje::find(1);
                    $mensaje= 'El Estado de Orden  '.$mensajeBD->GEN_Mensajes_Mensaje;
                    return View::make('MensajeCompra', compact('mensaje', 'ruta'));
       }
       return View::make('COM_EstadoOrdenCompras.EEOC', compact('COM_EstadoOrdenCompra'))->withErrors($validacion);
       }else {
            return Redirect::to('/403');
        }
    }
}
?>
