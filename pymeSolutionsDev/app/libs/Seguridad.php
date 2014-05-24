<?php

	class Seguridad {

		public static function CrearPersona($id){
			return Roles::find(User::find($id)->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_CrearPersona;
		}
	}

?>