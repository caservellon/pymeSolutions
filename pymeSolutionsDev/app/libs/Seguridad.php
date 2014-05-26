<?php

	class Seguridad {

		//CRM
		public static function CrearPersona(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_CrearPersona;
		}

		public static function VerPersona(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_VerPersona;
		}

		public static function EditarPersona(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_EditarPersona;
		}

		public static function EliminarPersona(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_EliminarPersona;
		}

		public static function CrearEmpresa(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_CrearEmpresa;
		}

		public static function VerEmpresa(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_VerEmpresa;
		}

		public static function EditarEmpresa(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_EditarEmpresa;
		}

		public static function EliminarEmpresa(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_EliminarEmpresa;
		}

		public static function Configuracion(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_CRM_Configuracion;
		}

		//Ventas

		public static function CrearCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_CrearCaja;
		}

		public static function AbrirCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_AbrirCaja;
		}

		public static function BorrarCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_BorrarCaja;
		}

		public static function EditarCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_EditarCaja;
		}

		public static function VerCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_VerCaja;
		}

		public static function CrearPeriodoDeCierre(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_CrearPeriodoDeCierre;
		}

		public static function BorrarPeriodoDeCierre(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_BorrarPeriodoDeCierre;
		}

		public static function EditarPeriodoDeCierre(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_EditarPeriodoDeCierre;
		}

		public static function VerPeriodoDeCierre(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_VerPeriodoDeCierre;
		}

		public static function AbrirAperturaDeCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_AbrirAperturaDeCaja;
		}

		public static function CerrarAperturaDeCaja(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_CerrarAperturaDeCaja;
		}

		public static function VerAperturaDeCierre(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_VerAperturaDeCierre;
		}

		public static function CrearDescuentos(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_CrearDescuentos;
		}

		public static function EditarDescuentos(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_EditarDescuentos;
		}

		public static function EliminarDescuentos(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_EliminarDescuentos;
		}

		public static function VerDescuentos(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_VerDescuentos;
		}

		public static function ConfigurarVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_ConfigurarVentas;
		}

		public static function POSVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_POSVentas;
		}

		public static function EliminarProductoDeVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_EliminarProductoDeVentas;
		}

		public static function EditarCantidadDeVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_EditarCantidadDeVentas;
		}

		public static function GuardarVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_GuardarVentas;
		}

		public static function ListarVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_ListarVentas;
		}

		public static function VerVentas(){
			return Role::find(Auth::user()->SEG_Roles_SEG_Roles_ID)->SEG_Roles_VEN_VerVentas;
		}


		//Compras

		//Inventario

		//Contabilidad

	}

?>