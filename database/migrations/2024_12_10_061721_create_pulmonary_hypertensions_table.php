<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePulmonaryHypertensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pulmonary_hypertensions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            //Datos epidemiológicos
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->integer('edad')->nullable();
            $table->string('procedencia')->nullable();
            $table->string('residencia')->nullable();
            $table->integer('altura_ciudad')->nullable();
            $table->string('estratificacion_altura')->nullable();
            $table->integer('tiempo_residencia')->nullable();
            $table->string('modalidad_ingreso')->nullable();
            $table->string('intervecion_realizada')->nullable();
            $table->string('gestante',5)->nullable();
            $table->string('estado_civil',15)->nullable();
            $table->string('grado_instruccion',50)->nullable();

            //Antecedentes
            $table->integer('tiempo_sintomas_diagnostico')->nullable();
            $table->string('hta_pulmonar',5)->nullable();


            $table->string('status');
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
        Schema::dropIfExists('pulmonary_hypertensions');
    }
}
