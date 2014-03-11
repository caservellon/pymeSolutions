<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuentaMotivosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CuentaMotivos', function(Blueprint $table) {
			$table->increments('id');
			$table->Integer('CON_CuentaMotivo_DebeHaber');
			$table->Integer('CON_MotivoTransaccion_ID');
			$table->Integer('CON_CatalogoContable_ID');
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
		Schema::drop('CuentaMotivos');
	}

}
