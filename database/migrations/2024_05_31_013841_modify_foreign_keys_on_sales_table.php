<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyForeignKeysOnSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            // Eliminar la clave foránea existente
            $table->dropForeign(['name_product']);
            
            // Volver a crear la clave foránea con ON DELETE RESTRICT
            $table->foreign('name_product')
                  ->references('name_product')
                  ->on('products')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            // Eliminar la clave foránea con ON DELETE RESTRICT
            $table->dropForeign(['name_product']);
            
            // Volver a crear la clave foránea con el comportamiento original (puede ser 'cascade' o 'restrict' según tu configuración original)
            $table->foreign('name_product')
                  ->references('name_product')
                  ->on('products')
                  ->onDelete('cascade'); // Ajusta esto según el comportamiento original que tenías
        });
    }
}
