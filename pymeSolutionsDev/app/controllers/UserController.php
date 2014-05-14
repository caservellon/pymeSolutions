<?php
 
class UserController
  extends Controller
{

	protected $User;

	public function __construct(User $User)
	{
		$this->User = $User;
	}

	public function index()
	{
		$Usuarios = $this->User->all();

		return View::make('Usuarios.index', compact('Usuarios'));
	}

	public function create()
	{
		return View::make('Usuarios.create');
	}

	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, User::$rules);
		//return var_dump($input);
		if ($validation->passes())
		{	
			$input['SEG_Usuarios_Contrasena'] = Hash::make($input['SEG_Usuarios_Contrasena']);
			$this->User->create($input);

			return Redirect::route('Auth.Usuarios.index');
		}

		return Redirect::route('Auth.Usuarios.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'Error de Validacion.');
	}

	public function show($id){

	}

	public function edit($id)
	{

	}

	public function update($id)
	{

	}

	public function destroy($id){
		$User = User::find($id);
		if ($User->SEG_Usuarios_Activo == true) {
			$User->SEG_Usuarios_Activo = false;
		} else {
			$User->SEG_Usuarios_Activo = true;
		}
		$User->save();
		return Redirect::route('Auth.Usuarios.index');
	}

	public function login()
	{
	  	//Crea un usuario si no existe ninguno en la base de datos
	  	if(User::all()->count() == 0){
	  		$users = [
			    [
			    	"SEG_Usuarios_Nombre" => "Administrador",
			        "SEG_Usuarios_Username" => "admin",
			        "SEG_Usuarios_Contrasena" => Hash::make("hola123"),
			        "SEG_Usuarios_Email"    => "admin@admin.com",
			        "SEG_Usuarios_Activo" => true,
			    ]
		    ];
		  
		    foreach ($users as $user) {
		      User::create($user);
		    }
	  	}

	  	//Autentica
	    if ($this->isPostRequest()) {
	      $validator = $this->getLoginValidator();
	  
	      	if ($validator->passes()) {
		        $credentials = $this->getLoginCredentials();
		  
		        if (Auth::attempt($credentials)) {
		          	return Redirect::route("Auth.login");
		        }
		  
		        return Redirect::back()->withErrors([
		          	"errors" => ["Sus credenciales no concuerdan."]
		        ]);
	      	} else {
	        	return Redirect::back()
		          ->withInput()
		          ->withErrors($validator);
	      	}
	    }

	    //Recoge la IP del cliente y la guarda en la base de datos
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		    $ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip = $_SERVER['REMOTE_ADDR'];
		}

	    return View::make("Usuarios.login");
  	}

  	public function logout()
	{
	 	Auth::logout();
	  
	  	return Redirect::route("Auth.login");
	}
  
  	protected function isPostRequest()
  	{
    	return Input::server("REQUEST_METHOD") == "POST";
  	}
  
  	protected function getLoginValidator()
  	{
	    return Validator::make(Input::all(), [
	      	"SEG_Usuarios_Email" => "required",
	      	"password" => "required"
	    ]);
  	}
  
	protected function getLoginCredentials()
	{
	    return [
	      	"SEG_Usuarios_Email" => Input::get("SEG_Usuarios_Email"),
	      	"password" => Input::get("password")
	    ];
	}
}