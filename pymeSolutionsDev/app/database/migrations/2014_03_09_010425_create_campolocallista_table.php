<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCampoLocalListaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('CampoLocalLista', function(Blueprint $table) {
			$table->increments('id');
			$table->int('GEN_CampoLocalLista_ID');
			$table->string('GEN_CampoLocalLista_Valor');
			$table->int('GEN_CampoLocal_GEN_CampoLocal_ID');
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
		Schema::drop('CampoLocalLista');
	}

}
