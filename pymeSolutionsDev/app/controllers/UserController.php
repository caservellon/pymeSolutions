<?php
 
class UserController
  extends Controller
{
	  public function login()
	  {
	  	//Crea un usuario si no existe ninguno en la base de datos
	  	if(User::all()->count() == 0){
	  		$users = [
			    [
			    	"SEG_Usuarios_Nombre" => "Administrador",
			        "SEG_Usuarios_Username" => "admin",
			        "SEG_Usuarios_Contrasena" => Hash::make("hola123"),
			        "SEG_Usuarios_Email"    => "admin@admin.com"
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
		          	return Redirect::route("user/login");
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

	  
	    return View::make("user/login");
  	}

  	public function logout()
	{
	  Auth::logout();
	  
	  return Redirect::route("user/login");
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