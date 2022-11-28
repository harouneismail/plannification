<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppuisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appuis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('niveauplanification_id');
            $table->foreign('niveauplanification_id')->references('id')->on('niveauplanifications');
            $table->unsignedBigInteger('directioncentrale_id');
            $table->foreign('directioncentrale_id')->references('id')->on('directioncentrales');

            $table->string('name_appuis');
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
        Schema::dropIfExists('appuis');
    }
}
