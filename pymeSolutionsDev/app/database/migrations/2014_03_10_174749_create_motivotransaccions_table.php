<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMotivoTransaccionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('MotivoTransaccions', function(Blueprint $table) {
			$table->increments('id');
			$table->String('CON_MotivoTransaccion_Codigo');
			$table->String('CON_MotivoTransaccion_Descripcion');
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
		Schema::drop('MotivoTransaccions');
	}

}
