<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateValorCampoLocalCRMsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ValorCampoLocalCRMs', function(Blueprint $table) {
			$table->increments('id');
			$table->int('CRM_ValorCampoLocal_ID');
			$table->string('CRM_ValorCampoLocal_Valor');
			$table->datetime('CRM_ValorCampoLocal_Creacion');
			$table->datetime('CRM_ValorCampoLocal_Modificacion');
			$table->string('CRM_ValorCampoLocal_Usuario');
			$table->int('GEN_CampoLocal_GEN_CampoLocal_ID');
			$table->int('CRM_Empresas_CRM_Empresas_ID');
			$table->int('CRM_Personas_CRM_Personas_ID');
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
		Schema::drop('ValorCampoLocalCRMs');
	}

}
