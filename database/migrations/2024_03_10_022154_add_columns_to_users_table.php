<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Agregar columna 'trato' antes de 'name'
            $table->string('trato')->nullable()->before('name');
            // Agregar columna 'lastname' después de 'name'
            $table->string('lastname')->after('name');
            // Agregar columna 'phone' después de 'email'
            $table->string('phone')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Eliminar columnas en reversa de cómo se agregaron
            $table->dropColumn('phone');
            $table->dropColumn('lastname');
            $table->dropColumn('trato');
        });
    }
}
