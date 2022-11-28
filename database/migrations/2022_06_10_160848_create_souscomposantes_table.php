<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSouscomposantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('souscomposantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('axe_id');
            $table->foreign('axe_id')->references('id')->on('axes');
            $table->unsignedBigInteger('composante_id');
            $table->foreign('composante_id')->references('id')->on('composantes');
            $table->string('name_souscomposante');
            $table->string('code_souscomposante');
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
        Schema::dropIfExists('souscomposantes');
    }
}
