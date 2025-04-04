<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUserIdFromRenimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('renimas', function (Blueprint $table) {
            // Verificamos y eliminamos cada columna si existe
            if (Schema::hasColumn('renimas', 'user_id')) {
                $table->dropColumn('user_id');
            }
            if (Schema::hasColumn('renimas', 'centro_salud')) {
                $table->dropColumn('centro_salud');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('renimas', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Vuelve a agregar la columna y la clave foránea
            $table->string('centro_salud')->nullable(); // Vuelve a agregar la columna 'centro_salud'
        });
    }
}
