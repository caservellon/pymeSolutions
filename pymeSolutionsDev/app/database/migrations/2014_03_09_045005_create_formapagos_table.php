<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFormaPagosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('FormaPagos', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_FormaPago_ID');
			$table->string('INV_FormaPago_Nombre');
			$table->int('INV_FormaPago_Efectivo');
			$table->int('INV_FormaPago_Credito');
			$table->int('INV_FormaPago_DiasCredito');
			$table->datetime('INV_FormaPago_FechaCreacion');
			$table->string('INV_FormaPago_UsuarioCreacion');
			$table->datetime('INV_FormaPago_FechaModificacion');
			$table->string('INV_FormaPago_UsuarioModificacion');
			$table->int('INV_FormaPago_Activo');
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
		Schema::drop('FormaPagos');
	}

}
