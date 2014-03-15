<?php

class CotizacionsController extends BaseController {

	/**
	 * Cotizacion Repository
	 *
	 * @var Cotizacion
	 */
	protected $Cotizacion;

	public function __construct(Cotizacion $Cotizacion)
	{
		$this->Cotizacion = $Cotizacion;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$Cotizacions = $this->Cotizacion->all();

		return View::make('Cotizacions.index', compact('Cotizacions'));
	}
        
        public function parametrizar(){
            
            return View::make('Cotizacions.parametrizar');
        }
        
        public function indexCampoLocal(){
            
                $editar = CampoLocal::where('GEN_CampoLocal_Codigo', 'LIKE', 'COM_COT%')->get();

		return View::make('Cotizacions.indexCampoLocal', compact('editar'));
        }

        /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Cotizacions.create');
	}
        
        public function mensaje()
	{
                $date = Mensaje::find(1);
		return View::make('Cotizacions.mensaje', compact('date'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
        public function campoLocal(){
                $campo = CampoLocal::all();
                $suma=$campo->count()+1;
                $campoLocal = new CampoLocal();
                $input = Input::all();
                $campoLocal->GEN_CampoLocal_Codigo='COM_COT_'.$suma;
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
                        return Redirect::route('mensaje', compact('date'));
		
                }
                $mensaje= Mensaje::find(2);
		return Redirect::route('parametrizar')
			->withInput()
			->withErrors($validation)
			->with('message', $mensaje->GEN_Mensajes_Mensaje);
                
        }
//        public function listavista($suma){
//            return View::make('ListaValor', compact('suma'));
//        }
        public function lista(){
            
            $listas = new CampoLocalLista();
            $input = Input::all();
            $validation = Validator::make($input, CampoLocalLista::$rules);
            $suma = Input::get('suma');
            $listas->GEN_CampoLocal_GEN_CampoLocal_ID=$suma;
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
        
        
        
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Cotizacion::$rules);

		if ($validation->passes())
		{
                        
			$this->Cotizacion->create($input);

			return Redirect::route('Cotizacions.index');
		}

		return Redirect::route('Cotizacions.create')
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
		$Cotizacion = $this->Cotizacion->findOrFail($id);

		return View::make('Cotizacions.show', compact('Cotizacion'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$Cotizacion = CampoLocal::find($id);

		if (is_null($Cotizacion))
		{
			return Redirect::route('Compras.indexCampoLocal');
		}

		return View::make('Cotizacions.edit', compact('Cotizacion'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
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

			return Redirect::route('mensaje');
		}
                $mensaje= Mensaje::find(2);
		return Redirect::route('Compras.Cotizacions.edit', $id)
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
		$this->Cotizacion->find($id)->delete();

		return Redirect::route('Cotizacions.index');
	}

}
