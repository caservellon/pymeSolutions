<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductoRechazadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ProductoRechazados', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('INV_ProductoRechazado_ID');
			$table->integer('INV_ProductoRechazado_IDOrdenCompra');
			$table->integer('INV_ProductoRechazado_IDProducto');
			$table->integer('INV_ProductoRechazado_Cantidad');
			$table->integer('INV_ProductoRechazado_PrecioCosto');
			$table->integer('INV_ProductoRechazado_PrecioVenta');
			$table->integer('INV_ProductoRechazado_Activo');
			$table->date('INV_ProductoRechazado_FechaCreacion');
			$table->string('INV_ProductoRechazado_UsuarioCreacion');
			$table->date('INV_ProductoRechazado_FechaModificacion');
			$table->string('INV_ProductoRechazado_UsuarioModificacion');
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
		Schema::drop('ProductoRechazados');
	}

}
