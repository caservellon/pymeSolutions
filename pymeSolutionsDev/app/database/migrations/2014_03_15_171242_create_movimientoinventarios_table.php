<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMovimientoInventariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MovimientoInventarios', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_Movimiento_ID');
			$table->decimal('INV_Movimiento_Numero');
			$table->int('INV_Movimiento_IDTransaccion');
			$table->int('INV_Movimiento_IDOrdenCompra');
			$table->text('INV_Movimiento_Observaciones');
			$table->datetime('INV_Movimiento_FechaCreacion');
			$table->string('INV_Movimiento_UsuarioCreacion');
			$table->datetime('INV_Movimiento_FechaModificacion');
			$table->string('INV_Movimiento_UsuarioModificacion');
			$table->int('INV_MotivoMovimiento_INV_MotivoMovimiento_ID');
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
		Schema::drop('MovimientoInventarios');
	}

}
