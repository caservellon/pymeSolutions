<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnidadMedidasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('UnidadMedidas', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_UnidadMedida_ID');
			$table->string('INV_UnidadMedida_Nombre');
			$table->string('INV_UnidadMedida_Descripcion');
			$table->datetime('INV_UnidadMedida_FechaCreacion');
			$table->string('INV_UnidadMedida_UsuarioCreacion');
			$table->datetime('INV_UnidadMedida_FechaModificacion');
			$table->string('INV_UnidadMedida_UsuarioModificacion');
			$table->boolean('INV_UnidadMedida_Activo');
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
		Schema::drop('UnidadMedidas');
	}

}
