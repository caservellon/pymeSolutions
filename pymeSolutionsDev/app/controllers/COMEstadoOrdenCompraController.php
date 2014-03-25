<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class COMEstadoOrdenCompraController extends BaseController
{
    public function NuevoEstadoOrden()
    {
        $data1 = COM_EstadoOrdenCompra::take(5)->get();
        return View::make('COM_EstadoOrdenCompras.NEOC', compact('data1'));
    }

    public function AlmacenaEstadoOrden()
    {
       $data1 = COM_EstadoOrdenCompra::take(5)->get();
       $input = Input::all();
            $validacion= Validator::make($input,COM_EstadoOrdenCompra::$reglas);
            if($validacion->passes()){
               $estadoOrden= new COM_EstadoOrdenCompra;
               $estadoOrden->COM_EstadoOrdenCompra_Nombre=Input::get('COM_EstadoOrdenCompra_Nombre');
               $estadoOrden->COM_EstadoOrdenCompra_Observacion=Input::get('COM_EstadoOrdenCompra_Observacion');
               $estadoOrden->COM_EstadoOrdenCompra_Activo=Input::get('COM_EstadoOrdenCompra_Activo');
                if(Input::has('COM_EstadoOrdenCompra_Activo')){
                     $estadoOrden->COM_EstadoOrdenCompra_Activo=1;
                }else{
                     $estadoOrden->COM_EstadoOrdenCompra_Activo=0;
                }
                $estadoOrden->save();
                return 'Datos Guardados';
        }
        return Redirect::route('NuevoEstadoOrdenCompra')->withInput()->withErrors($validacion);	
    }
    public function index()
    {
        $COM_EstadoOrdenCompra = COM_EstadoOrdenCompra::where('COM_EstadoOrdenCompra_IdEstadoOrdenCompra', '>', 10)->paginate();
         return View::make('COM_EstadoOrdenCompras.LEOC')->with('data1', $COM_EstadoOrdenCompra);
    }

    public function edit()
    {
        $COM_EstadoOrdenCompra = COM_EstadoOrdenCompra::find(Input::get('id'));

		if (is_null($COM_EstadoOrdenCompra))
		{
			return Redirect::action('index');
		}

		return View::make('COM_EstadoOrdenCompras.EEOC', compact('COM_EstadoOrdenCompra'));
    }
    public function update()
    {
        $input= Input::all();
       $COM_EstadoOrdenCompra= COM_EstadoOrdenCompra::find(Input::get('COM_EstadoOrdenCompra_IdEstadoOrdenCompra'));
       $COM_EstadoOrdenCompra->COM_EstadoOrdenCompra_Nombre=Input::get('COM_EstadoOrdenCompra_Nombre');
       $COM_EstadoOrdenCompra->COM_EstadoOrdenCompra_Observacion=Input::get('COM_EstadoOrdenCompra_Observacion');
           
       
       
       $validacion= Validator::make($input,COM_EstadoOrdenCompra::$reglas);
       if($validacion->passes())
       {
           if(Input::has('COM_EstadoOrdenCompra_Activo')){
                     $COM_EstadoOrdenCompra->COM_EstadoOrdenCompra_Activo=1;
                }else{
                     $COM_EstadoOrdenCompra->COM_EstadoOrdenCompra_Activo=0;
                }
            $COM_EstadoOrdenCompra->update();
            return 'Datos Actualizados';
       }
       return View::make('COM_EstadoOrdenCompras.EEOC', compact('COM_EstadoOrdenCompra'))->withErrors($validacion);
    }
}
?>
