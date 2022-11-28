<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDirectioncentralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directioncentrales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('niveauplanification_id');
            $table->foreign('niveauplanification_id')->references('id')->on('niveauplanifications');
            $table->string('name_directioncentrales');
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
        Schema::dropIfExists('directioncentrales');
    }
}
