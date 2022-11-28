<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActioninterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actioninterventions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('axe_id');
            $table->foreign('axe_id')->references('id')->on('axes');
            $table->unsignedBigInteger('composante_id');
            $table->foreign('composante_id')->references('id')->on('composantes');
            $table->unsignedBigInteger('souscomposante_id');
            $table->foreign('souscomposante_id')->references('id')->on('souscomposantes');
            $table->string('name_actionintervention');
            $table->string('code_actionintervention');
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
        Schema::dropIfExists('actioninterventions');
    }
}
