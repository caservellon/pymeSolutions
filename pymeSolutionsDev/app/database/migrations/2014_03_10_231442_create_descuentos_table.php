<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDescuentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Descuentos', function(Blueprint $table) {
			$table->increments('id');
			$table->int('VEN_DescuentoEspecial_id');
			$table->string('VEN_DescuentoEspecial_Codigo');
			$table->string('VEN_DescuentoEspecial_Nombre');
			$table->decimal('VEN_DescuentoEspecial_Valor');
			$table->datetime('VEN_DescuentoEspecial_FechaInicio');
			$table->datetime('VEN_DescuentoEspecial_FechaFinal');
			$table->int('VEN_DescuentoEspecial_Precedencia');
			$table->int('VEN_DescuentoEspecial_Estado');
			$table->datetime('VEN_DescuentoEspecial_TimeStamp');
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
		Schema::drop('Descuentos');
	}

}
