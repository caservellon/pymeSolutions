<?php

class SolicitudCotizacionController extends BaseController {

	public function VistaParametrizarSolicitudCotizacion(){
		$editar = CampoLocal::where('GEN_CampoLocal_Codigo', 'LIKE', 'COM_SC%') -> get();
		return View::make('COM_SolicitudCotizacion.ParametrizarSolicitudCotizacion', compact('editar'));
	}

	public function VistaParametrizarSolicitudCotizacionCrearCampoLocal(){
		return View::make('COM_SolicitudCotizacion.CrearCampoLocal');
	}
	
	public function VistaParametrizarSolicitudCotizacionEditarCampoLocal(){
		return View::make('COM_SolicitudCotizacion.EditarCampoLocal');
	}

	public function mensaje(){
		$date = Mensaje::find(1);
		return View::make('COM_SolicitudCotizacion.Mensaje', compact('date'));
	}
	
	public function CrearCampoLocal(){
		$Validador = Validator::make(Input::all(), CampoLocal::$rules);
		
		if ($Validador -> passes()){
			$CampoLocal = new CampoLocal;
			
			$suma = CampoLocal::all() -> count() + 1;
			
            $CampoLocal -> GEN_CampoLocal_Codigo = 'COM_SC_' . $suma;
			$CampoLocal -> GEN_CampoLocal_Nombre = Input::get('GEN_CampoLocal_Nombre');
			$CampoLocal -> GEN_CampoLocal_Tipo = Input::get('GEN_CampoLocal_Tipo');
			
			$CampoLocal -> GEN_Usuario_idUsuarioCreo = 1;
			
			if (Input::has('GEN_CampoLocal_Requerido')){
				$CampoLocal -> GEN_CampoLocal_Requerido = 1;
			}else{
				$CampoLocal -> GEN_CampoLocal_Requerido = 0;
			}
			
			if (Input::has('GEN_CampoLocal_ParametroBusqueda')){
				$CampoLocal -> GEN_CampoLocal_ParametroBusqueda = 1;
			}else{
				$CampoLocal -> GEN_CampoLocal_ParametroBusqueda = 0;
			}
			
			if (Input::has('GEN_CampoLocal_Activo')){
				$CampoLocal -> GEN_CampoLocal_Activo = 1;
			}else{
				$CampoLocal -> GEN_CampoLocal_Activo = 0;
			}
			
			if (Input::get('GEN_CampoLocal_Tipo') == 'LIST'){
				$CampoLocal -> save();
                return View::make('ListaValor', compact('suma'));
            }
			
			$date = Mensaje::find(1);
            $CampoLocal -> save();
            return Redirect::route('ParametrizarSolicitudCotizacionCrearCampoLocalMensaje', compact('date'));
		}
		
		return Redirect::route('ParametrizarSolicitudCotizacionCrearCampoLocal') -> withInput() -> withErrors($Validador);
	}
	
	
	public function Lista(){
            $listas = new CampoLocalLista();
            $input = Input::all();
            $validation = Validator::make($input, CampoLocalLista::$rules);
            $suma = Input::get('suma');
            $listas->GEN_CampoLocal_GEN_CampoLocal_ID = $suma;
            $listas->GEN_CampoLocalLista_Valor= Input::get('GEN_CampoLocalLista_Valor');

            if ($validation->passes()){
                
                $listas->save();
                return View::make('ListaValor', compact('suma'));
            }
            $mensaje= Mensaje::find(2);
            return View::make('ListaValor', compact('suma'))
			->withInput()
			->withErrors($validation)
			->with('message', $mensaje->GEN_Mensajes_Mensaje);
        }
	
	public function Editar()
	{
		$Cotizacion = CampoLocal::find(Input::get('id'));

		if (is_null($Cotizacion))
		{
			return Redirect::route('ParametrizarSolicitudCotizacion');
		}

		return View::make('COM_SolicitudCotizacion.EditarCampoLocal', compact('Cotizacion'));
	}
	
	
	public function EditarCampoLocal(){
		$input = Input::except('_method');
		$validation = Validator::make($input, CampoLocal::$rules);

		if ($validation->passes())
		{
			$Cotizacion = CampoLocal::find(Input::get('id'));
                        $suma=Input::get('id');
                        $Cotizacion->GEN_CampoLocal_ID= Input::get('id');
                        
                        $Cotizacion->GEN_CampoLocal_Nombre=Input::get('GEN_CampoLocal_Nombre');
                        $Cotizacion->GEN_CampoLocal_Tipo=$Cotizacion->GEN_CampoLocal_Tipo;
                        $Cotizacion->Usuario_idUsuarioModifico=2;
                         if(Input::has('GEN_CampoLocal_Requerido')){
                            $Cotizacion->GEN_CampoLocal_Requerido=1;
                        }else{
                            $Cotizacion->GEN_CampoLocal_Requerido=0;
                        }
                        if(Input::has('GEN_CampoLocal_ParametroBusqueda')){
                            $Cotizacion->GEN_CampoLocal_ParametroBusqueda=1;
                        }else{
                            $Cotizacion->GEN_CampoLocal_ParametroBusqueda=0;
                        }
                        if(Input::has('GEN_CampoLocal_Activo')){
                            $Cotizacion->GEN_CampoLocal_Activo=1;
                        }else{
                            $Cotizacion->GEN_CampoLocal_Activo=0;
                        }
                            $Cotizacion->update();
                            if($Cotizacion->GEN_CampoLocal_Tipo == 'LIST'){
                                return View::make('Listavalor', compact('suma'));
                            }
			$date = Mensaje::find(1);
			return Redirect::route('ParametrizarSolicitudCotizacionCrearCampoLocalMensaje', compact('date'));
		}
                $mensaje= Mensaje::find(2);
		return Redirect::route('ParametrizarSolicitudCotizacionEditarCampoLocal', Input::get('id') )
			->withInput()
			->withErrors($validation)
			->with('message', $mensaje->GEN_Mensajes_Mensaje);
	}
}
