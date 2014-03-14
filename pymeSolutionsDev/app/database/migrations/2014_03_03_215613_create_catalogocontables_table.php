<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCatalogoContablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CatalogoContables', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('CON_CatalgoContable_ID');
			$table->string('CON_CatalogoContable_Codigo');
			$table->string('CON_CatalogoContable_Nombre');
			$table->string('CON_CatalogoContable_UsuarioCreacion');
			$table->boolean('CON_CatalgoContable_NaturalezaSaldo');
			$table->boolean('CON_CatalogoContable_Estado');
			$table->datetime('CON_CatalogoContable_FechaCreacion');
			$table->datetime('CON_CatalogoContable_FechaModificacion');
			$table->integer('CON_ClasificacionCuenta_ID');
			$table->string('CON_CatalogoContable_CodigoSubcuenta')
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
		Schema::drop('CatalogoContables');
	}

}
