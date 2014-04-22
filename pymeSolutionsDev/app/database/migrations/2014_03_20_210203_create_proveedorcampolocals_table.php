<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProveedorCampoLocalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ProveedorCampoLocals', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_Proveedor_CampoLocal_ID');
			$table->string('INV_Proveedor_CampoLocal_Valor');
			$table->datetime('INV_Proveedor_CampoLocal_FechaCreacion');
			$table->string('INV_Proveedor_CampoLocal_UsuarioCreacion');
			$table->datetime('INV_Proveedor_CampoLocal_FechaModificacion');
			$table->string('INV_Proveedor_CampoLocal_UsuarioModificacion');
			$table->int('INV_Proveedor_INV_Proveedor_ID');
			$table->int('INV_Proveedor_INV_Ciudad_ID');
			$table->int ('GEN_CampoLocal_GEN_CampoLocal_ID');
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
		Schema::drop('ProveedorCampoLocals');
	}

}
