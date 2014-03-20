<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
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
            return View::make('listavalor', compact('suma'))
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
        //funciones hechas para crear una orden de compra sin cotizacion
        public function OrdenComprasnCotizacion(){
            $inventario= Producto::all();
            return View::make('OrdenCompras.NuevaOrdenCompraSinCotizacion')->with('inventario', $inventario);
        }
         public function FormOrdenComprasnCotizacion(){
             $input=Input::all();
             $contador=0;
             $productos=array();
             $proveedor=Input::get('proveedor');
             
             foreach ($input as $form){
                 $contador++;
                 if(Input::has('incluir'.$contador)){
                     $relaciones=DB::table('INV_Producto_Proveedor')->where('INV_Producto_ID', '=',Input::get('Id'.$contador) )->get();
                     foreach ($relaciones as $relacion){
                         if($relacion->INV_Proveedor_ID==$proveedor){
                             $productos[]=Input::get('Id'.$contador);
                         }
                     }
                 } 
             }
             if(sizeof($productos)<1){
                 return 'no se puede crear una orden de Compra';
             }
             
            
            return View::make('OrdenCompras.OrdenCompraForm',array('proveedor'=>$proveedor ,'productos'=>$productos));
        }
        public function guardarOCsnCOT(){
                $input=Input::all();
                $contador=0;
             $OrdenCompras=  new OrdenCompra();
             $OrdenCompras->COM_OrdenCompra_Codigo=rand(0,1000000);
             $OrdenCompras->COM_OrdenCompra_FechaEmision= date('Y/m/d H:i:s');
             $OrdenCompras->COM_OrdenCompra_FechaEntrega=  Input::get('COM_OrdenCompra_FechaEntrega');
             if(Input::has('COM_OrdenCompra_FechaEmision')){
                 $OrdenCompras->COM_OrdenCompra_Activo=1;
             }else{
             $OrdenCompras->COM_OrdenCompra_Activo=0;
             }
             $OrdenCompras->COM_OrdenCompra_FechaCreacion=date('Y/m/d H:i:s');
             $OrdenCompras->COM_Usuario_IdUsuarioCreo=1;
             $OrdenCompras->COM_Proveedor_IdProveedor=Input::get('COM_Proveedor_IdProveedor');
             
             $OrdenCompras->save();
             
             
             $compras=  OrdenCompra::all();
             $ultimo= $compras->Count();
             $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo=rand(0,1000000);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_OrdenCompra_IdOrdenCompra=$ultimo;
                      $historial->COM_OrdenCompra_TransicionEstado_Id=1;
                      $historial->COM_Usuario_idUsuarioCreo=1;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d');
                      $historial->COM_TransicionEstado_Observacion='Esta es la transicion por definicion';
                      $historial->save();
              foreach ($input as $form){
                  if(Input::has('COM_DetalleOrdenCompra_Cantidad'.$contador)>0){
                  $detalle=new COMDetalleOrdenCompra();
                  $detalle->COM_DetalleOrdenCompra_Cantidad=Input::get('COM_DetalleOrdenCompra_Cantidad'.$contador);
                  $detalle->COM_DetalleOrdenCompra_PrecioUnitario=Input::get('COM_DetalleOrdenCompra_PrecioUnitario'.$contador);
                  $detalle->COM_OrdenCompra_idOrdenCompra=$ultimo;
                  $detalle->COM_Producto_idProducto=Input::get('COM_Producto_idProducto'.$contador);
                  $detalle->COM_Usuario_idUsuarioCreo=1;
                  $detalle->COM_DetalleOrdenCompra_Codigo=rand(0,1000000);
                  $detalle->save();
                  
                  }
                  $contador++;
              }
            return 'los datos ya estan aqui';
        }
        
        
        
        
        //funciones hechas para crear una orden de Compra Con Cotizacion
        public function OrdenCompracnCotizacion(){
            return View::make('OrdenCompras.NuevaOrdenCompraConCotizacion');
        }
         public function CompararCotizaciones(){
            return View::make('OrdenCompras.CompararCotizaciones');
        }
        public function FormOrdenCompracnCotizacion(){
            return View::make('OrdenCompras.OrdenCompraPrCotForm');
        }
        
        //funciones hechas para autorizar ordenes de compra
         public function ListaOrdenCompra(){
            return View::make('OrdenCompras.AutorizacionOrdenes');
        }
         public function FormAutorizarOrdenCompra(){
            return View::make('OrdenCompras.AutorizarOrdenCompraForm');
        }
        
         public function AutorizandoOrdenCompra(){
             $input=Input::all();
             $id=Input::get('id');
             $ordenCompra= OrdenCompra::find($id);
             $Detalles=  COMDetalleOrdenCompra::where('COM_OrdenCompra_idOrdenCompra','=',$id)->get();
             $proveedor=$ordenCompra->COM_Proveedor_IdProveedor;             
            return View::make('OrdenCompras.OrdenCompraDetalles',array('proveedor'=>$proveedor ,'detalles'=>$Detalles,'ordenCompra'=>$ordenCompra));
        }
         public function AutorizarOrden(){
             $id=Input::get('id');
             $or=  OrdenCompra::find($id);
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_Activo','=',1)->get();
             foreach($trans as $tran){
                  if($tran->COM_OrdenCompra_IdOrdenCompra==$or->COM_OrdenCompra_IdOrdenCompra){
                      $tratra= HistorialEstadoOrdenCompra::find($tran->COM_OrdenCompra_TransicionEstado_Id);
                      $tratra->COM_TransicionEstado_Activo=0;
                      $tratra->update();
                      $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo=rand(0,1000000);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_OrdenCompra_IdOrdenCompra=$id;
                      $historial->COM_OrdenCompra_TransicionEstado_Id=3;
                      $historial->COM_Usuario_idUsuarioCreo=1;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d');
                      $historial->COM_TransicionEstado_Observacion='Esta transicion fue Autorizada';
                      $historial->save();
                      $ordenPago=  new COMOrdenPago();
                      $ordenPago->COM_OrdenPago_Codigo=rand(0,1000000);
                      $ordenPago->COM_OrdenCompra_idOrdenCompra=$id;
                      $ordenPago->COM_OrdenPago_Activo=1;
                      $ordenPago->COM_Usuario_idUsuarioCreo=1;
                      $ordenPago->COM_OrdenPago_FechaCreo=date('Y/m/d');
                      $ordenPago->save();
                      
                      
                      
                                        } 
             }
            return 'ya esta autorizada';
        }
        public function cancelarOrden(){
            $id=Input::get('id');
             $or=  OrdenCompra::find($id);
             $trans= HistorialEstadoOrdenCompra::where('COM_TransicionEstado_Activo','=',1)->get();
             foreach($trans as $tran){
                  if($tran->COM_OrdenCompra_IdOrdenCompra==$or->COM_OrdenCompra_IdOrdenCompra){
                      $tratra= HistorialEstadoOrdenCompra::find($tran->COM_OrdenCompra_TransicionEstado_Id);
                      $tratra->COM_TransicionEstado_Activo=0;
                      $tratra->update();
                      $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo=rand(0,1000000);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_OrdenCompra_IdOrdenCompra=$id;
                      $historial->COM_OrdenCompra_TransicionEstado_Id=1;
                      $historial->COM_Usuario_idUsuarioCreo=1;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d');
                      $historial->COM_TransicionEstado_Observacion='Esta transicion fue Cancelada';
                      $historial->save();
                      $or->COM_OrdenCompra_Activo=0;
                      $or->update();
                      
                      
                                        } 
             }
            return 'ya esta autorizada';
            
        }
        //administracion de ordenes de compra
        public function ListarOrdenCompra(){
            return View::make('OrdenCompras.AdministrarOrdenes');
        }
        public function AdministraDetalles(){
             $input=Input::all();
             $id=Input::get('id');
             $ordenCompra= OrdenCompra::find($id);
             $Detalles=  COMDetalleOrdenCompra::where('COM_OrdenCompra_idOrdenCompra','=',$id)->get();
             $proveedor=$ordenCompra->COM_Proveedor_IdProveedor; 
             $trans= HistorialEstadoOrdenCompra::where('COM_OrdenCompra_IdOrdenCompra','=',$id)->get();
             $idea=Input::get('id_ea');
             echo $idea;
             
             
             $transiciones=  COMOrdenCompraTransicionEstado::where('COM_OrdenCompra_TransicionEstado_EstadoActual','=',$idea)->get();
            return View::make('OrdenCompras.AdministrarOrdenCompraDetalles',array('proveedor'=>$proveedor ,'detalles'=>$Detalles,'ordenCompra'=>$ordenCompra,'historial'=>$trans,'transiciones'=>$transiciones,'actual'=>$idea));
        
        }
        public function AndministrarOC(){
            $input= Input::all();
            $eact=Input::get('id_actual');
            $eant=Input::get('COM_TransicionEstado_EstadoPrevio');
            $esig=Input::get('COM_TransicionEstado_EstadoPosterior');
            
            $id_tt=0;
            $id=Input::get('id_oc');
            
            if(Input::get('queHacer')=='TransitarAntes'){
                
                $actual= HistorialEstadoOrdenCompra::find(Input::get('id_historial'));
                $transiciones= COMOrdenCompraTransicionEstado::where('COM_OrdenCompra_TransicionEstado_EstadoActual','=' ,$eant)->get();
                foreach ($transiciones as $tran){
                    if($tran->COM_OrdenCompra_TransicionEstado_EstadoPosterior==$eact){
                        $id_tt=$tran->COM_OrdenCompra_TransicionEstado_Id;
                    }else{
                        $id_tt=1;
                    }
                }
                        $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo=rand(0,1000000);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_OrdenCompra_IdOrdenCompra=$id;
                      $historial->COM_OrdenCompra_TransicionEstado_Id=$id_tt;
                      $historial->COM_Usuario_idUsuarioCreo=1;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d');
                      $historial->COM_TransicionEstado_Observacion=Input::get('COM_TransicionEstado_Observacion');
                      $historial->save();
                      $actual->COM_TransicionEstado_Activo=0;
                      $actual->update();
            }else{
                
                $actual= HistorialEstadoOrdenCompra::find(Input::get('id_historial'));
                $transiciones= COMOrdenCompraTransicionEstado::where('COM_OrdenCompra_TransicionEstado_EstadoActual','=' ,$esig)->get();
                foreach ($transiciones as $tran){
                    if($tran->COM_OrdenCompra_TransicionEstado_EstadoPrevio==$eact){
                        $id_tt=$tran->COM_OrdenCompra_TransicionEstado_Id;
                        
                    }
                    else{
                        $id_tt=2;
                    }
                }
                        $historial=new HistorialEstadoOrdenCompra();
                      $historial->COM_TransicionEstado_Codigo=rand(0,1000000);
                      $historial->COM_TransicionEstado_Activo=1;
                      $historial->COM_OrdenCompra_IdOrdenCompra=$id;
                      $historial->COM_OrdenCompra_TransicionEstado_Id=$id_tt;
                      $historial->COM_Usuario_idUsuarioCreo=1;
                      $historial->COM_TransicionEstado_FechaCreo=date('Y/m/d');
                      $historial->COM_TransicionEstado_Observacion=Input::get('COM_TransicionEstado_Observacion');
                      $historial->save();
                      $actual->COM_TransicionEstado_Activo=0;
                      $actual->update();
                
            }
            return 'Orden de Compra Administrada';
        }
         public function HistorialOrdenes(){
            return View::make('OrdenCompras.listaHistorialOrdenes');
        }
        public function HistorialOrden(){
             $input=Input::all();
             $id=Input::get('id');
             $trans= HistorialEstadoOrdenCompra::where('COM_OrdenCompra_IdOrdenCompra','=',$id)->paginate();
            
            return View::make('OrdenCompras.HistorialOrden',array('historial'=>$trans));
        
        }
               
        
 }
?>
