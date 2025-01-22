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

            //Responsable y centro
            $table->unsignedBigInteger('user_id');
            $table->string('centro_atencion')->nullable();

            //Datos Epidemiológicos
            $table->string('de_nombre')->nullable();
            $table->integer('de_edad')->nullable();
            $table->string('de_procedencia',150)->nullable();
            $table->string('de_residencia',150)->nullable();
            $table->integer('de_altura_ciudad')->nullable();
            $table->string('de_estratificacion_altura',25)->nullable();
            $table->integer('de_tiempo_residencia')->nullable();
            $table->string('de_modalidad_ingreso',20)->nullable();
            $table->string('de_intervencion',6)->nullable();
            $table->string('de_gestante',6)->nullable();
            $table->string('de_estado_civil',15)->nullable();
            $table->string('de_grado_instruccion',50)->nullable();

            //Antecedentes
            


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
