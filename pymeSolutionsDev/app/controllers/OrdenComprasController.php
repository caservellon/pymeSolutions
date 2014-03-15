<?php

class OrdenComprasController extends BaseController {

	/**
	 * OrdenCompra Repository
	 *
	 * @var OrdenCompra
	 */
	protected $OrdenCompra;

	public function __construct(OrdenCompra $OrdenCompra)
	{
		$this->OrdenCompra = $OrdenCompra;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$OrdenCompras = $this->OrdenCompra->all();

		return View::make('OrdenCompras.index', compact('OrdenCompras'));
	}
        
        public function parametrizar(){
            
            return View::make('OrdenCompras.parametrizar');
        }
        
        public function indexCampoLocal(){
            
                $editar = CampoLocal::where('GEN_CampoLocal_Codigo', 'LIKE', 'COM_OC%')->get();

		return View::make('OrdenCompras.indexCampoLocal', compact('editar'));
        }
        

	
	public function create()
	{
		return View::make('OrdenCompras.create');
	}

	public function mensaje()
	{
                $date = Mensaje::find(1);
		return View::make('OrdenCompras.mensaje', compact('date'));
	}
        public function campoLocal(){
                $campo = CampoLocal::all();
                $suma=$campo->count()+1;
                $campoLocal = new CampoLocal();
                $input = Input::all();
                $campoLocal->GEN_CampoLocal_Codigo='COM_OC_'.$suma;
                $campoLocal->GEN_Usuario_idUsuarioCreo=1;
                $validation = Validator::make($input, CampoLocal::$rules);
                $campoLocal->GEN_CampoLocal_Nombre=Input::get('GEN_CampoLocal_Nombre');
             
                $campoLocal->GEN_CampoLocal_Tipo=Input::get('GEN_CampoLocal_Tipo');
                if(Input::has('GEN_CampoLocal_Requerido')){
                    $campoLocal->GEN_CampoLocal_Requerido=1;
                }else{
                    $campoLocal->GEN_CampoLocal_Requerido=0;
                }
                if(Input::has('GEN_CampoLocal_ParametroBusqueda')){
                    $campoLocal->GEN_CampoLocal_ParametroBusqueda=1;
                }else{
                    $campoLocal->GEN_CampoLocal_ParametroBusqueda=0;
                }
                if(Input::has('GEN_CampoLocal_Activo')){
                    $campoLocal->GEN_CampoLocal_Activo=1;
                }else{
                    $campoLocal->GEN_CampoLocal_Activo=0;
                }
//                $campoLocal->GEN_CampoLocal_Requerido=Input::get('GEN_CampoLocal_Requerido');
//                $campoLocal->GEN_CampoLocal_ParametroBusqueda=Input::get('GEN_CampoLocal_ParametroBusqueda');
//                $campoLocal->GEN_CampoLocal_Activo=Input::get('GEN_CampoLocal_Activo');   
		if ($validation->passes())
		{
                        
                       
                        if(Input::get('GEN_CampoLocal_Tipo')=='LIST'){
                            $campoLocal->save();
                            return View::make('ListaValor', compact('suma'));
                        }
                        $date = Mensaje::find(1);
                        $campoLocal->save();
                        return Redirect::route('mensajeOrden', compact('date'));
		
                }
                $mensaje= Mensaje::find(2);
		return Redirect::route('parametrizarOrden')
			->withInput()
			->withErrors($validation)
			->with('message', $mensaje->GEN_Mensajes_Mensaje);
                
        }
       public function listavista(){
           $suma=Input::get('id');
            return View::make('ListaValor', compact('suma'));
       }
        public function lista(){
            
            $listas = new CampoLocalLista();
            $input = Input::all();
            $validation = Validator::make($input, CampoLocalLista::$rules);
            $suma = Input::get('suma');
            $listas->GEN_CampoLocal_GEN_CampoLocal_ID=$suma;
            $listas->GEN_CampoLocalLista_Valor= Input::get('GEN_CampoLocalLista_Valor');

            if ($validation->passes()){
                
                $listas->save();
                return Redirect::route('editarlista', compact('suma'));
            }
            $mensaje= Mensaje::find(2);
            return View::make('editarlista', compact('suma'))
			->withInput()
			->withErrors($validation)
			->with('message', $mensaje->GEN_Mensajes_Mensaje);
            
        }
        
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, OrdenCompra::$rules);

		if ($validation->passes())
		{
			$this->OrdenCompra->create($input);

			return Redirect::route('OrdenCompras.index');
		}

		return Redirect::route('OrdenCompras.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$OrdenCompra = $this->OrdenCompra->findOrFail($id);

		return View::make('OrdenCompras.show', compact('OrdenCompra'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$OrdenCompra = CampoLocal::find($id);

		if (is_null($OrdenCompra))
		{
			return Redirect::route('Compras.indexCampoLocal');
		}

		return View::make('OrdenCompras.edit', compact('OrdenCompra'));
	}
        
        public function editar()
	{
		$OrdenCompra = CampoLocal::find(Input::get('id'));

		if (is_null($OrdenCompra))
		{
			return Redirect::route('indexCampoLocal');
		}

		return View::make('OrdenCompras.editarOrden', compact('OrdenCompra'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
        public function actualizar()
	{
		$input = Input::except('_method');
		$validation = Validator::make($input, CampoLocal::$rules);

		if ($validation->passes())
		{
			$OrdenCompra = CampoLocal::find(Input::get('id'));
                        $suma=Input::get('id');
                        $OrdenCompra->GEN_CampoLocal_ID= Input::get('id');
                        
                        $OrdenCompra->GEN_CampoLocal_Nombre=Input::get('GEN_CampoLocal_Nombre');
                        $OrdenCompra->GEN_CampoLocal_Tipo=$OrdenCompra->GEN_CampoLocal_Tipo;
                        $OrdenCompra->Usuario_idUsuarioModifico=2;
                         if(Input::has('GEN_CampoLocal_Requerido')){
                            $OrdenCompra->GEN_CampoLocal_Requerido=1;
                        }else{
                            $OrdenCompra->GEN_CampoLocal_Requerido=0;
                        }
                        if(Input::has('GEN_CampoLocal_ParametroBusqueda')){
                            $OrdenCompra->GEN_CampoLocal_ParametroBusqueda=1;
                        }else{
                            $OrdenCompra->GEN_CampoLocal_ParametroBusqueda=0;
                        }
                        if(Input::has('GEN_CampoLocal_Activo')){
                            $OrdenCompra->GEN_CampoLocal_Activo=1;
                        }else{
                            $OrdenCompra->GEN_CampoLocal_Activo=0;
                        }
                            $OrdenCompra->update();
                            if($OrdenCompra->GEN_CampoLocal_Tipo == 'LIST'){
                                return View::make('Listavalor', compact('suma'));
                            }

			return Redirect::route('mensajeOrden');
		}
                $mensaje= Mensaje::find(2);
		return Redirect::route('editar', Input::get('id'))
			->withInput()
			->withErrors($validation)
			->with('message', $mensaje->GEN_Mensajes_Mensaje);
	}
        
	public function update($id)
	{
		$input = Input::except('_method');
		$validation = Validator::make($input, CampoLocal::$rules);

		if ($validation->passes())
		{
			$Cotizacion = CampoLocal::find($id);
                        $suma=$id;
                        $Cotizacion->GEN_CampoLocal_ID= $id;
                        
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

			return Redirect::route('mensajeOrden');
		}
                $mensaje= Mensaje::find(2);
		return Redirect::route('Compras.OrdenCompras.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', $mensaje->GEN_Mensajes_Mensaje);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->OrdenCompra->find($id)->delete();

		return Redirect::route('OrdenCompras.index');
	}

}
