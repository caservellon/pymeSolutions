<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Empresas', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('CRM_Empresas_ID');
			$table->string('CRM_Empresas_Codigo');
			$table->string('CRM_Empresas_Nombre');
			$table->text('CRM_Empresas_Direccion');
			$table->text('CRM_Empresas_Logo');
			$table->integer('CRM_Empresas_Descuento');
			$table->integer('CRM_Personas_CRM_Personas_ID');
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
		Schema::drop('Empresas');
	}

}
