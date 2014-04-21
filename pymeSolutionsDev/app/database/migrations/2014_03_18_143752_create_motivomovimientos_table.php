<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMotivoMovimientosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MotivoMovimientos', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_MotivoMovimiento_ID');
			$table->string('INV_MotivoMovimiento_Nombre');
			$table->int('INV_MotivoMovimiento_TipoMovimiento');
			$table->text('INV_MotivoMovimiento_Observaciones');
			$table->datetime('INV_MotivoMovimiento_FechaCreacion');
			$table->string('INV_MotivoMovimiento_UsuarioCreacion');
			$table->datetime('INV_MotivoMovimiento_FechaModificacion');
			$table->string('INV_MotivoMovimiento_UsuarioModificacion');
			$table->int('INV_MotivoMovimiento_Activo');
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
		Schema::drop('MotivoMovimientos');
	}

}
