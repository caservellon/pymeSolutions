<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Categoria', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_Categoria_ID');
			$table->string('INV_Categoria_Codigo');
			$table->string('INV_Categoria_Nombre');
			$table->string('INV_Categoria_Descripcion');
			$table->datetime('INV_Categoria_FechaCreacion');
			$table->string('INV_Categoria_UsuarioCreacion');
			$table->datetime('INV_Categoria_FechaModificacion');
			$table->string('INV_Categoria_UsuarioModificacion');
			$table->boolean('INV_Categoria_Activo');
			$table->int('INV_Categoria_IDCategoriaPadre');
			$table->int('INV_Categoria_HorarioDescuento_ID');
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
		Schema::drop('Categoria');
	}

}
