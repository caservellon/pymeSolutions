<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeriodoCierreDeCajasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('PeriodoCierreDeCajas', function(Blueprint $table) {
			$table->increments('id');
			$table->int('VEN_PeriodoCierreDeCaja_id');
			$table->string('VEN_PeriodoCierreDeCaja_Codigo');
			$table->int('VEN_PeriodoCierreDeCaja_ValorHoras');
			$table->int('VEN_PeriodoCierreDeCaja_Estado');
			$table->time('VEN_PeriodoCierreDeCaja_HoraPartida');
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
		Schema::drop('PeriodoCierreDeCajas');
	}

}
