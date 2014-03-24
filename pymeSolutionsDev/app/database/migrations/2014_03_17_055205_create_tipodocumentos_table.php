<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipoDocumentosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('TipoDocumentos', function(Blueprint $table) {
			$table->increments('id');
			$table->int('CRM_TipoDocumento_ID');
			$table->string('CRM_TipoDocumento_Codigo');
			$table->string('CRM_TipoDocumento_Nombre');
			$table->string('CRM_TipoDocumento_Validacion');
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
		Schema::drop('TipoDocumentos');
	}

}
