<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductoCampoLocalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ProductoCampoLocals', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_Producto_CampoLocal_IDCampoLocal');
			$table->string('INV_Producto_CampoLocal_Valor');
			$table->datetime('INV_Producto_CampoLocal_FechaCreacion');
			$table->string('INV_Producto_CampoLocal_UsuarioCreacion');
			$table->datetime('INV_Producto_CampoLocal_FechaModificacion');
			$table->string('INV_Producto_CampoLocal_UsuarioModificacion');
			$table->int('INV_Producto_ID');
			$table->int('GEN_CampoLocal_GEN_CampoLocal_ID');
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
		Schema::drop('ProductoCampoLocals');
	}

}
