<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatprocesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultatproces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('axe_id');
            $table->foreign('axe_id')->references('id')->on('axes');
            $table->unsignedBigInteger('composante_id');
            $table->foreign('composante_id')->references('id')->on('composantes');
            $table->unsignedBigInteger('souscomposante_id')->nullable();
            $table->foreign('souscomposante_id')->references('id')->on('souscomposantes');
            $table->unsignedBigInteger('actionintervention_id')->nullable();
            $table->foreign('actionintervention_id')->references('id')->on('actioninterventions');
            $table->string('name_resultatproces');
            $table->string('cible2022')->nullable();
            $table->string('cible2023')->nullable();

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
        Schema::dropIfExists('resultatproces');
    }
}
