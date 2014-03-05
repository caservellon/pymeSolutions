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
            $parametrizar = CampoLocal::all();
            return View::make('Cotizacions.parametrizar', compact('parametrizar'));
        }
        
        public function editarParametrizar(){
            
                $editar = CampoLocal::all();

		if (is_null($editar))
		{
			return Redirect::route('parametrizar');
		}

		return View::make('Cotizacions.editarParametrizar', compact('editar'));
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

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
        public function campoLocal(){
                $campoLocal = new CampoLocal();
                $input = Input::all();
                $campoLocal->GEN_CampoLocal_Codigo='COM_COT_0000003';
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
                        
                        
			
                       $campoLocal->save();
                        return Redirect::route('parametrizar');
		
                }
                
		return Redirect::route('parametrizar')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
                
        }
        
        public function actualizar($id)
	{
                return $id;
		$input = Input::except('_method');
		$validation = Validator::make($input, CampoLocal::$rules);

		if ($validation->passes())
		{
			$Cotizacion = CampoLocal::find($id);
                        $Cotizacion->GEN_CampoLocal_IdCampoLocal= $id;
                        $Cotizacion->GEN_CampoLocal_Nombre=Input::get('GEN_CampoLocal_Nombre');
                        $Cotizacion->GEN_CampoLocal_Tipo=Input::get('GEN_CampoLocal_Tipo');
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

			return Redirect::route('parametrizar');
		}

		return Redirect::route('parametrizar', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
		
			
                        
		
	
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
			return Redirect::route('editarParametrizar');
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
                        $Cotizacion->GEN_CampoLocal_IdCampoLocal= $id;
                        $Cotizacion->GEN_CampoLocal_Nombre=Input::get('GEN_CampoLocal_Nombre');
                        $Cotizacion->GEN_CampoLocal_Tipo=Input::get('GEN_CampoLocal_Tipo');
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

			return Redirect::route('parametrizar');
		}

		return Redirect::route('Cotizacions.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
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
