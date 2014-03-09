<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampoLocalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CampoLocals', function(Blueprint $table) {
			$table->increments('id');
			$table->int('GEN_CampoLocal_ID');
			$table->string('GEN_CampoLocal_Codigo');
			$table->bool('GEN_CampoLocal_Activo');
			$table->string('GEN_CampoLocal_Nombre');
			$table->string('GEN_CampoLocal_Tipo');
			$table->bool('GEN_CampoLocal_Requerido');
			$table->bool('GEN_CampoLocal_ParametroBusqueda');
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
		Schema::drop('CampoLocals');
	}

}
