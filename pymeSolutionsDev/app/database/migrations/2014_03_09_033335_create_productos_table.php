<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Productos', function(Blueprint $table) {
			$table->increments('id');
			$table->int('INV_Producto_ID');
			$table->string('INV_Producto_Codigo');
			$table->string('INV_Producto_Nombre');
			$table->string('INV_Producto_Descripcion');
			$table->decimal('INV_Producto_PrecioVenta');
			$table->float('INV_Producto_MargenGanancia');
			$table->decimal('INV_Producto_PrecioCosto');
			$table->int('INV_Producto_Cantidad');
			$table->float('INV_Producto_Impuesto1');
			$table->float('INV_Producto_Impuesto2');
			$table->string('INV_Producto_RutaImagen');
			$table->string('INV_Producto_Comentarios');
			$table->int('INV_Producto_PuntoReorden');
			$table->int('INV_Producto_NivelReposicion');
			$table->string('INV_Producto_TipoCodigoBarras');
			$table->string('INV_Producto_ValorCodigoBarras');
			$table->decimal('INV_Producto_ValorDescuento');
			$table->float('INV_Producto_PorcentajeDescuento');
			$table->datetime('INV_Producto_FechaCreacion');
			$table->string('INV_Producto_UsuarioCreacion');
			$table->datetime('INV_Producto_FechaModificacion');
			$table->string('INV_Producto_UsuarioModificacion');
			$table->int('INV_Producto_Activo');
			$table->int('INV_Categoria_ID');
			$table->int('INV_Categoria_IDCategoriaPadre');
			$table->int('INV_UnidadMedida_ID');
			$table->int('INV_HorarioBloqueo_ID');
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
		Schema::drop('Productos');
	}

}
