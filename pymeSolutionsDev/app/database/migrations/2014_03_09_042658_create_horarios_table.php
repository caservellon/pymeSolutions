<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHorariosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Horarios', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_Horario_ID');
			$table->string('INV_Horario_Nombre');
			$table->int('INV_Horario_Tipo');
			$table->datetime('INV_Horario_FechaInicio');
			$table->datetime('INV_Horario_FechaFinal');
			$table->datetime('INV_Horario_FechaCreacion');
			$table->string('INV_Horario_UsuarioCreacion');
			$table->datetime('INV_Horario_FechaModificacion');
			$table->string('INV_Horario_UsuarioModificacion');
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
		Schema::drop('Horarios');
	}

}
