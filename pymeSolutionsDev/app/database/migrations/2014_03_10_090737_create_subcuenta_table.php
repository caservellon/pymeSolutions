<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubcuentaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Subcuenta', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('CON_Subcuenta_ID');
			$table->string('CON_Subcuenta_Codigo');
			$table->string('CON_Subcuenta_Nombre');
			$table->date('CON_Subcuenta_FechaCreacion');
			$table->date('CON_Subcuenta_FechaModificacion');
			$table->integer('CON_CatalogoContable_ID');
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
		Schema::drop('Subcuenta');
	}

}
