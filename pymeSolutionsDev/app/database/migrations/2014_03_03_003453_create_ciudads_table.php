<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCiudadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Ciudads', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_Ciudad_ID');
			$table->string('INV_Ciudad_Codigo');
			$table->string('INV_Ciudad_Nombre');
			$table->datetime('INV_Ciudad_FechaCreacion');
			$table->string('INV_Ciudad_UsuarioCreacion');
			$table->datetime('INV_Ciudad_FechaModificacion');
			$table->string('INV_Ciudad_UsuarioModificacion');
			$table->boolean('INV_Ciudad_Activo');
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
		Schema::drop('Ciudads');
	}

}
