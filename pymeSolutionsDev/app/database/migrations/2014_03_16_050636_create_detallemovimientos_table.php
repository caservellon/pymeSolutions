<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDetalleMovimientosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('DetalleMovimientos', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_DetalleMovimiento_ID');
			$table->int('INV_DetalleMovimiento_IDProducto');
			$table->string('INV_DetalleMovimiento_CodigoProducto');
			$table->string('INV_DetalleMovimiento_NombreProducto');
			$table->int('INV_DetalleMovimiento_CantidadProducto');
			$table->decimal('INV_DetalleMovimiento_PrecioCosto');
			$table->decimal('INV_DetalleMovimiento_PrecioVenta');
			$table->datetime('INV_DetalleMovimiento_FechaCreacion');
			$table->string('INV_DetalleMovimiento_UsuarioCreacion');
			$table->datetime('INV_DetalleMovimiento_FechaModificacion');
			$table->string('INV_DetalleMovimiento_UsuarioModificacion');
			$table->int('INV_Movimiento_ID');
			$table->int('INV_Movimiento_INV_MotivoMovimiento_INV_MotivoMovimiento_ID');
			$table->int('INV_Producto_INV_Producto_ID');
			$table->int('INV_Producto_INV_Categoria_ID');
			$table->int('INV_Producto_INV_Categoria_IDCategoriaPadre');
			$table->int('INV_Producto_INV_UnidadMedida_INV_UnidadMedida_ID');
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
		Schema::drop('DetalleMovimientos');
	}

}
