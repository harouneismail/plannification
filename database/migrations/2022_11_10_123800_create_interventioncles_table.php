<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterventionclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interventioncles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('axe_id');
            $table->foreign('axe_id')->references('id')->on('axes');
            $table->unsignedBigInteger('composante_id');
            $table->foreign('composante_id')->references('id')->on('composantes');
            $table->unsignedBigInteger('souscomposante_id');
            $table->foreign('souscomposante_id')->references('id')->on('souscomposantes');
            $table->unsignedBigInteger('actionintervention_id')->nullable();
            $table->foreign('actionintervention_id')->references('id')->on('actioninterventions');
            $table->string('name_interventions');
            $table->string('code_interventions');
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
        Schema::dropIfExists('interventioncles');
    }
}
