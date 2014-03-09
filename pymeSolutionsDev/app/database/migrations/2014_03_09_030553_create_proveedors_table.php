<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProveedorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Proveedors', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_Proveedor_ID');
			$table->string('INV_Proveedor_Codigo');
			$table->string('INV_Proveedor_Nombre');
			$table->string('INV_Proveedor_Direccion');
			$table->string('INV_Proveedor_Telefono');
			$table->string('INV_Proveedor_Email');
			$table->string('INV_Proveedor_PaginaWeb');
			$table->string('INV_Proveedor_RepresentanteVentas');
			$table->string('INV_Proveedor_TelefonoRepresentanteVentas');
			$table->string('INV_Proveedor_Comentarios');
			$table->string('INV_Proveedor_RutaImagen');
			$table->datetime('INV_Proveedor_FechaCreacion');
			$table->string('INV_Proveedor_UsuarioCreacion');
			$table->datetime('INV_Proveedor_FechaModificacion');
			$table->string('INV_Proveedor_UsuarioModificacion');
			$table->bool('INV_Proveedor_Activo');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Proveedors');
	}

}
