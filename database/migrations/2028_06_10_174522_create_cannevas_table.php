<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCannevasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cannevas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('annee_id');
            $table->foreign('annee_id')->references('id')->on('annees');
            $table->unsignedBigInteger('niveauplanification_id');
            $table->foreign('niveauplanification_id')->references('id')->on('niveauplanifications');
            $table->unsignedBigInteger('directioncentrale_id');
            $table->foreign('directioncentrale_id')->references('id')->on('directioncentrales');
            $table->unsignedBigInteger('sousdirection_id');
            $table->foreign('sousdirection_id')->references('id')->on('sousdirections');
            
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services');
            $table->unsignedBigInteger('axe_id')->nullable();
            $table->foreign('axe_id')->references('id')->on('axes');
            $table->unsignedBigInteger('composante_id')->nullable();
            $table->foreign('composante_id')->references('id')->on('composantes');
            $table->unsignedBigInteger('souscomposante_id')->nullable();
            $table->foreign('souscomposante_id')->references('id')->on('souscomposantes');
            $table->unsignedBigInteger('actionintervention_id')->nullable();
            $table->foreign('actionintervention_id')->references('id')->on('actioninterventions');
            $table->unsignedBigInteger('interventioncle_id')->nullable();
            $table->foreign('interventioncle_id')->references('id')->on('interventioncles');
            $table->unsignedBigInteger('typeactivite_id')->nullable();
            $table->foreign('typeactivite_id')->references('id')->on('typeactivites');
            $table->unsignedBigInteger('sourcefinancement_id')->nullable();
            $table->foreign('sourcefinancement_id')->references('id')->on('sourcefinancements');
            $table->longText('activite')->nullable();
            $table->enum('periode1', ['T1'])->nullable();
            $table->enum('periode2', ['T2'])->nullable();
            $table->enum('periode3', ['T3'])->nullable();
            $table->enum('periode4', ['T4'])->nullable();
            
            $table->integer('montant_cout')->nullable();





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
        Schema::dropIfExists('cannevas');
    }
}
