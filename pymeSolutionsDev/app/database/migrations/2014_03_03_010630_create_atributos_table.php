<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAtributosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Atributos', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_Atributo_ID');
			$table->string('INV_Atributo_Codigo');
			$table->string('INV_Atributo_Nombre');
			$table->string('INV_Atributo_TipoDato');
			$table->datetime('INV_Atributo_FechaCreacion');
			$table->string('INV_Atributo_UsuarioCreacion');
			$table->datetime('INV_Atributo_FechaModificacion');
			$table->string('INV_Atributo_UsuarioModificacion');
			$table->boolean('INV_Atributo_Activo');
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
		Schema::drop('Atributos');
	}

}
