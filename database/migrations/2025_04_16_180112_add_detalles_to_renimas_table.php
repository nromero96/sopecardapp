<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetallesToRenimasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('renimas', function (Blueprint $table) {
            $table->string('dis_detalle')->nullable()->after('dis_puntaje_crussade');
            $table->string('dci_detalle')->nullable()->after('dci_dias_hospitalizacion');
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
            $table->dropColumn('dis_detalle');
            $table->dropColumn('dci_detalle');
        });
    }
}
