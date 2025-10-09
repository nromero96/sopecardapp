<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdDnisToRenavalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('renavals', function (Blueprint $table) {
            $table->unsignedBigInteger('id_dnis')->nullable()->after('id'); 
            $table->foreign('id_dnis')->references('id')->on('dnis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('renavals', function (Blueprint $table) {
            $table->dropForeign(['id_dnis']);
            $table->dropColumn('id_dnis');
        });
    }
}
