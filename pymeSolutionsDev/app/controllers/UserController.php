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
		$roles = Role::all()->lists('SEG_Roles_Nombre','SEG_Roles_ID');
		return View::make('Usuarios.create', compact('roles'));
	}

	public function store()
	{
		$input = Input::all();
		return var_dump($input);
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
		return Redirect::route('Auth.Usuarios.index');
	}

	public function edit($id)
	{
		$User = $this->User->find($id);

		if (is_null($User))
		{
			return Redirect::route('Auth.Usuarios.index');
		}

		return View::make('Usuarios.edit', compact('User'));

	}

	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, User::$rulesUpdate);

		if ($validation->passes())
		{
			$input['SEG_Usuarios_Contrasena'] = Hash::make($input['SEG_Usuarios_Contrasena']);
			$User = $this->User->find($id);
			$User->update($input);

			return Redirect::route('Auth.Usuarios.index');
		}

		return Redirect::route('Auth.Usuarios.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'Errores de Validacion.');
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
		        $credentials["SEG_Usuarios_Activo"] = 1; // Agrega al array el elemento para verificar si usuario esta activo
		        if (Auth::attempt($credentials)) {	          	
		          	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
					    $ip = $_SERVER['HTTP_CLIENT_IP'];
					} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
					    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					} else {
					    $ip = $_SERVER['REMOTE_ADDR'];
					}
					$UserAct = User::find(Auth::user()->SEG_Usuarios_ID);
					$UserAct->SEG_Usuarios_IP3 = $UserAct->SEG_Usuarios_IP2;
					$UserAct->SEG_Usuarios_IP2 = $UserAct->SEG_Usuarios_IP1;
					$UserAct->SEG_Usuarios_IP1 = $ip;
					$UserAct->SEG_Usuarios_UltimaSesion = date("Y-m-d h:i:s");
					$UserAct->save();
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