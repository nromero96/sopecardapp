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
            $table->string('at_tipo_paciente_hp',15)->nullable();
            $table->integer('at_tiempo_sint_diagnostico')->nullable();
            $table->string('at_hipertension_ap',6)->nullable();
            $table->string('at_etiologia_hp')->nullable();
            $table->string('at_etiologia_hp_otra')->nullable();
            $table->string('at_diagnostico_gestacion',6)->nullable();
            $table->string('at_disnea',6)->nullable();
            $table->string('at_sincope',6)->nullable();
            $table->string('at_angina',6)->nullable();
            $table->text('at_antecedentes')->nullable(); //Este datos es multiple
            $table->text('at_otro_antecedentes')->nullable();
            $table->string('at_vacunacion',6)->nullable();
            $table->string('at_anticoncepcion',6)->nullable();

            //Examen Físico 
            $table->integer('ef_pas')->nullable();
            $table->integer('ef_pad')->nullable();
            $table->integer('ef_fc')->nullable();
            $table->integer('ef_peso')->nullable();
            $table->integer('ef_talla')->nullable();
            $table->integer('ef_imc')->nullable();
            $table->integer('ef_sato2')->nullable();
            $table->string('ef_ingurgitacion_yugular',6)->nullable();
            $table->string('ef_reflujo_hepatoyugular',6)->nullable();
            $table->string('ef_edema_miembros_inferiores',6)->nullable();
            $table->string('ef_hepatomegalia',6)->nullable();
            $table->string('ef_ascitis',6)->nullable();
            $table->string('ef_fenomeno_raynaud',6)->nullable();
            $table->string('ef_ulceras_digitales',6)->nullable();
            $table->string('ef_esclerodactilia',6)->nullable();
            $table->string('ef_calcinosis',6)->nullable();
            $table->string('ef_telangiectasias',6)->nullable();
            $table->string('ef_artritis_artralgia',6)->nullable();
            $table->string('ef_miositis',6)->nullable();
            $table->integer('ef_iase')->nullable();

            //Ecocardiograma

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
