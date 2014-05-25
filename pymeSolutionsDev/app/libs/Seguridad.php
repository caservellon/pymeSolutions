<?php

	class Seguridad {

		//CRM
		public static function CrearPersona(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_CrearPersona;
		}

		//Ventas

		//Compras

		//Inventario

		//Contabilidad

	}

?>