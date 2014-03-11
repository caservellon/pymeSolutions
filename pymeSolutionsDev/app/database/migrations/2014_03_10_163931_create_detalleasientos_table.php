<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetalleAsientosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('DetalleAsientos', function(Blueprint $table) {
			$table->increments('id');
			$table->Integer('CON_DetalleAsiento_ID');
			$table->Float('CON_DetalleAsiento_Monto');
			$table->DATETIME('CON_DetalleAsiento_FechaCreacion');
			$table->DATETIME('CON_DetalleAsiento_FechaModificacion');
			$table->Integer('CON_MotivoTransaccion_ID');
			$table->Integer('CON_LibroDiario_ID');
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
		Schema::drop('DetalleAsientos');
	}

}
